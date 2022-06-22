<?php
class Chat extends Controller{
  public function index(){
    $data['title']='Chat menu';
    $this->view('chat/index',$data);
  }
}
