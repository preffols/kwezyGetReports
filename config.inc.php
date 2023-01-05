<?php

class config{
private $serverName;
private $userName;
private $password;
private $dbname;

public $charset;


public function connect()
{
	$this->serverName = "localhost";
	$this->userName = "root";
	$this->password = "";
	$this->dbname = "kwezy";
	$this->charset = "utf8mb4";

try {
	$dns = "mysql:host=".$this->serverName.";dbname=".$this->dbname.";charset=".$this->charset;
	$pdo = new PDO($dns, $this->userName, $this->password);
	//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXPECTION);

	return $pdo;
	
} catch (PDOException $e) {
	echo "error in connecting to db".$e->getMessage();
}
return $pdo;
}

}	

?>