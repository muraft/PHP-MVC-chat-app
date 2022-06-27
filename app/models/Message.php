<?php
class Message{
  public function get($id,$limit){
    return json_encode(Database::get('message','*','target_id='.$id.' LIMIT '.$limit,true));
  }
}
