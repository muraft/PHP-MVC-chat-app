<?php
class Message{
  public function get($target_id,$limit){
    return json_encode(Database::get('message,user',
    'user.id,user.name,user.icon,user.color,message.text,message.sender_id',
    'message.target_id='.$target_id.' AND user.id=message.sender_id ORDER BY message.id DESC LIMIT '.$limit,
    true));
  }
  // public function getRecent($target_id,$limit){
  //   return json_encode(Database::custom('SELECT DISTINCT user.id,user.name,user.icon,user.color,message.text
  //   FROM user,message WHERE message.target_id='.$target_id.' AND
  //   user.id=message.sender_id AND message.id=(SELECT MAX(message.id) as id WHERE GROUP BY id) ORDER BY message.id LIMIT '.$limit.';'));
  // }
  public function send($target_id,$text){
    return trim($text)!=''?Database::insert('message',[
      'text'=>$text,
      'sender_id'=>$_SESSION['id'],
      'target_id'=>$target_id
    ]):'';
  }
}
