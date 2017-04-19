<?php
/**
 * Created by PhpStorm.
 * User: Backslash
 * Date: 19/04/17
 * Time: 12:11
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

function get_database()
{
    static $dbh = null;
    if ($dbh !== null) {
        return $dbh;
    }

    try {
        $user = 'mybestroulette';
        $pass = 'surpriseme';

        $dbh = new PDO('mysql:host=128.1.1.114;dbname=mybestroulette', $user, $pass);
        return $dbh;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}

function signup($email, $password)
{
    $dbh = get_database();

    $email = trim($email);

    $stmt = $dbh->prepare("INSERT INTO user (email, password) VALUES (:email, :password)");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password); // à hasher bordel !
    $stmt->execute();

    $id = $dbh->lastInsertId(); // user_id
    $_SESSION['user_id'] = $id;

    return $id;
}

function signin($email, $password)
{
    $dbh = get_database();

    $email = trim($email);

    $stmt = $dbh->prepare("SELECT id FROM user WHERE email = :email AND password = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    if ($stmt->execute()) {
        $row = $stmt->fetch();
        if (is_numeric($row['id'])) {
            $_SESSION['user_id'] = $row['id'];
            return true;
        }
    }

    return false;
}

function get_current_user_id()
{
    if (array_key_exists('user_id', $_SESSION) && is_numeric($_SESSION['user_id'])) {
        return $_SESSION['user_id'];
    }

    return null;
}

function getTags()
{
    $dbh = get_database();

    return $dbh->query("SELECT * FROM tag order by label");
}

function getUserTags()
{
    $dbh = get_database();

    $stmt = $dbh->prepare("
        SELECT t.id, t.label
        FROM tag AS t
        INNER JOIN user_tag AS ut ON t.id = ut.tag_id AND ut.user_id = :user_id
        ORDER BY t.label"
    );

    $userId = get_current_user_id();
    $stmt->bindParam(':user_id', $userId);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUserTagsIds()
{
    $dbh = get_database();

    $stmt = $dbh->prepare("
        SELECT t.id
        FROM tag AS t
        INNER JOIN user_tag AS ut ON t.id = ut.tag_id AND ut.user_id = :user_id
        ORDER BY t.label"
    );

    $userId = get_current_user_id();
    $stmt->bindParam(':user_id', $userId);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

function purgeUserTags()
{
    $dbh = get_database();

    $stmt = $dbh->prepare("DELETE FROM user_tag WHERE user_id = :user_id");
    $userId = get_current_user_id();
    $stmt->bindParam(':user_id', $userId);
    $stmt->execute();
}

function saveUserTags($tags)
{
    $dbh = get_database();

    foreach ($tags as $tagId) {
        $stmt = $dbh->prepare("INSERT INTO user_tag (id, user_id, tag_id) VALUES (NULL, :user_id, :tag_id)");
        $userId = get_current_user_id();
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':tag_id', $tagId);
        $stmt->execute();
    }
}

function random_rule($id_event)
{
    $dbh = get_database();

    $stmt = $dbh->prepare("
        SELECT *
        FROM event
        WHERE id = :id"
    );
    $stmt->bindParam(':id', $id_event);
    $stmt->execute();
    $event = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $event = $event[0];

    $stmt = $dbh->prepare("
        SELECT tag_id
        FROM event_tag
        WHERE event_id = :id"
    );
    $stmt->bindParam(':id', $id_event);
    $stmt->execute();
    $event_tags = $stmt->fetchAll(PDO::FETCH_COLUMN);

    $query = "
    SELECT
        DISTINCT u.id
    FROM
        user u
    JOIN
        user_tag tu
    ON
        u.id = tu.user_id
        AND tu.tag_id IN (".implode(', ', $event_tags).")
    WHERE
        u.id <> ".$event['creator_id']."
    ORDER BY
        RAND() ";
    $limit = null;
    if (is_numeric($event['max_participants']) && $event['max_participants'] > 0) {
        $limit = $event['max_participants'];
    }
    if ($limit) {
        $query .= " LIMIT ".$limit;
    }
    //echo $query;

    $stmt = $dbh->prepare("DELETE FROM event_user WHERE event_id = :event_id");
    $stmt->bindParam(':event_id', $id_event);
    $stmt->execute();

    foreach($dbh->query($query) as $row) {
        $user_id = $row['id'];
        $stmt = $dbh->prepare("INSERT INTO event_user (user_id, event_id) VALUES (:user_id, :event_id)");
        $userId = get_current_user_id();
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':event_id', $id_event);
        $stmt->execute();

        //echo "user_id = ".$user_id." event_id = ".$id_event."\n";
    }
}

//random_rule(13); exit;
