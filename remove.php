<?php
/**
 * Remove an event from the database.
 *
 */

session_start();
require 'App/Autoloader.php';
App\Autoloader::register();

$id = $_GET['id'];
$user = $_SESSION['login'];
echo $id;

$db = new App\Database('projetm3206');


$sth = $db->prepare('SELECT * FROM events WHERE user = :user AND id = :id', array('user' => $user , 'id' => $id ),'App/database','true');

if( isset($_SESSION['login']) && $id == $sth['id'] ){
	$del = $db->DeleteEvent($id);
}

if ($del === 'true') {
	header('Location: index.php');
}else{
	echo "erreur fatale, il faudrait arreter de faire des choses illégales :/";
}



?>