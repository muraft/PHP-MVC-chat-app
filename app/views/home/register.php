<div class="card w-75 mx-auto mt-5">
  <div class="card-header text-primary">
      MuRafT Chat
  </div>
  <div class="card-body text-center">
    <h3 class="card-title text-primary"><i class="bi bi-pencil-square"></i> Register</h3>
    <div class="border border-danger text-danger mx-auto mb-3 d-<?=$data['errors']?'block':'none'?>">
      <?=join('.<br>',$data['errors'])?>
    </div>

    <form method="post" action="">
      <div class="form-floating w-md-50  mb-3 mx-auto">
      <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?=$data['username']?>" required>
      <label for="username"><i class="bi bi-person"></i> Username</label>
      </div>

      <div class="form-floating mb-3 mx-auto">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
      <label for="password"><i class="bi bi-braces-asterisk"></i> Password</label>
      </div>

      <div class="form-floating mb-3 mx-auto">
      <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password" required>
      <label for="password2"><i class="bi bi-braces-asterisk"></i> Confirm password</label>
      </div>
      Already have an account? <a href="<?=BASEURL.'/home/login'?>">Log in</a>
      <br>
      <button type="submit" class="btn btn-primary mt-3">Register</button>
    </form>
  </div>
  <div class="card-footer text-muted text-center">
    By <a href="https://muraft.github.io/" style="text-decoration: none">Muraft</a>
  </div>
</div>
