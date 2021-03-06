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
  public function room($id=0){
    if(!isset($_SESSION['id']))header('Location:home/login');
    $data['partner']=$id==0?['id'=>0]:$this->model('User')->get_user_info($id);
    if(empty($data['partner']))header('Location:'.BASEURL.'/chat');
    $data['title']=$id==0?'Global Chat':'Chat with '.$data['partner']['name'];
    $this->view('templates/header',$data);
    $this->view('chat/room',$data);
    $this->view('templates/footer');
  }
  public function search(){
    if(!isset($_SESSION['id']))header('Location:home/login');
    $data['title']='Search User';
    $this->view('templates/header',$data);
    $this->view('chat/search',$data);
    $this->view('templates/footer');
  }
  public function profile($id=NULL,$from=''){
    if(!isset($_SESSION['id']))header('Location:home/login');
    $user=$this->model('User');
    $data['user']=$user->get_user_info($id);
    if(isset($_POST['update']) && $id==$_SESSION['id'])$data['user']['description']=$user->update($_POST['description']);
    $data['title']=isset($data['user']['name'])?$data['user']['name']."'s Profile":'User not found';
    $data['from']=str_replace('-','/',$from);
    $this->view('templates/header',$data);
    $this->view('chat/profile',$data);
    $this->view('templates/footer');
  }
  public function finduser($keyword=''){
    if(!isset($_SESSION['id'])){
      header('HTTP/1.0 403 Forbidden');
      exit();
    }
    header('Content-Type: application/json; charset=utf-8');
    echo $this->model('user')->find($keyword);
  }
  public function get($target_id=0,$limit=1,$type='all',$sender_id=false){
    $target_id=intval($target_id);
    $limit=intval($limit);
    if(!isset($_SESSION['id'])){
      header('HTTP/1.0 403 Forbidden');
      exit();
    }
    if($target_id!=0 && $target_id!=$_SESSION['id']){
      header('HTTP/1.0 403 Forbidden');
      exit();
    }
    header('Content-Type: application/json; charset=utf-8');
    echo $type=='recent'?$this->model('Message')->getRecent($target_id,$limit):$this->model('Message')->get($target_id,$limit,$sender_id);
  }
  public function send($target_id=0){
    if(!isset($_SESSION['id'])){
      header('HTTP/1.0 403 Forbidden');
      exit();
    }
    header('Content-Type: application/json; charset=utf-8');
    $_POST=json_decode(file_get_contents('php://input'), true);
    echo $this->model('Message')->send($target_id,$_POST['text']??'');
  }
  public function read($id){
    if(!isset($_SESSION['id'])){
      header('HTTP/1.0 403 Forbidden');
      exit();
    }
    header('Content-Type: application/json; charset=utf-8');
    return $this->model('Message')->read(intval($id));
  }
}
