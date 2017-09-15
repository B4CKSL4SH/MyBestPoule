<?php
ini_set('session.save_path', '/tmp/');
include_once('functions.php');
$allGroups = getGroups();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = get_current_user_id();

    $stmt = $dbh->prepare("INSERT INTO group_details (group_type_id, title, event_at, price, localization, coords, description) VALUES (:type_id, :title, :event_at, :price, :localization, :coords, :description)");
    $stmt->bindParam(':type_id', $_POST['cat']);
    $stmt->bindParam(':title', $_POST['title']);
    $stmt->bindParam(':description', $_POST['description']);

    $start_at = $_POST['date_start_at'];
    if ($_POST['time_start_at']) {
        $start_at .= ' '.$_POST['time_start_at'];
    }
    $stmt->bindParam(':start_at', $start_at);
    $price = 0.0;
    if (array_key_exists('price', $_POST) && is_numeric($_POST['price'])) {
        $price = $_POST['price'];
    }
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':localization', $_POST['location']);
    $coords = '48.8730122,2.316344299999969';
    $stmt->bindParam(':coords', $coords);
    $stmt->execute();

    $group_id = $dbh->lastInsertId();

    if (is_numeric($group_id)) {
        $stmt = $dbh->prepare("INSERT INTO user_group_list (user_id, group_details_id) VALUES (:user_id, :group_id)");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':group_id', $group_id);
        $stmt->execute();
    }
}
require('header.php');
?>

    <div class="content">

        <div class="dash">

            <div>
                <div class="profil">
                    <img src="includes/img/3.png" alt="" />
                    <div style="flex:1;">
                        <p>Bonjour John Doe</span><br />
                            <a href="profile.php" title="voir profil">voir mon profil</a></p>

                        <p>NEW ! 2 personnes se sont ajoutées au groupe XX</p>

                    </div>
                </div>
                <br />
                <hr />
                <br />
                <h2>Groupes acceptés</h2>

                <?php foreach ($allGroups as $group) {
                	?><div class="group">
                	    <img src="<?php echo $group['group_type_image'] ?>" alt="" />
                	    <div>
                	        <p style="display:flex;margin:0;justify-content:space-between;color:#333;"><?php echo $group['title']; ?></span><span><?php echo str_replace('.', ',', $group['price']) . '€'; ?></span></p>
                	        <p style="color:#777;">Prévu le <?php echo date('d/m/Y, à H\h', strtotime($group['event_at'])); ?></p>
                	        <p style="color:#777;"><?php echo $group['localization'] ?></p>
                	        <p><a href="" title="voir +">voir +</a></p>
                	    </div>
                	</div>
                <?php } ?>
                <br /><br /><br />

                <center style="">
                    <a class="button" href="#popup1" title="">
                        Proposer un groupe
                    </a>
                </center>

                <div id="popup1" class="overlay" style="display:block;">
                    <div class="popup">
                        <?php require('create_event.php'); ?>
                    </div>
                </div>



                <!-- Bloc Détail demande -->
                <div class="detail" style="display:none;">
                    <div>
                        <img src="includes/img/1.jpg" alt="" style="float:left;margin:0 20px 0;width:300px;"/>
                        <div class="name" style="display:flex;flex-direction: row;justify-content: space-between;">
                            <p>Mathématisons :)</p> <p class="price">100€</p>
                        </div>

                        <p class="type">Cours particulier</p>
                        <br />

                        <p class="date" style="margin:0;">Prévu le 15/09/2017</p>
                        <p class="adresse" style="margin:0;">12 rue de penthièvre, 75008 Paris</p>

                        <p class="description">"Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression... <a href="" title="" style="color:#fff;">Lire la suite</a></p>
                    </div>
                </div>

            </div>

        </div>

        <div class="map"></div>

        <script>
            var list = [];
            <?php foreach ($allGroups as $group) {
            	echo 'list.push({
            		position: ['.$group['coords']['lat'].','.$group['coords']['lon'].'],
            		address: "'.$group['localization'].'",
            		title: '.json_encode($group['title']).',
            		type: '.json_encode($group['group_type_label']).',
            		description: '.json_encode($group['description']).',
            		price: "'.$group['price'].'",
            		event_at: '.json_encode(date('d/m/Y, H:i', strtotime($group['event_at']))).'
            	});';
            } ?>
            var map = $('.map')
                .gmap3({
                    center:[48.8620722, 2.352047],
                    zoom:12,
                });
            map.cluster({
                size: 200,
                markers: list,
                cb: function (markers) {
                    if (markers.length > 1) { // 1 marker stay unchanged (because cb returns nothing)
                        if (markers.length < 3) {
                            return {
                                content: "<div class='cluster cluster-1'>" + markers.length + "</div>",
                                x: -26,
                                y: -26
                            };
                        } else if (markers.length < 5) {
                            return {
                                content: "<div class='cluster cluster-2'>" + markers.length + "</div>",
                                x: -26,
                                y: -26
                            };
                        } else {
                            return {
                                content: "<div class='cluster cluster-3'>" + markers.length + "</div>",
                                x: -26,
                                y: -26
                            };
                        }
                    }
                }
            })
                .on('click', function (marker) {
                    $('.detail').hide();
                    $('.detail .name').html(marker.title);
                    $('.detail .type').html(marker.type);
                    $('.detail .date').html(marker.event_at);
                    $('.detail .adresse').html(marker.adresse);
                    $('.detail .price').html(marker.price);
                    $('.detail .description').html(marker.description);
                    $('.detail').show();
                });
        </script>


    </div>



<?php
require('footer.php');
