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
    $this->model('User')->logout();
  }
  public function about(){
    if(!isset($_SESSION['id']))header('Location:home/login');
    $data['title']='About';
    $this->view('templates/header',$data);
    $this->view('home/about',$data);
    $this->view('templates/footer');
  }
  public function customize(){
    if(!isset($_SESSION['id']))header('Location:home/login');
    if(isset($_POST['submit'])){
      $existed=[
        'color'=>['#0d6efd','red','green','#fada0a','black','#ea25f5'],
        'icon'=>['person-circle','emoji-smile','emoji-sunglasses','controller','phone']
      ];
      $this->model('User')->update($_POST,$existed);
    }
    $data['title']='Customize';
    $data['user']=$this->model('User')->get_user_info();
    $this->view('templates/header',$data);
    $this->view('home/customize',$data);
    $this->view('templates/footer');
  }
}
