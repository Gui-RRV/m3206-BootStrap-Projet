<?php
/**
 * Remove an event from the database.
 *
 * We do not check that the event is created by the user.
 * We do not check that the user is identified.
 */
session_start();
include 'functions.php';

$dbh = db_connection();
$sth = $dbh->prepare('DELETE FROM events WHERE id = :id');
$data = array('id' => $_GET['id']);
$sth->execute($data);
$sth->closeCursor();
header('Location: index.php');
?>