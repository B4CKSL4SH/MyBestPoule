<?php
//include_once('functions.php');
//$dbh = get_database();
//
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//
//    //print_r($_POST);
//    //exit;
//    $user_id = get_current_user_id();
//
//    $stmt = $dbh->prepare("INSERT INTO event (title, description, creator_id, start_at, ends_at, location, min_participants, max_participants, surprise_me, price) VALUES (:title, :description, :creator_id, :start_at, :ends_at, :location, :min_participants, :max_participants, :surprise_me, :price)");
//    $stmt->bindParam(':title', $_POST['title']);
//    $stmt->bindParam(':creator_id', $user_id);
//    $stmt->bindParam(':description', $_POST['description']);
//
//    $start_at = $_POST['date_start_at'];
//    if ($_POST['time_start_at']) {
//        $start_at .= ' '.$_POST['time_start_at'];
//    }
//    $stmt->bindParam(':start_at', $start_at);
//
//    $ends_at = $_POST['date_ends_at'];
//    if ($_POST['time_ends_at']) {
//        $ends_at .= ' '.$_POST['time_ends_at'];
//    }
//    $stmt->bindParam(':ends_at', $ends_at);
//
//    $stmt->bindParam(':location', $_POST['location']);
//    $stmt->bindParam(':min_participants', $_POST['min_participants']);
//    $stmt->bindParam(':max_participants', $_POST['max_participants']);
//
//    if (array_key_exists('surprise_me', $_POST) && $_POST['surprise_me'] != '') {
//        $surprise_me = 1;
//    } else {
//        $surprise_me = 0;
//    }
//    $stmt->bindParam(':surprise_me', $surprise_me, PDO::PARAM_INT);
//
//    $price = 0.0;
//    if (array_key_exists('price', $_POST) && is_numeric($_POST['price'])) {
//        $price = $_POST['price'];
//    }
//    $stmt->bindParam(':price', $price);
//
//    $stmt->execute();
//
//    $id_event = $dbh->lastInsertId();
//
//    if (is_numeric($id_event) && is_array($_POST['event_tags'])) {
//        foreach($_POST['event_tags'] as $tag_id) {
//            $stmt = $dbh->prepare("INSERT INTO event_tag (event_id, tag_id) VALUES (:event_id, :tag_id)");
//            $stmt->bindParam(':event_id', $id_event);
//            $stmt->bindParam(':tag_id', $tag_id);
//            $stmt->execute();
//        }
//    }
//
//    random_rule($id_event);



    // rediriger où ?
//    header("Location: index.php");
//}


require('header.php');

?>
    <section class="max-width">

        <form method="POST">

            <div class="row">

                <div style="margin-right:30px;">
                    <img src="includes/img/effeil.jpg" alt="" width="220" />
                    <br /><a href="" title="" style="font-size:12px;">Changer la photo du Groupe</a>
                </div>
                <div class="column form">
                    <h2 style="margin-top:0;">Groupe</h2>
                    <div>
                        <label for="categories">Type du Groupe* :</label>
                        <select>
                            <option name="categories[]" value="1" id="tag_1">Type 1</option>
                            <option name="categories[]" value="2" id="tag_2">Type 2</option>
                            <option name="categories[]" value="3" id="tag_3">Type 3</option>
                            <option name="categories[]" value="4" id="tag_4">Type 4</option>
                            <option name="categories[]" value="5" id="tag_5">Type 5</option>
                            <option name="categories[]" value="6" id="tag_6">Type 6</option>
                            <option name="categories[]" value="7" id="tag_7">Type 7</option>
                        </select>
                    </div>
                    <div>
                        <label for="title">Titre du Groupe* :</label>
                        <input type="text" name="title" value="test" placeholder="Titre" required="required" />
                    </div>
                    <div class="row">
                        <div style="margin-right:60px;">
                            <label for="date_start_at">Date* :</label>
                            <div class="row">
                                <input type="date" min="2017-04-19" name="date_start_at" required="required" style="margin:0 5px 0 0;width:100px;display:inline-block;vertical-align: top;"/>
                                à
                                <input type="time" name="time_start_at" style="margin:0 5px;width:80px;display:inline-block;vertical-align: top;"/>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="location">Localisation* :</label>
                        <input type="text" name="location" value="test" placeholder="Adresse de l'évenement" required="required" style="width:500px;"/>
                    </div>
                    <div>
                        <label for="price">Prix du Groupe :</label>
                        <input type="number" name="price" />€
                    </div>
                    <div>
                        <label for="description">Description :</label>
                        <textarea name="description"></textarea>
                    </div>
                    <br/>
                    <button type="submit" name="create_event" class="button" style="border:0;">Créer l'évènement</button>
                </div>
            </div>


        </form>

    </section>
<?php

require('footer.php');
