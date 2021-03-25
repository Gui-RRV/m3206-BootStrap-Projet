<?php
/**
 * Check if the user is registered in the database
 *
 */
session_start();
require 'App/Autoloader.php';
App\Autoloader::register();

$Login=htmlspecialchars($_POST['login']);
$Pass=htmlspecialchars($_POST['password']);
$Bad=0;


$db = new App\Database('projetm3206');
$Check=$db->IsExist(array($Login));

if ($Check === 0) {
	$Bad= 1;
}elseif($Check === 1){
	$PassCheck= $db->PassCheck($Login,$Pass);
	if ($PassCheck === true) {
		$data=$db->prepare('SELECT id FROM utilisateurs WHERE login = :login',array( 'login' => $Login),'App/database','true');
		
		$_SESSION['login']=$data['id'];
		header('location:index.php');

	}else{
		$Bad=2;
	}
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Projet M3206</title>
</head>
<body>
    <p>
    	<?php 

    	if($Bad === 1){
    		echo 'Le nom d\'utilisateur n\'est pas le bon.<a href="index.php">Retour</a>';
    	}elseif($Bad === 2){
    		echo'Le mot de passe est mauvais, réessayez, sinon ça va veut dire que vous êtes un imposteur :@ <a href="index.php">Retour</a>';
    	}else{
    		echo 'Je sais pas ce que vous avez fait, mais il y a une erreur, c\'est facheux. <a href="index.php">Retour</a>';
    	}

    	 ?>
    </p>
</body>
</html>
