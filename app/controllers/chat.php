<?php
class Chat extends Controller{
  public function index(){
    if(!isset($_SESSION['id']))header('Location:home/login');
    $data['title']='Chat';
    $data['user']=$this->model('User')->get_user_info();
    $this->view('templates/header',$data);
    $this->view('chat/index',$data);
    $this->view('templates/footer');
  }
  public function global(){
    $data['title']='Global Chat';
    $this->view('templates/header',$data);
    $this->view('chat/global',$data);
    $this->view('templates/footer');
  }
}
