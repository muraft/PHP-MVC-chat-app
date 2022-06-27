<div class="fixed-top bg-primary text-light p-2 text-center">
  <a class="btn btn-primary border-light position-fixed" style="top: 4px !important;left: 5px !important;" href="<?=BASEURL?>/chat"><i class="bi bi-caret-left"></i></a>
  <h3 class="d-inline"><i class="bi bi-globe"></i> Global Chat</h3>
</div>
<div class="container-fluid p-0" id="messages-container" style="margin-top:50px !important;"><h1>Loading messages...</h1></div>
<div class="fixed-bottom bg-primary p-2">
  <input type="text" class="form-control d-inline" placeholder="Type a message..." style="width:calc(100% - 60px) !important"></input>
  <button class="bg-transparent border-light rounded text-light" style="width:50px"><i class="bi bi-send w-25"></i></button>
</div>

<script>
  const msgCont=document.getElementById("messages-container");
  function getMessages(){
    fetch("<?=BASEURL?>/chat/get/0/10")
    .then(response => response.json())
    .then(data => {
      let content="";
      data.forEach(v=>{
        content+= `
        <div class="border border-primary mt-2 w-50 rounded p-1">
          <small>senderName</small>
          <br>
          ${v.text}
        </div>`;
      })
    msgCont.innerHTML = content;
    });
  }
  setInterval(getMessages,1000);
</script>
