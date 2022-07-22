<div class="navbar bg-primary text-light p-2 text-center d-flex justify-content-center align-items-center">
  <a class="btn btn-primary border-light position-fixed" style="top: 6px !important;left: 5px !important;" href="<?=BASEURL?>/chat"><i class="bi bi-caret-left"></i></a>
  <h3 class="d-inline">
    <?php if($data['partner']['id']==0): ?>
    <i class="bi bi-globe"></i> Global Chat
    <?php else: ?>
      <a href="<?=BASEURL?>/chat/profile/<?=$data['partner']['id']?>/chat-room-<?=$data['partner']['id']?>" style="text-decoration: none;">
      <div class="rounded mx-auto p-1 text-white border border-primary" style="background-color: <?=$data['partner']['color']?>">
        <i class="bi bi-<?=$data['partner']['icon']?>"></i> <?=$data['partner']['name'].'#'.$data['partner']['id']?>
      </div>
      </a>
    <?php endif; ?>
  </h3>
</div>
<div class="container-fluid d-flex flex-column px-2 overflow-auto" id="messages-container" style="height:calc(100vh - 120px) !important">
  <div class="spinner-border text-primary align-self-center mt-2" role="status">
  <span class="visually-hidden">Loading...</span>
  </div>
</div>
<div class="fixed-bottom bg-primary p-2">
  <input type="text" class="form-control d-inline" id="message-input" placeholder="Type a message..." maxlength="255" style="width:calc(100% - 60px) !important" autocomplete="off" autofocus></input>
  <button class="bg-transparent border-light rounded text-light" style="width:50px" onclick="send()"><i class="bi bi-send w-25"></i></button>
</div>

<style>
/* Hide scrollbar for Chrome, Safari and Opera */
#messages-container::-webkit-scrollbar {
display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
#messages-container {
-ms-overflow-style: none;  /* IE and Edge */
scrollbar-width: none;  /* Firefox */
}
</style>
<script>
  const msgCont=document.getElementById("messages-container");
  const msgInput=document.getElementById("message-input");
  let moveToBottom=true;
  document.addEventListener("keydown",e=>e.keyCode==13?send():'');
  function getMessages(){
    fetch("<?=BASEURL?>/chat/get/<?=$data['partner']['id']==0?0:$_SESSION['id']?>/100<?=$data['partner']['id']==0?'':'/private/'.$data['partner']['id']?>")
    .then(response => response.json())
    .then(data => {
      let content="";
      for(let i=data.length-1;i>=0;i--){
        content+=`
        <div class="mt-2 rounded p-2 text-white align-self-${data[i].id==<?=$_SESSION["id"]?>?'end':'start'}" style="word-wrap:break-word;width:auto !important;max-width:75% !important;background-color:${data[i].color}">
          <a class="text-light" style="text-decoration:none;"
          <?php if($data['partner']['id']==0): ?>
          href="<?=BASEURL?>/chat/profile/${data[i].id}/chat-room"
          <?php endif; ?>
          ><small><i class="bi bi-${data[i].icon}"></i> ${data[i].name}</small></a>
          <br>
          <div class="border-top border-light">${data[i].text}</div>
        </div>`;
      }
      msgCont.innerHTML=content;
      if(moveToBottom){
        msgCont.scrollTop=msgCont.scrollHeight;
        moveToBottom=false;
      };
      if(<?=$data['partner']['id']?>!=0)fetch("<?=BASEURL?>/chat/read/<?=$data['partner']['id']?>");
    });
  }
  getMessages();
  setInterval(getMessages,1000);

  function send(){
    fetch("<?=BASEURL?>/chat/send/<?=$data['partner']['id']?>",{
      headers: {
        'Content-Type': 'application/json'
      },
      method: 'POST',
      body: JSON.stringify({text:msgInput.value})
    }).then(()=>{
      msgInput.value="";
      moveToBottom=true;
    });
  }
</script>
