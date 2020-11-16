<?php
/**
 * Insert an event into the database.
 */
session_start();
include 'functions.php';

$dbh = db_connection();
$sth = $dbh->prepare('INSERT INTO events(user, title, description, date) 
                      VALUES(:user, :title, :description, :date)');
$data = array(
	'user'  => $_SESSION['login'],
	'title' => $_POST['title'],
	'description' => $_POST['description'],
	'date' => $_POST['date'],
);
$sth->execute($data);
$sth->closeCursor();
header('Location: index.php');
?>