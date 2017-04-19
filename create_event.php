<?php
include_once('functions.php');
$dbh = get_database();


function get_creator_id() {
    // devrait venir de la session quand l'utilisateur est connecté

    return 1;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //print_r($_POST);
    //exit;

    $stmt = $dbh->prepare("INSERT INTO event (title, description, creator_id, start_at, ends_at, location, min_participants, max_participants, surprise_me, price) VALUES (:title, :description, :creator_id, :start_at, :ends_at, :location, :min_participants, :max_participants, :surprise_me, :price)");
    $stmt->bindParam(':title', $_POST['title']);
    $stmt->bindParam(':creator_id', get_creator_id());
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

    // rediriger où ?
    header("Location: create_event.php");
}


require('header.php');

?>

<form method="POST">
    <label for="title">Titre</label>
    <input type="text" name="title" value="test" placeholder="Titre" required="required" />
    <br />

    <label for="description">Description</label>
    <textarea name="description"></textarea>
    <br />

    <label for="categories">Catégories</label>
    <input type="text" name="categories" value="test1, test2, test3" placeholder="Pause café, Restaurant" required="required" />
    <br />

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


<!--
id                    | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
| image                 | varchar(255)     | YES  |     | NULL    |                |
| creator_id            | int(10) unsigned | NO   |     | NULL    |                |
| description           | text             | YES  |     | NULL    |                |
| start_at              | datetime         | NO   |     | NULL    |                |
| ends_at               | datetime         | YES  |     | NULL    |                |
| location              | varchar(512)     | YES  |     | NULL    |                |
| min_participants      | int(11)          | YES  |     | NULL    |                |
| max_participants      | int(11)          | YES  |     | NULL    |                |
| last_randomization_at | datetime         | YES  |     | NULL    |                |
| price                 | float(7,2)       | YES  |     | NULL    |                |
| is_finished           | tinyint(1)       | NO   |     | 0       |                |
| surprise_me           | tinyint(1)       | NO   |     | 0       |

-->
    <button type="submit" name="create_event">Créer l'évènement</button>

</form>



<?php

require('footer.php');
