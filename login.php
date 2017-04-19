<html>
    <head>
    </head>
    <body>
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
            <form name="signup" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label for="email">Votre Email</label>
                <input type="email" name="email" id="email" placeholder="Votre Email" required /><br />
                <label for="password">Votre mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Votre mot de passe" required /><br />
                <input type="submit" name="signup" value="S'inscrire" />
            </form>
        </div>
        <?php
        if (!empty($_POST) && isset($_POST['login'])) {
            // connection du user + redirection vers le dashboard
            // $login = $_POST['email'];
            // $pswd = $_POST['password'];
        } elseif (!empty($_POST) && isset($_POST['signup'])) {
            // creation du user + redirection vers choix des filtres
            // $login = $_POST['email'];
            // $pswd = $_POST['password'];
        }
        ?>
    </body>
</html>