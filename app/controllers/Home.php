<?php

class Home extends Controller{
  public function index(){
    $data['title']='Homepage';
    $data['user']=$this->model('User')->get_user_info();
    $this->view('templates/header',$data);
    $this->view('home/index',$data);
    $this->view('templates/footer',$data);
  }
  public function register(){
    $data['title']='Register';
    $this->view('templates/header',$data);
    $this->view('home/index',$data);
    $this->view('templates/footer',$data);
  }
  public function login(){
    $data['title']='Login';
    $this->view('templates/header',$data);
    $this->view('home/index',$data);
    $this->view('templates/footer',$data);
  }
}
