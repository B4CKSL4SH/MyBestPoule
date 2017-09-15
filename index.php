<?php
ini_set('session.save_path', '/tmp/');
include_once('functions.php');
$allGroups = getGroups();
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


            </div>

        </div>
        <!--    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.223686826885!2d2.3141556161638466!3d48.873012179289056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66fc915567a93%3A0xb4f9b09540439f82!2s12+Rue+de+Penthi%C3%A8vre%2C+75008+Paris!5e0!3m2!1sfr!2sfr!4v1505468909929" frameborder="0" style="border:0" allowfullscreen></iframe>-->
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
                        if (markers.length < 20) {
                            return {
                                content: "<div class='cluster cluster-1'>" + markers.length + "</div>",
                                x: -26,
                                y: -26
                            };
                        }
                    }
                }
            })
                .on('click', function (marker) {
                    /*map.infowindow({content: marker.content})
                        .then(function (infowindow) {
                            marker.addListener('click', function() {
                                infowindow.open(map, marker);
                            });
                        });*/
                });
        </script>


    </div>



<?php
require('footer.php');
