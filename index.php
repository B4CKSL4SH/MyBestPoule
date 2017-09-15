<?php
ini_set('session.save_path', '/home/asavva/tmp/');
//include_once('functions.php');
require('header.php');
?>

<div class="content">

    <div class="dash">

        <div>
            <br />
            <div class="profil">
                <img src="includes/img/3.png" alt="" />
                <div style="flex:1;">
                    <p>Bonjour John Doe</span><br />
                    <a href="" title="voir profil">voir mon profil</a></p>

                    <p>NEW ! 2 personnes se sont ajoutées au groupe XX</p>
                    <hr />
                </div>
            </div>

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
                <a href="" title="" class="button">
                    Proposer un groupe
                </a>
            </center>


        </div>

    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.223686826885!2d2.3141556161638466!3d48.873012179289056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66fc915567a93%3A0xb4f9b09540439f82!2s12+Rue+de+Penthi%C3%A8vre%2C+75008+Paris!5e0!3m2!1sfr!2sfr!4v1505468909929" frameborder="0" style="border:0" allowfullscreen></iframe>


</div>

<?php
require('footer.php');
