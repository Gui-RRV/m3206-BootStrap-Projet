<?php 

namespace App

use \PDO

	private $db_name;
	private $db_user;
	private $db_pass;
	private $db_host;
	private $local;
	private $dbh;
/**
 * 
 */
class ClassName database
{
	
	function __construct($db_name, $db_user = 'root', $db_pass='', $db_host ='localhost',$local ='true')
	{

		if($local == 'true'){
			$this->db_name = $db_name;
			$this->db_user = $db_user;
			$this->db_pass = $db_pass;
			$this->db_host = $db_host;	
		}else{
			$this->db_name = 'r19006062';
			$this->db_user = '19006062';
			$this->db_pass = 'secret';
			$this->db_host = 'localhost';	
		}
	
	}

	private function GetPDO(){

		if ($this->dbh === null) {
			$dbh = new PDO('mysql:host=$db_host;dbname=$db_name;charset=utf8', 
	               '$db_user', 
	               '$db_pass');

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

	public function prepare($statement, $values,$one=false){
		$sth = $this->GetPDO()->prepare($statement);
		$sth->execute($values);
		$sth->setFetchMode(PDO::FETCH_CLASS,);
		if($one){
			$data = $sth->fetch();

		}else{
			$data = $sth->fetchAll();
		}

		
		return  $data;
	}
}


