<?php

class Database{
  private $host=DB_HOST,$user=DB_USER,$pass=DB_PASS,$name=DB_NAME;
  private $dbh,$statement;

  public function __construct(){
    $dsn='mysql:host='.$this->host.';dbname='.$this->name;
    $option=[
      PDO::ATTR_PERSISTENT=>true,
      PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
    ];

    try{
      $this->dbh=new PDO($dsn,$this->user,$this->pass,$this->name,$option);
    }catch(PDOException $e){
      die($e->getMessage());
    }
  }

  public function query($query){
    $this->statement=$this->dbh->prepare($query);
  }

  public function bind($param,$value,$type=null){
    if(is_null($type)){
      switch(true){
        case is_int($value):
          $type=PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type=PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type=PDO::PARAM_NULL;
        break;
        default:
          $type=PDO::PARAM_STR;
      }
    }
    $this->statement->bindValue($param,$value,$type);
  }

  public function execute(){
    $this->statement->execute();
  }
}
