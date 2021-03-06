<div class="card w-75 mx-auto mt-5">
  <div class="card-header">
    <font color="<?=$data['user']['color']?>">
      <i class="bi bi-<?=$data['user']['icon']?>"></i>
      <?=$data['user']['name'].'#'.$data['user']['id']?>
    </font>
  </div>
  <div class="card-body text-center">
    <h1 class="card-title text-primary">MuRafT Chat</h1>
    <a href="<?=BASEURL?>/chat" class="btn btn-primary w-75"><i class="bi bi-chat"></i> Chat</a>
    <a href="<?=BASEURL?>/chat/profile/<?=$_SESSION['id']?>" class="btn btn-primary w-75 mt-2"><i class="bi bi-person-circle"></i> My profile</a>
    <a class="btn btn-primary w-75 mt-2" href="<?=BASEURL?>/home/customize"><i class="bi bi-palette"></i> Customize</a>
    <a class="btn btn-primary w-75 mt-2"><i class="bi bi-gear"></i> Settings</a>
    <a class="btn btn-primary w-75 mt-2" href="<?=BASEURL?>/home/about"><i class="bi bi-info-circle"></i> About</a>
    <a class="btn btn-primary w-75 mt-2" href="<?=BASEURL?>/home/logout"><i class="bi bi-box-arrow-left"></i> Log out</a>
  </div>
  <div class="card-footer text-muted text-center">
    By <a href="https://muraft.github.io/" style="text-decoration: none">Muraft</a>
  </div>
</div>
