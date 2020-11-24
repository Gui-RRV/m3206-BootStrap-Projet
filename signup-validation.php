<?php
/**
 * Insert a new user into the database.
 */
session_start();
require 'App/Autoloader.php';
App\Autoloader::register();
$db = new App\database('projetm3206');


$log=htmlspecialchars($_POST['login']);
$pass=htmlspecialchars($_POST['password']);
$PassCrypt=password_hash($pass, PASSWORD_DEFAULT);

$testId=$db->IsExist(array($log));

if ($testId === 0) {
	$sth = $db->insert('INSERT INTO users(login, pass) VALUES(:login, :pass)',array('login'  => $log,'pass' => $PassCrypt));
	$_SESSION['login'] = $sth;
}else{
	echo "Ce nom d'utilisateur existe déjà, veuillez en trouver un nouveau";
	echo '<a href="index.php">Cliquez ici pour retourner à l\'accueil</a>';
}









header('Location: signup.php');
?>