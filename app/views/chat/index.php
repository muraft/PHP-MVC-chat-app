<div class="position-fixed top-0 w-100 bg-primary text-light p-2 text-center d-flex justify-content-center">
  <a class="btn btn-primary border-light position-fixed" style="top:6px !important;left:5px !important;" href="<?=BASEURL?>"><i class="bi bi-caret-left"></i></a>
  <!-- <h3 class="d-inline"><i class="bi bi-chat"></i> MuRafT Chat</h3> -->
  <div class="rounded w-50 mx-auto p-1 text-white border border-primary" style="background-color: <?=$data['user']['color']?>">
    <i class="bi bi-<?=$data['user']['icon']?>"></i>
    <?=$data['user']['name'].'#'.$data['user']['id']?>
  </div>
  <a class="btn btn-primary border-light position-fixed" style="top:6px !important;right:5px !important;" href="<?=BASEURL?>/chat/search"><i class="bi bi-search"></i></a>
</div>
<div class="container-fluid p-0 mt-5 text-center overflow-hidden">
  <a class="btn btn-primary w-75 mt-2" href="<?=BASEURL?>/chat/room"><i class="bi bi-globe"></i> Try global chat here!</a>
  <div class="container-fluid p-0 mt-2 w-100 d-flex align-items-center flex-column" id="messages-container">
    <div class="spinner-border text-primary mt-2" role="status">
    <span class="visually-hidden">Loading...</span>
    </div>
  </div>
  <small class="text-muted">MuRafT chat by <a href="https://muraft.github.io">MuRafT</a></small>
</div>
<style>
  .message-from:hover{
    background-color: #e1e3e6 !important;
    border: 1px solid black !important;
  }
</style>
<script>
const msgCont=document.getElementById("messages-container");
function get(){
  fetch("<?=BASEURL?>/chat/get/<?=$_SESSION['id']?>/100/recent")
  .then(response => response.json())
  .then(data => {
    let content="";
    data.length>0?data.forEach(v=>{
      content+=`
      <div class="m-0 p-2 text-dark text-start w-100 border message-from">
      <a href="<?=BASEURL?>/chat/room/${v.id}" style="color: ${v.color} !important;text-decoration: none">
        <div class="row">
          <div class="col-3 border-end d-flex justify-content-center align-items-center" style="font-size: 35px !important;">
            <i class="bi bi-${v.icon}"></i>
          </div>
          <div class="col-9 overflow-hidden">
            <strong>${v.name}</strong>
            <br>
            <font class="text-muted text-break">${v.text.length>40?v.text.substring(0,40)+'...':v.text}</font>
          </div>
        </div>
      </a>
      </div>`;
    }):content="<h3 class='text-primary mt-2 border-bottom'><i class='bi bi-emoji-frown'></i><br>You don't have any message</h3>";
    msgCont.innerHTML=content;
  })
}
get();
setInterval(get,2000)
</script>
