<div class="card w-75 mx-auto mt-5">
  <div class="card-header text-primary">
      MuRafT Chat
  </div>
  <div class="card-body text-center">
    <h3 class="card-title text-primary"><i class="bi bi-box-arrow-in-right"></i> Log in</h3>
    <div class="border border-danger text-danger w-75 mx-auto mb-3 d-<?=$data['errors']?'block':'none'?>">
      <?=$data['errors']?>
    </div>
    <form method="post" action="<?=BASEURL.'/home/login/filled'?>">
      <div class="form-floating w-md-50  mb-3 mx-auto">
      <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?=$_POST['username']??''?>" required>
      <label for="username"><i class="bi bi-person"></i> Username</label>
      </div>

      <div class="form-floating mb-3 mx-auto">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
      <label for="password"><i class="bi bi-braces-asterisk"></i> Password</label>
      </div>

      Don't have an account yet? <a href="<?=BASEURL.'/home/register'?>">Register</a>
      <br>
      <button type="submit" class="btn btn-primary mt-3">Log in</button>
    </form>
  </div>
  <div class="card-footer text-muted text-center">
    By <a href="https://muraft.github.io/" style="text-decoration: none">Muraft</a>
  </div>
</div>
