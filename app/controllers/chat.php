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
  public function private(){
    $data['title']='Private Chat';
    $this->view('templates/header',$data);
    $this->view('chat/private',$data);
    $this->view('templates/footer');
  }
  public function recent(){
    $data['title']='Recent Messages';
    $this->view('templates/header',$data);
    $this->view('chat/recent',$data);
    $this->view('templates/footer');
  }
  public function search(){
    $data['title']='Search User';
    $this->view('templates/header',$data);
    $this->view('chat/search',$data);
    $this->view('templates/footer');
  }
  public function get($target_id=0,$limit=1){
    if(!isset($_SESSION['id'])){
      header('HTTP/1.0 403 Forbidden');
      exit();
    }
    if($target_id!=0 && $target_id!=$_SESSION['id']){
      header('HTTP/1.0 403 Forbidden');
      exit();
    }
    header('Content-Type: application/json; charset=utf-8');
    echo $this->model('Message')->get($target_id,$limit);
  }
  public function send($target_id=0){
    if(!isset($_SESSION['id'])){
      header('HTTP/1.0 403 Forbidden');
      exit();
    }
    header('Content-Type: application/json; charset=utf-8');
    $_POST = json_decode(file_get_contents('php://input'), true);
    echo $this->model('Message')->send($target_id,$_POST['text']??'');
  }
}
