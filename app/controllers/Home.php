<?php

class Home extends Controller{
  public function index($username='test'){
    $data['title']='Homepage';
    $data['username']=$username;
    $this->view('home/index',$data);
  }
  public function register(){
    $data['title']='Register';
    $this->view('home/register',$data);
  }
  public function login(){
    $data['title']='Login';
    $this->view('home/login',$data);
  }
}
