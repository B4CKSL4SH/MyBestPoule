<?php
include_once('functions.php');
$dbh = get_database();

    if (!empty($_POST) && isset($_POST['login'])) {
        // connection du user + redirection vers le dashboard
        $result = signin($_POST['email'], $_POST['password']);
        if (!$result) {
            die("Erreur d'authentification");
        }

        header('Location: index.php');
        exit;

    } elseif (!empty($_POST) && isset($_POST['signup'])) {
        // creation du user + redirection vers choix des filtres
        $id = signup($_POST['email'], $_POST['password']);

        header('Location: profile.php');
        exit;
    }

require('header.php');

?>

<section class="max-width">

    <div style="margin:auto;">
        <center><h2 for="login">Connectez-vous</h2></center>

        <form name="login" method="post">
            <label for="email">Votre Email</label>
            <input type="email" name="email" id="email" placeholder="Votre Email" required style="width:250px;"/>
            <br /><br />
            <label for="password">Votre mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Votre mot de passe" required style="width:250px;"/>
            <br />
            <input type="submit" name="login" value="Se connecter" class="button" style="border:0;"/>
        </form>

        <center><h2> ou </h2></center>

        <form name="signup" method="post">
            <div>
                <label for="email">Votre e-mail</label>
                <input type="email" name="email" id="email" placeholder="Votre Email" required style="width:250px;"/><br />
            </div>
            <br />
            <div>
                <label for="password">Votre mot de passe</label>
                <input type="password" name="password" id="password" placeholder="" required style="width:250px;"/><br />
            </div>
            <input type="submit" name="signup" value="S'inscrire" class="button" style="border:0;"/>
        </form>

    </div>

</section>


<?php

require('footer.php');
