<?php
ini_set('session.save_path', '/home/fdevienne/tmp/');
//include_once('functions.php');
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


            </div>

        </div>
        <!--    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.223686826885!2d2.3141556161638466!3d48.873012179289056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66fc915567a93%3A0xb4f9b09540439f82!2s12+Rue+de+Penthi%C3%A8vre%2C+75008+Paris!5e0!3m2!1sfr!2sfr!4v1505468909929" frameborder="0" style="border:0" allowfullscreen></iframe>-->
        <div class="map"></div>

        <script>
            var list = [
                {
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
                },
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
            ];
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
                    map.infowindow({content: marker.content})
                        .then(function (infowindow) {
                            marker.addListener('click', function() {
                                infowindow.open(map, marker);
                            });
                        });
                });
        </script>


    </div>



<?php
require('footer.php');
