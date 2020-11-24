<?php

session_start();

require 'App/Autoloader.php';
include 'App/form.php';
App\Autoloader::register();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Projet M3206</title>
</head>
<body>
    <div>
<?php if (isset($_SESSION['login'])) : ?>
        <a href="logout.php">Déconnexion</a>
<?php else : ?>
        <a href="login.php">S'identifier</a> - <a href="signup.php">S'inscrire</a>
<?php endif; ?>
    </div>

<?php if (isset($_SESSION['login'])) : ?>
    <h2>Mes événements</h2>
<?php
$count=0;
$dbh = new App\Database('projetm3206');
$sth = $dbh->prepare('SELECT * FROM events WHERE user = ?',$_SESSION['login'],'App/database');

foreach ($sth as $data) {

    $count++;
   echo'<h1>Voici l\'événement :'.$data['title'].'</h1> Sa date initiale est :'.$data['date'];
   echo "<br>";
   echo "Voici une description: " .$data['description'];
   if ($count === 2) {
    echo '<br>Vous voulez voir vos autres événement en détail ? <a href="">cliquez ici ! </a>';
       break;
       
   }
}
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
App\Form::InsertForm();

?>
<!--     Un nouvel événement ?
    <form method="post" action="insert.php">
        <label for="title">Titre :</label>
        <input id="title" type="text" name="title">
        <label for="description">Description (optionnel) :</label>
        <input id="description" type="text" name="description">
        <label for="date">Date :</label>
        <input id="date" type="date" name="date">
        <input type="submit" value="Ajouter">
    </form> -->
<?php endif; ?>
</body>
</html>