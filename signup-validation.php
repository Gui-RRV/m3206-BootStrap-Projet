<?php
/**
 * Insert a new user into the database.
 *
 * We do not check if the username is already registered.
 * We do not encrypt the password.
 */
session_start();
include 'functions.php';

$dbh = db_connection();
$sth = $dbh->prepare('INSERT INTO users(login, pass) VALUES(:login, :pass)');
$data = array(
	'login'  => $_POST['login'],
	'pass' => $_POST['password']
);
$sth->execute($data);
$sth->closeCursor();

$_SESSION['login'] = true;

header('Location: index.php');
?>