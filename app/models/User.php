<?php
class User{
  private $db;
  private $user_info=[
    "id"=>5,
    "name"=>"usernameHere",
    "icon"=>"person-circle",
    "color"=>"green",
  ];

  public function __construct(){
    $this->db = new Database();
  }

  public function register($data){
    $errors=[];
    $username=htmlspecialchars($data['username']);
    $password=htmlspecialchars($data['password']);
    $password2=htmlspecialchars($data['password2']);

    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$username))$errors[]="Username can't contain symbols";
    if(empty($username))$errors[]="Username must not be empty";
    if(strlen($username)<3)$errors[]="Username must contain more than 2 characters";
    if(empty($password))$errors[]="Password must not be empty";
    if($password!==$password2)$errors[]="Password does not match";

    return $errors;
  }

  public function login($data){
    $errors=[];
    $username=htmlspecialchars($data['username']);
    $password=htmlspecialchars($data['password']);

    if(empty($username))$errors[]="Username must not be empty";
    if(empty($password))$errors[]="Password must not be empty";

    return $errors;
  }

  public function get_user_info(){
    return $this->user_info;
  }
}
