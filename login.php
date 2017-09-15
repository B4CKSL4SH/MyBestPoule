<?php
require('header.php');

?>

<div class="content">
    <div class="dash">

        <div style="padding-left:82px;">
            <h2 for="login">Connectez-vous</h2>

            <form name="login" method="post">
                <label for="email">Votre Email</label>
                <input type="email" name="email" id="email" placeholder="Votre Email" required style="width:250px;"/>
                <br />
                <label for="password" style="display:flex;flex-direction: row;justify-content: space-between;">Votre mot de passe <a href="" title="" style="padding-right:75px;font-size:12px;color:#999;">oublié ?</a></label>
                <input type="password" name="password" id="password" placeholder="Votre mot de passe" required style="width:250px;"/>
                <br />
                <a href="/" type="submit" name="login" style="color:#fff;" class="button">Se connecte</a>
            </form>
            <br />
            <p>ou <a href="" title="">s'inscrire</a></p>

        </div>
    </div>
    <div class="map">

        <div class="group-home">
            <img src="includes/img/1.jpg" alt="" />

            <div style="padding:12px;">
                <h3 style="margin-bottom:0;">Cours d'informatique <span style="padding-left:30px;">28€</span></h3>
                <p style="color:#999;margin-top:0;">31/10/2017</p>
                <p style="display:flex;justify-content: space-between;align-items: center;">
                    <span style="padding-right:40px;"><i class="fa fa-users" aria-hidden="true" style="font-size:16px;"></i>&nbsp;&nbsp; 6 personnes /20</span>
                    <a href="" title="" class="button secondary" style="padding-top:7px;padding-bottom:7px;">Go !</a>
                </p>
            </div>
        </div>


        <div class="group-home">
            <img src="includes/img/2.jpg" alt="" />

            <div style="padding:12px;">
                <h3 style="margin-bottom:0;">Recours collectif <span style="padding-left:80px;">200€</span></h3>
                <p style="color:#999;margin-top:0;">15/08/2017</p>
                <p style="display:flex;justify-content: space-between;align-items: center;">
                    <span style="padding-right:40px;"><i class="fa fa-users" aria-hidden="true" style="font-size:16px;"></i>&nbsp;&nbsp; 4 personnes /8</span>
                    <a href="" title="" class="button secondary" style="padding-top:7px;padding-bottom:7px;">Go !</a>
                </p>
            </div>
        </div>


        <div class="group-home bigone">
            <img src="includes/img/3.jpg" alt="" />
            <div style="padding:12px;">
                <h3 style="margin-bottom:0;">Mathématisons <span style="padding-left:300px;">15€</span></h3>
                <p style="color:#999;margin-top:0;">12/10/2017</p>
                <p style="display:flex;justify-content: space-between;align-items: center;">
                    <span style="padding-right:220px;"><i class="fa fa-users" aria-hidden="true" style="font-size:16px;"></i>&nbsp;&nbsp; 3 personnes /5</span>
                    <a href="" title="" class="button secondary" style="padding-top:7px;padding-bottom:7px;">Go !</a>
                </p>
            </div>
        </div>


        <div class="group-home bigone" style="margin-top:-130px;">
            <img src="includes/img/concert.jpg" alt="" />

            <div style="padding:12px;">
                <h3 style="margin-bottom:0;">Cours de chant <span style="padding-left:300px;">55€</span></h3>
                <p style="color:#999;margin-top:0;">31/10/2017</p>
                <p style="display:flex;justify-content: space-between;align-items: center;">
                    <span style="padding-right:220px;"><i class="fa fa-users" aria-hidden="true" style="font-size:16px;"></i>&nbsp;&nbsp; 10 personnes /12</span>
                    <a href="" title="" class="button secondary" style="padding-top:7px;padding-bottom:7px;">Go !</a>
                </p>
            </div>
        </div>

        <div class="group-home">
            <img src="includes/img/4.jpg" alt="" />

            <div style="padding:12px;">
                <h3 style="margin-bottom:0;">Devenez votre propre patron <span style="padding-left:10px;">78€</span></h3>
                <p style="color:#999;margin-top:0;">15/08/2017</p>
                <p style="display:flex;justify-content: space-between;align-items: center;">
                    <span style="padding-right:40px;"><i class="fa fa-users" aria-hidden="true" style="font-size:16px;"></i>&nbsp;&nbsp; 4 personnes /6</span>
                    <a href="" title="" class="button secondary" style="padding-top:7px;padding-bottom:7px;">Go !</a>
                </p>
            </div>
        </div>
        <div class="group-home">
            <img src="includes/img/effeil.jpg" alt="" height="350" width="300" />

            <div style="padding:12px;">
                <h3 style="margin-bottom:0;">Reussir votre RDV <span style="padding-left:80px;">13€</span></h3>
                <p style="color:#999;margin-top:0;">15/08/2017</p>
                <p style="display:flex;justify-content: space-between;align-items: center;">
                    <span style="padding-right:40px;"><i class="fa fa-users" aria-hidden="true" style="font-size:16px;"></i>&nbsp;&nbsp; 4 personnes /8</span>
                    <a href="" title="" class="button secondary" style="padding-top:7px;padding-bottom:7px;">Go !</a>
                </p>
            </div>
        </div>



    </div>

</div>

<?php
require('footer.php');
