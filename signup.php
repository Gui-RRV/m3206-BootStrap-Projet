<?php session_start();
require 'App/Autoloader.php';
App\Autoloader::register();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Projet M3206</title>
</head>
<body>

    <?php if (isset($_SESSION['login'])) { 
        App\Form::InsertForm();
    }else{ ?>

        <form method="post" action="signup-validation.php">
            <label for="username">Nom d'utilisateur :</label>
            <input id="username" type="text" name="login">
            <label for="password">Mot de passe :</label>
            <input id="password" type="password" name="password">
            <input type="submit" value="Envoyer">
        </form>

        <?php } ?> 

</body>
</html>