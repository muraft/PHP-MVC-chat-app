<div class="card w-75 mx-auto mt-5">
  <div class="card-header">
    <h6>
      <font color="<?=$data['user']['color']?>">
        <i class="bi bi-<?=$data['user']['icon']?>"></i>
        <?=$data['user']['name'].'#'.$data['user']['id']?>
      </font>
    </h6>
  </div>
  <div class="card-body text-center">
    <h1 class="card-title text-primary">MuRafT Chat</h1>
    <a href="<?=BASEURL?>/chat" class="btn btn-primary w-75"><i class="bi bi-chat"></i> Chat</a>
    <br>
    <a class="btn btn-primary w-75 mt-2"><i class="bi bi-palette"></i> Customize</a>
    <br>
    <a class="btn btn-primary w-75 mt-2"><i class="bi bi-gear"></i> Settings</a>
    <br>
    <a class="btn btn-primary w-75 mt-2"><i class="bi bi-info-circle"></i> About</a>
    <br>
    <a class="btn btn-primary w-75 mt-2"><i class="bi bi-box-arrow-left"></i> Log out</a>
  </div>
  <div class="card-footer text-muted text-center">
    By <a href="https://muraft.github.io/" style="text-decoration: none">Muraft</a>
  </div>
</div>
