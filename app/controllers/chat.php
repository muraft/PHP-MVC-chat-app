<?php
class Chat extends Controller{
  public function index(){
    $data['title']='Chat Menu ';
    $this->view('templates/header',$data);
    $this->view('chat/index',$data);
    $this->view('templates/footer',$data);
  }
  public function global(){
    $data['title']='Global Chat';
    $this->view('templates/header',$data);
    $this->view('chat/global',$data);
    $this->view('templates/footer',$data);
  }
}
