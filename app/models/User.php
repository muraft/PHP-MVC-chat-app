<?php
class User{
  private $user_info=[
    "id"=>5,
    "name"=>"usernameHere",
    "icon"=>"person-circle",
    "color"=>"green",
  ];

  public function get_user_info(){
    return $this->user_info;
  }
}
