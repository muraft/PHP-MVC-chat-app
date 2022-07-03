<div class="card w-75 mx-auto mt-5">
  <div class="card-header">
    <a class="btn btn-primary" href="<?=BASEURL?>/chat"><i class="bi bi-caret-left"></i></a>
  </div>
  <div class="card-body text-center">
    <h1 class="card-title text-primary"><i class="bi bi-envelope"></i> Recent Messages</h1>
    <div class="container border border-primary p-3">
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
function get(){
  fetch("<?=BASEURL?>/chat/get/<?=$_SESSION['id']?>/50")
  .then(response => response.json())
  .then(data => {

  })
}
setInterval(get,2000)
</script>
