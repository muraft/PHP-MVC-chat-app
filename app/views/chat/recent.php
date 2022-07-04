<div class="card w-75 mx-auto mt-5">
  <div class="card-header">
    <a class="btn btn-primary" href="<?=BASEURL?>/chat/private"><i class="bi bi-caret-left"></i></a>
  </div>
  <div class="card-body text-center">
    <h1 class="card-title text-primary"><i class="bi bi-envelope"></i> Recent Messages</h1>
    <div class="container border border-primary p-3 d-flex align-items-center flex-column overflow-scroll" id="messages-container" style="height: 50vh !important;">
      <div class="spinner-border text-primary" role="status">
      <span class="visually-hidden">Loading...</span>
      </div>
    </div>
  </div>
  <div class="card-footer text-muted text-center">
    By <a href="https://muraft.github.io/" style="text-decoration: none">Muraft</a>
  </div>
</div>
<script>
const msgCont=document.getElementById("messages-container");
function get(){
  fetch("<?=BASEURL?>/chat/get/<?=$_SESSION['id']?>/50")
  .then(response => response.json())
  .then(data => {
    let content="";
    data.forEach(v=>{
      content+=`
      <div class="mt-2 rounded p-2 text-white w-100" style="word-wrap:break-word;background-color:${v.color}">
        <small><i class="bi bi-${v.icon}"></i> ${v.name}</small>
        <br>
        ${v.text}
      </div>`;
    });
    msgCont.innerHTML=content;
  })
}
setInterval(get,2000)
</script>
