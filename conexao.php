<?php

class Conexao {

public $servername = 'localhost';
public $username = 'id13480313_recicla';
public $password = 'm53*K<mMpp]WsU$H';
public $dbname = 'id13480313_reciclasanja';
public $con;

function __construct() {
  
    
// Create connection
$this->con = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
// Check connection
if ($this->con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


}

function getCon() {
    return $this->con;
  }

  function exitCon() {
    return $this->con;
  }


}
?>