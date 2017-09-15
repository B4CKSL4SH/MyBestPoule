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
                <a href="" type="submit" name="login" style="color:#fff;" class="button">Se connecte</a>
            </form>
            <br />
            <p>ou <a href="" title="">s'inscrire</a></p>

        </div>
    </div>
    <div class="map">

        <div class="group-home">
            <img src="includes/img/1.jpg" alt="" />

            <div style="padding:12px;">
                <h3>Cours d'informatique</h3>
                <p>28€</p>

                <p><i class="fa fa-users" aria-hidden="true" style="font-size:16px;"></i> 6 personnes /20</p>
            </div>
        </div>

    </div>

</div>

<?php
require('footer.php');
