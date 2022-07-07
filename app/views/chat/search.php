<div class="card w-75 mx-auto mt-5">
  <div class="card-header">
    <a class="btn btn-primary" href="<?=BASEURL?>/chat"><i class="bi bi-caret-left"></i></a>
  </div>
  <div class="card-body text-center">
    <h1 class="card-title text-primary"><i class="bi bi-search"></i> Search User</h1>
    <input type="text" class="form-control" id="query" placeholder="Enter username or id" maxlength="10"></input>
    <ul class="list-group text-start text-dark overflow-auto border" id="result" style="max-height:50vh !important;">
    </ul>
  </div>
  <div class="card-footer text-muted text-center">
    By <a href="https://muraft.github.io/" style="text-decoration: none">Muraft</a>
  </div>
</div>
<script>
const query=document.getElementById('query');
const result=document.getElementById('result');
  query.addEventListener('input', ()=>{
    fetch('<?=BASEURL?>/chat/finduser/'+query.value.replace(/[^\w]/g,'')).then(response => response.json())
    .then(data => {
      let content='';
      data.forEach(v=>{
        content+=`<li class="list-group-item"><a href="<?=BASEURL?>/chat/profile/${v.id}"  style="color:${v.color} !important;text-decoration:none;"><i class="bi bi-${v.icon}" ></i> ${v.name+'#'+v.id}</a></li>`;
      })
      result.innerHTML=content;
    })
  })
</script>
