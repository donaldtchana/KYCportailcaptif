<?php

class Database{

  public $con;
  public function __construct(){
  $this->connect();
  }

  private function connect(){
    if(!isset($_SESSION["db_host"]) & !isset($_SESSION["db_username"]) & !isset($_SESSION["db_pass"]) & !isset($_SESSION["db_name"]) & !isset($_SESSION["db_port"])){
      $host = DB_HOST;
      $user = DB_USER;
      $pass = DB_PASS;
      $db_name = DB_NAME;
        $db_port = DB_PORT;
    }else{
      $host = $_SESSION["db_host"];
      $user = $_SESSION["db_username"];
      $pass = $_SESSION["db_pass"];
      $db_name = $_SESSION["db_name"];
        $db_port = $_SESSION["db_port"];
    }
    try{

      $this->con = new PDO("mysql:host=$host;dbname=$db_name;dbport=$db_port;", $user, $pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4' COLLATE 'utf8mb4_unicode_ci'"));
      $this->con->exec("SET CHARACTER SET UTF-8");
      $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $ex){
      echo "La connexion à la base de données a produite une erreur : " . $ex->getMessage();
    }
  }

  public function query($query,$parameters = '',$limit = ''){
    try{
      $run_query = $this->con->prepare($query);
      $run_query->setFetchMode(PDO:: FETCH_OBJ);
      if(!empty($limit)){
        foreach($limit as $key => $value){ 
          $run_query->bindValue("$key", $value, PDO::PARAM_INT); 
        }
      }
      if (!empty($parameters)) {
        foreach($parameters as $key => $value){ 
          $run_query->bindValue("$key", $value); 
        }
      }
      if ($run_query->execute()) {
        return $run_query;
      } else {
        return false;
      }
    }catch(PDOException $ex){
      echo "Une erreur s'est produite : ".$ex->getMessage();
    }
  }

  public function count($table,$parameters = ""){
    $where = "";
    if(!empty($parameters)){
      $i = 1;
      $where = "Where ";
      $values = [];
      foreach($parameters as $key => $value){
        if($i > 1){$where .= " AND ";}
        $where .= "$key=:$key";
        $values[":$key"] = $value;
        $i++;
      }
    }
    try{
      $run_query = $this->con->prepare("select * from $table $where");
      $run_query->setFetchMode(PDO:: FETCH_OBJ);
      if(!empty($parameters)){
      $run_query->execute($values);
      }else{ $run_query->execute(); }
      return $run_query->rowCount();
    }catch(PDOException $ex){
      echo "Une erreur s'est produite : " . $ex->getMessage();
    }
  }

  public function select($table,$parameters = "",$order = ""){
    $where = "";
    $order_by = "";
    if(!empty($order)){
    $order_by = "order by 1 $order";
    }
    if(!empty($parameters)){
      $i = 1;
      $where = "Where ";
      $values = [];
      foreach($parameters as $key => $value){
        if($i > 1){$where .= " AND ";}
        $where .= "$key=:$key";
        $values[":$key"] = $value;
        $i++;
      }
    }
    try{
      $run_query = $this->con->prepare("select * from $table $where $order_by");
      $run_query->setFetchMode(PDO:: FETCH_OBJ);
      if(!empty($parameters)){
        if($run_query->execute($values)){ return $run_query; }
      }else{
        if($run_query->execute()){ return $run_query; }
      }
    }catch(PDOException $ex){
      echo "Une erreur s'est produite : " . $ex->getMessage();
    }
  }

  public function insert($table,$parameters = ""){
    if(!empty($parameters)){
      $i = 1;
      $count = count($parameters);
      $fields = ""; $placeholders = ""; $values = [];
      foreach($parameters as $key => $value){
        $fields .= "$key";
        $placeholders .= ":$key";
        $values[":$key"] = $value;
        if($i < $count ) { $fields .=","; $placeholders .=","; } 
        $i++;
      }
    }
    try{
      $run_query = $this->con->prepare("insert into $table ($fields) values ($placeholders)");
      $run_query->setFetchMode(PDO:: FETCH_OBJ);
      if($run_query->execute($values)){ return $run_query; }
    }catch(PDOException $ex){
      echo "Une erreur s'est produite : " . $ex->getMessage();
    }
  }

  public function update($table,$parameters,$where_p = ""){
    $i = 1;
    $count = count($parameters);
    $fields = ""; $values = [];
    foreach($parameters as $key => $value){
      $fields .= "$key=:$key";
      $values[":$key"] = $value;
      if($i < $count ) { $fields .=","; } 
      $i++;
    }
    $where = "";
    if(!empty($where_p)){
    $i = 1;
    $where = "where ";
    foreach($where_p as $key => $value){
      if($i > 1){$where .= " AND ";}
      $where .= "$key=:w_$key";
      $values[":w_$key"] = $value;
      $i++;
    }
    }
    try{
      $run_query = $this->con->prepare("update $table set $fields $where");
      $run_query->setFetchMode(PDO:: FETCH_OBJ);
      if($run_query->execute($values)){ return $run_query; }
    }catch(PDOException $ex){
      echo "Une erreur s'est produite : " . $ex->getMessage();
    }
  }

  public function delete($table,$parameters=''){
    $i = 1;
    $where = "";
    $values = [];
    if(!empty($parameters)){
    $i = 1;
    $where = "where ";
    foreach($parameters as $key => $value){
      if($i > 1){$where .= " AND ";}
      $where .= "$key=:$key";
      $values[":$key"] = $value;
      $i++;
    }
    }
    try{
      $run_query = $this->con->prepare("delete from $table $where");
      $run_query->setFetchMode(PDO:: FETCH_OBJ);
      if(!empty($parameters)){
      if($run_query->execute($values)){ return $run_query; }
      }else{
        if($run_query->execute()){ return $run_query; }
      }
    }catch(PDOException $ex){
      echo "Une erreur s'est produite : " . $ex->getMessage();
    }
  }
  public function lastInsertId(){
    return $this->con->lastInsertId();
  }


}

global $db;
$db = new database();