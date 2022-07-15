<?php
class Message{
  public function get($target_id,$limit,$sender_id){
    return json_encode(Database::get('message,user',
    'user.id,user.name,user.icon,user.color,message.text,message.sender_id',
    '((message.target_id='.$target_id.($sender_id?' AND message.sender_id='.$sender_id.') OR (message.sender_id='.$target_id.' AND message.target_id='.$sender_id:'').')) AND user.id=message.sender_id ORDER BY message.id DESC LIMIT '.$limit,
    true));
  }
  public function getRecent($target_id,$limit){
    return json_encode([
      'fromOther'=>Database::custom(
        'SELECT user.id as userId,user.name,user.color,user.icon,messages.text,messages.id FROM user,
        (SELECT * FROM message WHERE target_id='.$target_id.' GROUP BY sender_id ORDER BY sender_id DESC LIMIT '.$limit.') as messages
        WHERE user.id=messages.sender_id ORDER BY messages.id DESC'
      ),
      'fromUser'=>Database::custom(
        'SELECT user.id as userId,user.name,user.color,user.icon,messages.text,messages.id FROM user,
        (SELECT * FROM message WHERE sender_id='.$_SESSION['id'].' AND target_id<>0 ORDER BY id DESC LIMIT '.$limit.') as messages
        WHERE user.id=messages.target_id GROUP BY messages.target_id ORDER BY messages.id DESC'
      )
    ]);
  }
  public function send($target_id,$text){
    return trim($text)!=''?Database::insert('message',[
      'text'=>htmlspecialchars($text),
      'sender_id'=>$_SESSION['id'],
      'target_id'=>$target_id
    ]):'';
  }
}
