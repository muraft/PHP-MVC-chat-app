<?php
class User{
  private function success($username) {
    $_SESSION['id']=Database::get('user','id',"name = '".$username."'")['id'];
    return NULL;
  }

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
    ]))return $this->success($username);
    else{
      return $errors;
    }
  }

  public function login($data){
    $errors=[];
    $username=htmlspecialchars($data['username']??'');
    $password=htmlspecialchars($data['password']??'');

    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$username))$errors[]="Username can't contain symbols";
    if(strlen($username)<3)$errors[]="Username must contain more than 2 characters";
    if(empty($username))$errors[]="Username must not be empty";
    if(empty($password))$errors[]="Password must not be empty";
    if($errors)return $errors;

    if(password_verify($password,
    Database::get('user','password',"name = '".$username."'")['password']??''))$this->success($username);
    else{return ['Username or password is incorrect'];}
  }

  public function get_user_info($id=NULL){
    if($id==NULL)$id=$_SESSION['id'];
    return Database::get('user','*',"id='".$id."'");
  }

  public function update($data,$existed){
    if(!in_array($data['color']??'',$existed['color']) || !in_array($data['icon']??'',$existed['icon']))return 0;
    Database::update('user',[
      'color'=>$data['color'],
      'icon'=>$data['icon']
    ],'id='.$_SESSION['id']);
  }
}
