<?php
class User{
  private $user_info=[
    "id"=>5,
    "name"=>"usernameHere",
    "icon"=>"person-circle",
    "color"=>"green",
  ];


  public function register($data){
    $errors=[];
    $username=htmlspecialchars($data['username']??'');
    $password=htmlspecialchars($data['password']??'');
    $password2=htmlspecialchars($data['password2']??'');

    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$username))$errors[]="Username can't contain symbols";
    if(empty($username))$errors[]="Username must not be empty";
    if(strlen($username)<3)$errors[]="Username must contain more than 2 characters";
    if(empty($password))$errors[]="Password must not be empty";
    if($password!==$password2)$errors[]="Password does not match";
    if(count(Database::get('user','*',"name='".$username."' LIMIT 1",true)))$errors[]="Username already exists";

    if($errors)return $errors;

    if(Database::insert('user',[
      'name' => $username,
      'password' => password_hash($password,PASSWORD_DEFAULT)
    ])){
      $_SESSION['id']=Database::get('user','id',"name = '".$username."'")['id'];
      return NULL;
    }
    else{
      return $errors;
    }

  }

  public function login($data){
    $errors=[];
    $username=htmlspecialchars($data['username']??'');
    $password=htmlspecialchars($data['password']??'');

    if(empty($username))$errors[]="Username must not be empty";
    if(empty($password))$errors[]="Password must not be empty";

    return $errors;
  }

  public function get_user_info(){
    return Database::get('user','*',"id='".$_SESSION['id']."'");
  }
}
