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
                	    <img src="includes/img/maths.jpg" alt="" />
                	    <div>
                	        <p style="display:flex;margin:0;justify-content:space-between;color:#333;"><?php echo $group['title']; ?></span><span><?php echo str_replace('.', ',', $group['price']) . '€'; ?></span></p>
                	        <p style="color:#777;">Prévu le <?php echo date('d/m/Y, à H\h', strtotime($group['event_at'])); ?></p>
                	        <p style="color:#777;">12 rue de penthièvre, 75008 Paris</p>
                	        <p><a href="" title="voir +">voir +</a></p>
                	    </div>
                	</div>
                <?php } ?>
                <div class="group">
                    <img src="includes/img/maths.jpg" alt="" />
                    <div>
                        <p style="display:flex;margin:0;justify-content:space-between;color:#333;">Cours de maths</span><span>19,99€</span></p>
                        <p style="color:#777;">Prévu le 15/09/2017</p>
                        <p style="color:#777;">12 rue de penthièvre, 75008 Paris</p>
                        <p><a href="" title="voir +">voir +</a></p>
                    </div>
                </div>
                <div class="group">
                    <img src="includes/img/maths.jpg" alt="" />
                    <div>
                        <p style="display:flex;margin:0;justify-content:space-between;color:#333;">Cours de maths</span><span>19,99€</span></p>
                        <p style="color:#777;">Prévu le 15/09/2017</p>
                        <p style="color:#777;">12 rue de penthièvre, 75008 Paris</p>
                        <p><a href="" title="voir +">voir +</a></p>
                    </div>
                </div>
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
                <div class="detail">
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
            		title: '.json_encode($group['title']).',
            		description: "'.$group['description'].'",
            		price: "'.$group['price'].'"
            	});';
            } ?>
                /*{
                    position: [48.8620722, 2.352047],
                    content: 'blabla',
                    custom: 'test'
                },
                {
                    position: [48.88247672, 2.35566598],
                    content: 'blabla2',
                    custom: 'test2'
                },
                {
                    position: [48.85592868, 2.36074691],
                    content: 'blabla2',
                    custom: 'test2'
                },
                {
                    position: [48.85374426, 2.30413425],
                    content: 'blabla2',
                    custom: 'test2'
                },
                {
                    position: [48.86920446, 2.36250864],
                    content: 'blabla2',
                    custom: 'test2'
                }
                ,
                {
                    position: [48.87145368, 2.3511489],
                    content: 'blabla2',
                    custom: 'test2'
                },
                {
                    position: [48.86781688, 2.30280942],
                    content: 'blabla2',
                    custom: 'test2'
                },
                {
                    position: [48.83138852, 2.36738102],
                    content: 'blabla2',
                    custom: 'test2'
                },
                {
                    position: [48.88583389, 2.35776787],
                    content: 'blabla2',
                    custom: 'test2'
                },
                {
                    position: [48.8233784, 2.33637207],
                    content: 'blabla2',
                    custom: 'test2'
                },
                {
                    position: [48.85279301, 2.3239477],
                    content: 'blabla2',
                    custom: 'test2'
                }
            ];*/
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
