<?php
class Message{
  public function get($target_id,$limit){
    return json_encode(Database::get('message,user',
    'user.id,user.name,user.icon,user.color,message.text,message.sender_id',
    'message.target_id='.$target_id.' AND user.id=message.sender_id LIMIT '.$limit,
    true));
  }
  public function send($target_id,$text){
    return Database::insert('message',[
      'text'=>$text,
      'sender_id'=>$_SESSION['id'],
      'target_id'=>$target_id
    ]);
  }
}