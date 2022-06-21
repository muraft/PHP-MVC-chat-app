<?php
class App{
  protected $controller='home',$method='index',$params=[];

  public function __construct(){
    $this->parseUrl();
  }

  public function parseUrl(){
      if(isset($_GET['url'])){
        return filter_var(rtrim($_GET['url'],'/'));
      }
  }
}
