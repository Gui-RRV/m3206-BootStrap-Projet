<?php
/**
 * Insert an event into the database.
 */
session_start();
require 'App/Autoloader.php';
App\Autoloader::register();

$slug=$_POST['title'];
$slug = str_replace(array('\'','à','é','è','ù',' '), '-', $slug);
$slug = strtolower($slug);








$db = new App\Database('projetm3206');
$sth = $db->insert('INSERT INTO events(slug,user, title, description, date) VALUES(:slug,:user, :title, :description, :date)',array('slug' => $slug ,'user'  => $_SESSION['login'],'title' => $_POST['title'],'description' => $_POST['description'],'date' => $_POST['date']));

setcookie('timer', $slug, time() + 2*60*60);


header('Location: index.php');
?>

