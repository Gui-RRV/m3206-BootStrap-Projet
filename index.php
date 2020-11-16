<?php
session_start();
include 'functions.php';
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
$dbh = db_connection();
$sth = $dbh->prepare('SELECT * FROM events WHERE user = :login');
$data = array('login'  => $_SESSION['login']);
$sth->execute($data);
while ($row = $sth->fetch()) {
    $date = new DateTime($row['date']);
?>
    <div>
        <h3><?php echo $row['title']; ?></h3>
        <p><?php echo $row['description']; ?></p>
        <p><?php echo $row['date']; ?></p>
        <ul>
            <li><?php echo elapsed_years($date); ?> années</li>
            <li><?php echo elapsed_months($date); ?> mois</li>
            <li><?php echo elapsed_weeks($date); ?> semaines</li>
            <li><?php echo elapsed_days($date); ?> jours</li>
        </ul>
        <a href="remove.php?id=<?php echo $row['id'] ?>">Supprimer</a>
    </div>
<?php
}
$sth->closeCursor();
?>
    Un nouveau événement ?
    <form method="post" action="insert.php">
        <label for="title">Titre :</label>
        <input id="title" type="text" name="title">
        <label for="description">Description (optionnel) :</label>
        <input id="description" type="text" name="description">
        <label for="date">Date :</label>
        <input id="date" type="date" name="date">
        <input type="submit" value="Ajouter">
    </form>
<?php endif; ?>
</body>
</html>