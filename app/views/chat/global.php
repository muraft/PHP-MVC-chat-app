<div class="fixed-top bg-primary text-light p-2 text-center">
  <a class="btn btn-primary border-light position-fixed" style="top: 4px !important;left: 5px !important;" href="<?=BASEURL?>/chat"><i class="bi bi-caret-left"></i></a>
  <h3 class="d-inline"><i class="bi bi-globe"></i> Global Chat</h3>
</div>
<div class="container-fluid d-flex flex-column p-0 overflow-auto" id="messages-container" style="margin-top:60px !important;height:calc(100vh - 120px) !important">
  <div class="spinner-border text-primary align-self-center" role="status">
  <span class="visually-hidden">Loading...</span>
  </div>
</div>
<div class="fixed-bottom bg-primary p-2">
  <input type="text" class="form-control d-inline" id="message-input" placeholder="Type a message..." style="width:calc(100% - 60px) !important"></input>
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
    fetch("<?=BASEURL?>/chat/get/0/100")
    .then(response => response.json())
    .then(data => {
      let content="";
      data.forEach(v=>{
        content+= `
        <div class="mt-2 rounded p-2 text-white align-self-${v.id==<?=$_SESSION["id"]?>?'end':'start'}" style="word-wrap:break-word;width:auto !important;max-width:75% !important;background-color:${v.color}">
          <small><i class="bi bi-${v.icon}"></i> ${v.name}</small>
          <br>
          ${v.text}
        </div>`;
      })
      msgCont.innerHTML = content;
      if(moveToBottom){
        msgCont.scrollTop=msgCont.scrollHeight;
        moveToBottom=false;
      };
    });
  }
  setInterval(getMessages,1000);

  function send(){
    fetch("<?=BASEURL?>/chat/send/0",{
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
