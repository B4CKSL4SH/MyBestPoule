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
    return $_SESSION['user_id'];
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
        INNER JOIN user_tag AS ut ON t.id = ut.tag_id
        INNER JOIN user AS u ON ut.user_id = :user_id
        ORDER BY t.label"
    );

    $userId = get_current_user_id();
    $stmt->bindParam(':user_id', $userId);

    $stmt->execute();

    return $stmt->fetchAll();
}

//function set_tag($)