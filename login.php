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

<div>
    <label for="login">Portail de connection</label>
    <form name="login" method="post">
        <label for="email">Votre Email</label>
        <input type="email" name="email" id="email" placeholder="Votre Email" required /><br />
        <label for="password">Votre mot de passe</label>
        <input type="password" name="password" id="password" placeholder="Votre mot de passe" required /><br />
        <input type="submit" name="login" value="Se connecter" />
    </form>

    <label for="signup">Portail d'inscription</label>
    <form name="signup" method="post">
        <label for="email">Votre Email</label>
        <input type="email" name="email" id="email" placeholder="Votre Email" required /><br />
        <label for="password">Votre mot de passe</label>
        <input type="password" name="password" id="password" placeholder="Votre mot de passe" required /><br />
        <input type="submit" name="signup" value="S'inscrire" />
    </form>
</div>


<?php

require('footer.php');
