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

  public function register(){
    
  }

  public function get_user_info(){
    return $this->user_info;
  }
}
