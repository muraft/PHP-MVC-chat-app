<?php

class Home extends Controller{
  public function index(){
    if(!isset($_SESSION['user']))header('Location:home/login');
    $data['title']='Homepage';
    $data['user']=$this->model('User')->get_user_info();
    $this->view('templates/header',$data);
    $this->view('home/index',$data);
    $this->view('templates/footer');
  }
  public function register($filled=false){
    $data['errors']=join(',<br>',($filled?$this->model('User')->register($_POST):[]));
    $data['title']='Register';
    $this->view('templates/header',$data);
    $this->view('home/register',$data);
    $this->view('templates/footer');
  }
  public function login($filled=false){
    $data['errors']=join('.<br>',($filled?$this->model('User')->login($_POST):[]));
    $data['title']='Log in';
    $this->view('templates/header',$data);
    $this->view('home/login',$data);
    $this->view('templates/footer');
  }
}
