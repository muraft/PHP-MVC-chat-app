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
  <a class="btn btn-primary w-sm-75 w-lg-50 mt-2" href="<?=BASEURL?>/chat/room"><i class="bi bi-globe"></i> Try global chat here!</a>
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
function createBox(data){
  return `
  <div class="m-0 p-1 text-dark text-start w-100 border message-from">
  <a href="<?=BASEURL?>/chat/room/${data.userId}" style="color: ${data.color} !important;text-decoration: none">
    <div class="row">
      <div class="col-3 border-end d-flex justify-content-center align-items-center" style="font-size: 35px !important;">
        <i class="bi bi-${data.icon}"></i>
      </div>
      <div class="col-9 overflow-hidden">
        <strong>${data.name}</strong>
        <br>
        <font class="text-muted text-break">${data.text.length>40?data.text.substring(0,40)+'...':data.text}</font>
      </div>
    </div>
  </a>
  </div>`
}
function get(){
  fetch("<?=BASEURL?>/chat/get/<?=$_SESSION['id']?>/100/recent")
  .then(response => response.json())
  .then(data => {
    let box=new Map();
    data.fromOther.forEach(v=>box.set(v.id,{userId:v.userId,content:createBox(v)}));
    data.fromUser.forEach(v=>{
      console.log(box)
      if(Array.from(box.keys()).length){
        console.log(1)
        Array.from(box.keys()).forEach(w=>{
          let x=box.get(w);
          if(x.userId==v.userId && v.id>=w){
            box.set(v.id,{userId:x.userId,content:createBox(v)});
            box.delete(w);
          }
          else{console.log(v.id,w);box.set(v.id,{userId:v.userId,content:createBox(v)})}
        });
      }
      else{box.set(v.id,{userId:v.userId,content:createBox(v)})}
    });
    msgCont.innerHTML=Array.from(box.keys()).length?Array.from(box.keys()).sort().reverse().map(v=>box.get(v).content).join(''):
    "<h3 class='text-primary mt-2 border-bottom'><i class='bi bi-emoji-frown'></i><br>You don't have any message</h3>";
  })
}
get();
//setInterval(get,2000)
</script>
