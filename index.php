<?php
include_once('functions.php');
$dbh = get_database();
require('header.php');

?>

                <a href="profile.php" title="" class="button grey"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
    <section class="max-width">

        <?php
            $notifications = getUserNotifications();
            if (isset($notifications[0])) :
        ?>


        <div class="row" style="justify-content:space-around;">
            <div class="event_accept column" style="border-left:5px solid #26bea7;">
                <p><?php echo utf8_encode($notifications[0]['notif_title']) ?></p>
                <div class="row">
                    <img src="includes/img/effeil.jpg" alt="" width="200" height="166" />

                    <div class="column">
                        <h1 style="margin:0;"><?php echo utf8_encode($notifications[0]['title']) ?></h1>
                        <p style="line-height:25px;">
                            Du <?php echo date('d/m/Y à H:i', strtotime($notifications[0]['start_at'])) ?> au <?php echo date('d/m/Y à H:i', strtotime($notifications[0]['ends_at'])) ?><br />
                            <span style="color:#888;">Prix d'entrée :</span> <?php echo $notifications[0]['price'] ?>€/pers.<br />
                            <span style="color:#888;">Adresse :</span> <?php echo $notifications[0]['location'] ?>
                        </p>
                        <p><a href="" title="">En savoir +</a></p>
                    </div>
                </div>
            </div>
            <div class="column" style="flex:1;">
                <div class="event event_2 gold" style="border-left:5px solid #f7c600;margin-bottom:5px;background-image:url('includes/img/sport.jpg') ;">
                    <p style="margin:5px 0;">30 avril 2017<br />4 participants</p>
                    <h3>Tennis</h3>


                    <div class="overtherainbow"></div>
                </div>
                <div class="event event_2" style="border-left:5px solid #18a3ce;background-image:url('includes/img/concert.jpg') ;">
                    <br />
                    <p style="margin:5px 0;">1<sup>er</sup> mai 2017<br />
                    9 participants</p>
                    <h3>Concert Jazz</h3>

                    <div class="overtherainbow"></div>
                </div>
            </div>
        </div>
        <?php
            endif;
        ?>
<!--
        <div class="row" style="justify-content:space-around;">
            <div class="event_accept column" style="border-left:5px solid #26bea7;">
                <p>Vous avez été sélectionné pour participer à : </p>
                <div class="row">
                    <img src="includes/img/disney.jpg" alt="" width="200" height="166" />

                    <div class="column">
                        <h1 style="margin:0;">Saison de la Force - Disneyland</h1>
                        <p style="line-height:25px;">
                            Dimanche 05 mai 2017, de 10h à 18h<br />
                            <span style="color:#888;">Prix d'entrée :</span> 25€/pers.<br />
                            <span style="color:#888;">Adresse :</span> 21 Avenue des Frênes, 77777 Marne-la-Vallée
                        </p>
                        <p><a href="" title="">En savoir +</a></p>
                    </div>
                </div>


                <br />
                <p>
                    <b>Bon à savoir :</b><br />
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec erat felis. Nunc elementum neque non dui mattis commodo. Nulla interdum, quam nec scelerisque varius, turpis eros scelerisque neque, ut auctor tortor massa id sem. Duis efficitur est nec bibendum interdum. Sed hendrerit mollis molestie.
                </p>
            </div>
            <div class="column" style="flex:1;">
                <div class="event event_2 gold" style="border-left:5px solid #f7c600;margin-bottom:5px;background-image:url('includes/img/sport.jpg') ;">
                    <p style="margin:5px 0;">30 avril 2017<br />4 participants</p>
                    <h3>Tennis</h3>


                    <div class="overtherainbow"></div>
                </div>
                <div class="event event_2" style="border-left:5px solid #18a3ce;background-image:url('includes/img/concert.jpg') ;">
                    <br />
                    <p style="margin:5px 0;">1<sup>er</sup> mai 2017<br />
                    9 participants</p>
                    <h3>Concert Jazz</h3>

                    <div class="overtherainbow"></div>
                </div>
            </div>
        </div>-->

        <br />

        <h2>Events <span>à venir</span></h2>

        <div class="row">
            <div class="event w25" style="background-image:url('includes/img/concert.jpg') ;">
                <i class="fa fa-music" aria-hidden="true"></i>
                <div class="bulle">3</div>
                <h3>Event <span>concert</span></h3>
                <div class="overtherainbow"></div>
            </div>

            <div class="event w15 violet" style="background-image:url('includes/img/musee.jpg') ;">
                <i class="fa fa-picture-o" aria-hidden="true"></i>
                <div class="bulle">1</div>
                <h3>Event <span>culturel</span></h3>
                <div class="overtherainbow"></div>
            </div>

            <div class="event w35 gold" style="background-image:url('includes/img/game.jpg') ;">
                <i class="fa fa-trophy" aria-hidden="true"></i>
                <div class="bulle">5</div>
                <h3>Event <span>escape game</span></h3>
                <div class="overtherainbow"></div>
            </div>
        </div>



        <h2>Events <span>terminés</span></h2>




        <div class="create_event">
            <p class="title" style="margin-top:0;">Une idée de sortie ?</p>
            <p>Lorem ipsum dolor sit amet, adi dolor elit.<br />Mauris eu rutrum...</p>

            <a href="create_event.php" title="" class="button">Créer l'évènement !</a>
            <p style="font-size:12px;opacity:0.7;margin-bottom:0;text-align:center;text-decoration:underline;">Malsuda non lorem ?</p>
        </div>
    </section>

<?php
require('footer.php');
