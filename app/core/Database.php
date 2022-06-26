<?php

class Database{
  private static $dbh,$statement;

  public function __construct(){
    $dsn='mysql:host='.DB_HOST.';dbname='.DB_NAME;

    try{
      self::$dbh=new PDO($dsn,DB_USER,DB_PASS,[
        PDO::ATTR_PERSISTENT=>true,
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
      ]);
    }catch(PDOException $e){
      die($e->getMessage());
    }
  }

  private static function query($query){
    self::$statement=self::$dbh->prepare($query);
  }

  private static function bind($param,$value,$type=null){
    echo $type;
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
    self::$statement->bindValue($param,$value,$type);
  }

  private static function execute(){
    self::$statement->execute();
  }

  private static function rowCount(){
    return self::$statement->rowCount();
  }

  public static function get($table,$content,$condition,$all=false){
    self::query('SELECT '.$content.' FROM '.$table.' '.($condition?" WHERE ".$condition:"").";");
    self::execute();
    return $all?self::$statement->fetchAll(PDO::FETCH_ASSOC):self::$statement->fetch(PDO::FETCH_ASSOC);
  }

  public static function insert($table,$data){
    $column=[];
    foreach ($data as $key => $value) {
      $column[]=$key;
    }

    self::query(
      'INSERT INTO '
      .$table.
      ' ('
      .join(',',$column).
      ') VALUES (:'
      .join(',:',$column).
      ');'
    );

    foreach ($column as $c) {
      self::bind(':'.$c,$data[$c]);
    }

    self::execute();
    return self::rowCount();
  }
}
