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
	
	function __construct($db_name, $db_user = 'root', $db_pass= '', $db_host ='localhost',$local ='true')
	{

		if($local == 'true'){
			$this->db_name = $db_name;
			$this->db_user = $db_user;
			$this->db_pass = $db_pass;
			$this->db_host = $db_host;	
		}elseif($local =='false'){
			$this->db_name = 'r19006062';
			$this->db_user = '19006062';
			$this->db_pass = 'secret';
			$this->db_host = 'localhost';	
		}else{
			echo "Il y a eu une erreur quelque part... Appelez un admin !";
		}
	
	}

	private function GetPDO(){

		if ($this->dbh === null) {
			$dbh = new PDO('mysql:host=localhost;dbname=projetm3206;charset=utf8','root','');

			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$this->dbh = $dbh;
		}

		return $this->dbh;
	}

	public function query($statement){
		$sth= $this->GetPDO()->query($statement);

		$data=$sth->fetchAll(PDO::FETCH_CLASS);
		return $data;
	}

	public function prepare($statement, $values,$class_name,$one=false){
		$sth = $this->GetPDO()->prepare($statement);
		$sth->execute([$values]);
		$sth->setFetchMode(PDO::FETCH_CLASS,$class_name);
		if($one){
			$data = $sth->fetch();

		}else{
			$data = $sth->fetchAll();
		}

		
		return  $data;
	}

	public function insert($statement, $values,$id=null){
		$sth= $this->GetPDO()->prepare($statement);
		$sth->execute($values);
		$id=$this->GetPDO()->lastInsertId();
		return $id;
	}

	public function IsExist($login){
		$sth= $this->GetPDO()->prepare('SELECT * FROM users where login = ?');
		$sth->execute($login);
		$exe=$sth->rowCount();
		return $exe;
	}

	public function PassCheck($login,$pass){
		$sth= $this->GetPDO()->prepare('SELECT pass FROM users where login = ?');
		$sth->execute(array($login));
		$data=$sth->fetch();
		$exe=password_verify($pass, $data['pass']);

		return $exe;
	}
}


