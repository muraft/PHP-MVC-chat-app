<div class="card w-75 mx-auto mt-5">
  <div class="card-header text-primary">
      <a class="btn btn-primary" href="<?=BASEURL?>/<?=$data['from']?>"><i class="bi bi-caret-left"></i></a>
  </div>
  <div class="card-body text-center">
    <h3 class="card-title text-primary"><i class="bi bi-person-circle"></i> User Profile</h3>
    <?php if($data['user']): ?>
    <ul class="list-group text-start text-dark">
      <li class="list-group-item text-white" style="background-color:<?=$data['user']['color']?> !important;"><i class="bi bi-<?=$data['user']['icon']?>"></i> <?=$data['user']['name']?></li>
      <li class="list-group-item text-center"><?=$data['user']['description']?></li>
      <li class="list-group-item"><strong style="color:<?=$data['user']['color']?>">ID:</strong> <?=$data['user']['id']?></li>
      <li class="list-group-item"><strong style="color:<?=$data['user']['color']?>">Date created (UTC+7):</strong> <?=$data['user']['date_created']?></li>
    </ul>
    <a class="btn btn-primary w-75 mt-2 <?=$data['user']['id']==$_SESSION['id']?'d-none':''?>" href="<?=BASEURL?>/chat/room/<?=$data['user']['id']?>"><i class="bi bi-envelope"></i> Private Message</a>
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
