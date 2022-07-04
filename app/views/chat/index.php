<div class="card w-75 mx-auto mt-2">
  <div class="card-header">
    <a class="btn btn-primary" href="<?=BASEURL?>"><i class="bi bi-caret-left"></i></a>
  </div>
  <div class="card-body text-center p-0">
    <!-- <h3 class="card-title text-primary">Chat</h3> -->
    <div class="rounded w-50 mx-auto p-1 text-white border border-primary mt-1" style="background-color: <?=$data['user']['color']?>">
      <i class="bi bi-<?=$data['user']['icon']?>"></i>
      <?=$data['user']['name'].'#'.$data['user']['id']?>
    </div>
    <a class="btn btn-primary w-75 mt-2" href="<?=BASEURL?>/chat/global"><i class="bi bi-globe"></i> Global</a>
    <a class="btn btn-primary w-75 my-1" href="<?=BASEURL?>/chat/search"><i class="bi bi-search"></i> Search User</a>
    <div class="container border p-0 w-100 mt-1 d-flex align-items-center flex-column" id="messages-container" style="height: 50vh !important;overflow-y:auto !important;overflow-x:hidden !important;">
      <div class="spinner-border text-primary" role="status">
      <span class="visually-hidden">Loading...</span>
      </div>
    </div>
  </div>
  <script>
  const msgCont=document.getElementById("messages-container");
  function get(){
    fetch("<?=BASEURL?>/chat/get/<?=$_SESSION['id']?>/100/recent")
    .then(response => response.json())
    .then(data => {
      let content="";
      data.forEach(v=>{
        content+=`
        <div class="m-0 p-2 text-dark text-start w-100 border" style="color: ${v.color} !important;">
          <div class="row">
            <div class="col-3 border-end d-flex justify-content-center align-items-center" style="font-size: 35px !important;">
              <i class="bi bi-${v.icon}"></i>
            </div>
            <div class="col-9 overflow-hidden">
              <strong>${v.name}</strong>
              <br>
              <font class="text-muted text-break">${v.text.substring(0,40)+'...'}</font>
            </div>
          </div>
        </div>`;
      });
      msgCont.innerHTML=content;
    })
  }
  setInterval(get,2000)
  </script>
  <div class="card-footer text-muted text-center">
    By <a href="https://muraft.github.io/" style="text-decoration: none">Muraft</a>
  </div>
</div>
