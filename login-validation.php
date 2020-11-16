<?php
/**
 * Check if the user is registered in the database
 *
 * We do not check if the username exists in the database.
 * We do not check if the username exists in the database, but the password is wrong.
 */
session_start();
include 'functions.php';

$dbh = db_connection();
$sth = $dbh->prepare('SELECT * FROM users WHERE login = :login AND pass = :pass');
$data = array(
    'login'  => $_POST['login'],
    'pass' => $_POST['password']
);
$sth->execute($data);
$result = $sth->fetchAll();
if (!empty($result)) :
    $_SESSION['login'] = $_POST['login'];
    header('Location: index.php');
else :
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Projet M3206</title>
</head>
<body>
    <p>
        Le nom d'utilisateur ou le mot de passe sont incorrects. <a href="index.php">Retour</a>
    </p>
</body>
</html>
<?php endif; ?>