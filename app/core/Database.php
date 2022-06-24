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
      $this->dbh=new PDO($dsn,$this->user,$this->pass,$option);
    }catch(PDOException $e){
      die($e->getMessage());
    }
  }

  private function query($query){
    $this->statement=$this->dbh->prepare($query);
  }

  private function bind($param,$value,$type=null){
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

  private function execute(){
    $this->statement->execute();
  }

  private function rowCount(){
    $this->statement->rowCount();
  }

  public function insert($table,$data){
    $column=[];
    foreach ($data as $key => $value) {
      $column[]=$key;
    }

    $this->query(
      'INSERT INTO '
      .$table.
      ' ('
      .join($column,',').
      ') VALUES (:'
      .join($column,':,').
      ');'
    );

    foreach ($column as $c) {
        $this->bind(':'.$c,$data[$c]);
    }

    $this->execute();
    return $this->rowCount();
  }
}
