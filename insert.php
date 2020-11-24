<?php
/**
 * Insert an event into the database.
 */
session_start();
require 'App/Autoloader.php';
App\Autoloader::register();

$db = new App\database('projetm3206');
$sth = $db->insert('INSERT INTO events(user, title, description, date) VALUES(:user, :title, :description, :date)',array('user'  => $_SESSION['login'],'title' => $_POST['title'],'description' => $_POST['description'],'date' => $_POST['date']));



header('Location: index.php');
?>

