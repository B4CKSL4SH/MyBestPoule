<?php
include_once('functions.php');
$dbh = get_database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //print_r($_POST);
    //exit;
    $user_id = get_current_user_id();

    $stmt = $dbh->prepare("INSERT INTO event (title, description, creator_id, start_at, ends_at, location, min_participants, max_participants, surprise_me, price) VALUES (:title, :description, :creator_id, :start_at, :ends_at, :location, :min_participants, :max_participants, :surprise_me, :price)");
    $stmt->bindParam(':title', $_POST['title']);
    $stmt->bindParam(':creator_id', $user_id);
    $stmt->bindParam(':description', $_POST['description']);

    $start_at = $_POST['date_start_at'];
    if ($_POST['time_start_at']) {
        $start_at .= ' '.$_POST['time_start_at'];
    }
    $stmt->bindParam(':start_at', $start_at);

    $ends_at = $_POST['date_ends_at'];
    if ($_POST['time_ends_at']) {
        $ends_at .= ' '.$_POST['time_ends_at'];
    }
    $stmt->bindParam(':ends_at', $ends_at);

    $stmt->bindParam(':location', $_POST['location']);
    $stmt->bindParam(':min_participants', $_POST['min_participants']);
    $stmt->bindParam(':max_participants', $_POST['max_participants']);

    if (array_key_exists('surprise_me', $_POST) && $_POST['surprise_me'] != '') {
        $surprise_me = 1;
    } else {
        $surprise_me = 0;
    }
    $stmt->bindParam(':surprise_me', $surprise_me, PDO::PARAM_INT);

    $price = 0.0;
    if (array_key_exists('price', $_POST) && is_numeric($_POST['price'])) {
        $price = $_POST['price'];
    }
    $stmt->bindParam(':price', $price);

    $stmt->execute();

    $id_event = $dbh->lastInsertId();

    if (is_numeric($id_event) && is_array($_POST['event_tags'])) {
        foreach($_POST['event_tags'] as $tag_id) {
            $stmt = $dbh->prepare("INSERT INTO event_tag (event_id, tag_id) VALUES (:event_id, :tag_id)");
            $stmt->bindParam(':event_id', $id_event);
            $stmt->bindParam(':tag_id', $tag_id);
            $stmt->execute();
        }
    }

    random_rule($id_event);



    // rediriger où ?
    header("Location: create_event.php");
}


require('header.php');

?>
<section class="max-width">

<form method="POST">
    <label for="title">Titre</label>
    <input type="text" name="title" value="test" placeholder="Titre" required="required" />
    <br />

    <label for="description">Description</label>
    <textarea name="description"></textarea>
    <br />

    <label for="categories">Catégories</label>
    <?php foreach (getTags() as $tag) : ?>
    <input type="checkbox" name="event_tags[]" value="<?php echo $tag["id"] ?>" id="tag_<?php echo $tag["id"] ?>" /> <?php echo $tag["label"] ?><br />
    <?php endforeach; ?>

    <label for="date_start_at">Date de début</label>
    <input type="date" min="<?php echo date('Y-m-d'); ?>" name="date_start_at" required="required" />
    <input type="time" name="time_start_at" />
    <br />

    <label for="date_ends_at">Date de fin</label>
    <input type="date" min="<?php echo date('Y-m-d'); ?>" name="date_ends_at" />
    <input type="time" name="time_ends_at" />
    <br />

    <label for="location">Emplacement</label>
    <input type="text" name="location" value="test" placeholder="Lieu de l'évenement" required="required" />
    <br />

    <label for="min_participants">Minimum de participants</label>
    <input type="number" name="min_participants" min="1" value="1" />
    <br />

    <label for="max_participants">Maximum de participants</label>
    <input type="number" name="max_participants" min="1" />
    <br />

    <label for="price">Participation financière</label>
    <input type="number" name="price" />
    <br />

    <label for="surprise_me">Surprends moi !</label>
    <input type="checkbox" name="surprise_me" value="on" />
    <br />

    <button type="submit" name="create_event">Créer l'évènement</button>

</form>


</section>
<?php

require('footer.php');
