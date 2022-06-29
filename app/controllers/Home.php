<?php

class Home extends Controller{
  public function index(){
    if(!isset($_SESSION['id']))header('Location:home/login');
    $data['title']='Homepage';
    $data['user']=$this->model('User')->get_user_info();
    $this->view('templates/header',$data);
    $this->view('home/index',$data);
    $this->view('templates/footer');
  }
  public function register(){
    $data['errors']=$_POST?$this->model('User')->register($_POST):[];
    if(isset($_SESSION['id']))header('Location:'.BASEURL);
    $data['title']='Register';
    $data['username']=$_POST['username']??'';
    $this->view('templates/header',$data);
    $this->view('home/register',$data);
    $this->view('templates/footer');
  }
  public function login(){
    $data['errors']=$_POST?$this->model('User')->login($_POST):[];
    if(isset($_SESSION['id']))header('Location:'.BASEURL);
    $data['username']=$_POST['username']??'';
    $data['title']='Log in';
    $this->view('templates/header',$data);
    $this->view('home/login',$data);
    $this->view('templates/footer');
  }
  public function logout(){
    unset($_SESSION);
    session_destroy();
    header('Location:'.BASEURL.'/home/login');
  }
  public function about(){
    $data['title']='About';
    $this->view('templates/header',$data);
    $this->view('home/about',$data);
    $this->view('templates/footer');
  }
  public function customize(){
    $data['title']='Customize';
    $this->view('templates/header',$data);
    $this->view('home/customize',$data);
    $this->view('templates/footer');
  }
}
