<?php 

/**
 Classe permettant de se connecter à la base de données ainsi que d'éxécuter des requêtes, mais contient aussi toutes les méthodes qui intéragissent avec la BDD
 Class allowing to connect to the database and executing statements. It contains as well every methods that interact with our database.
 */
 namespace App;
use\PDO;
class Database{

	private $db_name;
	private $db_user;
	private $db_pass;
	private $db_host;
	private $local;
	private $dbh;
	
	//Le constructor permet de mettre les identifiants en attributs et de les utilisers plus tard dans GetPDO(), si on souhaite se connecter à la BDD de Guillaume RORIVE sur le serveur de l'iut, $local doit valoir false
	//Construct take in parameters the DB logs to set them as attributes an use them in GetPDO(), if we want to use Guillaume RORIVE's DB on the IUT servers, $local has to be 'false'
	function __construct($db_name, $db_user = 'root', $db_pass= '', $db_host ='localhost',$local ='false')
	{

		if($local == 'true'){
			$this->db_name = $db_name;
			$this->db_user = $db_user;
			$this->db_pass = $db_pass;
			$this->db_host = $db_host;	
		}elseif($local =='false'){
			$this->db_name = 'r19006062';
			$this->db_user = 'r19006062';
			$this->db_pass = 'rrrVOmNtAN7sOzB';
			$this->db_host = 'mysql.pedaweb.univ-amu.fr';	
		}else{
			echo "Il y a eu une erreur quelque part... Appelez un admin !";
		}
	
	}

	// Permet de se connecter à la BDD avec les identifiants du constructor et change le mode d'erreur de PDO
	// Allow to connect to the DB with informations in the contruct, it changes the PDO Error mode as well
	private function GetPDO(){

		if ($this->dbh === null) {
			$dbh = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name.';charset=utf8',$this->db_user,$this->db_pass);

			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$this->dbh = $dbh;
		}

		return $this->dbh;
	}

	//Réalise une requête simple qui retourne un objet
	//Do a simple query which returns an object
	public function query($statement){
		$sth= $this->GetPDO()->query($statement);

		$data=$sth->fetchAll(PDO::FETCH_CLASS);
		return $data;
	}

	//Réalise une requête préparé qui retourne un objet, $one permet de spécifier si la requête renverra une seule ou plusieurs ligne pour changer  fetch()
	//Do a simple query which returns an object, $one allow to specify if the query will return just one or many rows so we can change fetch()
	public function prepare($statement, $values,$class_name,$one=false){
		$sth = $this->GetPDO()->prepare($statement);
		$sth->execute($values);
		$sth->setFetchMode(PDO::FETCH_CLASS,$class_name);
		if($one){
			$data = $sth->fetch();

		}else{
			$data = $sth->fetchAll();
		}

		
		return  $data;
	}

	//Permet d'insérer un événement dans la BDD et retourne l'ID du nouvel événement
	//Insert a new event into the DB, it returns the ID of the new event as well
	public function insert($statement, $values,$id=null){
		$sth= $this->GetPDO()->prepare($statement);
		$sth->execute($values);
		$id=$this->GetPDO()->lastInsertId();
		return $id;
	}

	//Permet de vérifier si le login existe déjà dans la BDD, retourne le nombre de ligne affecté, si rowCount() est égal à un, cela veut dire qu'il y a déjà un utilisateur dans la BDD (sert aussi à vérifier si le Login est juste lors de la connexion)
	//Check if the inputed login already exist in the DB, returns the number of affected row, if rowCount() equals at least one, it mean that the DB already contains the user (we can use this as well to check if the user has inputed the correct login)
	public function IsExist($login){
		$sth= $this->GetPDO()->prepare('SELECT * FROM utilisateurs where login = ?');
		$sth->execute($login);
		$exe=$sth->rowCount();
		return $exe;
	}


	//Permet de vérifier si le mot de passe rentré est correct
	//Check if the inputed password is correct
	public function PassCheck($login,$pass){
		$sth= $this->GetPDO()->prepare('SELECT pass FROM utilisateurs where login = ?');
		$sth->execute(array($login));
		$data=$sth->fetch();
		$exe=password_verify($pass, $data['pass']);

		return $exe;
	}

	//Permet d'effacer un événement dans la BDD
	//Delete an event in the DB
	public function DeleteEvent($id){
		$sth = $this->GetPDO()->prepare('DELETE FROM events WHERE id = ?');
		$sth->execute(array($id));

		if ($sth = true && $sth->rowCount() == 1) {
			return 'true';
		}else{
			return 'false';
		}
	}
}


