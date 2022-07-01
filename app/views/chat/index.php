<div class="card w-75 mx-auto mt-5">
  <div class="card-header">
    <a class="btn btn-primary" href="<?=BASEURL?>"><i class="bi bi-caret-left"></i></a>
  </div>
  <div class="card-body text-center">
    <h1 class="card-title text-primary">Chat</h1>
    <div class="rounded w-50 mx-auto p-1 text-white border border-primary" style="background-color: <?=$data['user']['color']?>">
      <h6>Your Profile</h6>
      <i class="bi bi-<?=$data['user']['icon']?>"></i>
      <?=$data['user']['name'].'#'.$data['user']['id']?>
    </div>
    <a class="btn btn-primary w-75 mt-5" href="<?=BASEURL?>/chat/global"><i class="bi bi-globe"></i> Global</a>
    <br>
    <a class="btn btn-primary w-75 mt-2" href="<?=BASEURL?>/chat/search"><i class="bi bi-people"></i> Private</a>
  </div>
  <div class="card-footer text-muted text-center">
    By <a href="https://muraft.github.io/" style="text-decoration: none">Muraft</a>
  </div>
</div>
