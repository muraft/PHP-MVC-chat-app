<div class="card w-75 mx-auto mt-5">
  <div class="card-header text-primary">
      <a class="btn btn-primary" href="<?=BASEURL?>/chat/global"><i class="bi bi-caret-left"></i></a>
  </div>
  <div class="card-body text-center">
    <h3 class="card-title text-primary"><i class="bi bi-person-circle"></i> User Profile</h3>
    <?php if($data['user']): ?>
    <div class="rounded w-75 mx-auto p-1 text-white border border-primary mb-3 border-bottom border-primary" style="background-color: <?=$data['user']['color']?>">
      <i class="bi bi-<?=$data['user']['icon']?>"></i>
      <?=$data['user']['name'].'#'.$data['user']['id']?>
    </div>
  <?php else: ?>
    <div class="rounded w-75 mx-auto p-1 text-white border border-primary bg-danger mb-3 border-bottom border-primary">
      User not found
    </div>
  <?php endif; ?>

  </div>
  <div class="card-footer text-muted text-center">
    By <a href="https://muraft.github.io/" style="text-decoration: none">Muraft</a>
  </div>
</div>
