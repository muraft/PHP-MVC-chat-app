<div class="card w-75 overflow-auto mx-auto mt-2">
  <div class="card-header text-primary">
      <a class="btn btn-primary" href="<?=BASEURL?>"><i class="bi bi-caret-left"></i></a>
  </div>
  <div class="card-body text-center">
    <h3 class="card-title text-primary"><i class="bi bi-palette"></i> Customize</h3>
    <div class="rounded w-50 mx-auto p-1 text-white border border-primary mb-3 border-bottom border-primary" style="background-color: <?=$data['user']['color']?>">
      <h6>Your Profile</h6>
      <i class="bi bi-<?=$data['user']['icon']?>"></i>
      <?=$data['user']['name'].'#'.$data['user']['id']?>
    </div>
    <form method="post" action="">
      <div class="row overflow-auto border border-primary rounded" style="height: 250px !important;">
        <div class="col-md-6 col-sm-12 border border-primary p-2">
          <div class="form-group text-start">
            <h3 class="text-primary text-center"><i class="bi bi-droplet"></i>Color</h3>
            <div class="radio">
              <label><input type="radio" name="color" value="#0d6efd"> <font color="#0d6efd"><i class="bi bi-square-fill"></i> Blue</font></label>
            </div>
            <div class="radio">
              <label><input type="radio" name="color" value="red"> <font color="red"><i class="bi bi-square-fill"></i> Red</font></label>
            </div>
            <div class="radio">
              <label><input type="radio" name="color" value="green"> <font color="green"><i class="bi bi-square-fill"></i> Green</font></label>
            </div>
            <div class="radio">
              <label><input type="radio" name="color" value="#f5e025"> <font color="#f5e025"><i class="bi bi-square-fill"> Yellow</i></font></label>
            </div>
            <div class="radio">
              <label><input type="radio" name="color" value="black"> <font color="black"><i class="bi bi-square-fill"></i> Black</font></label>
            </div>
            <div class="radio">
              <label><input type="radio" name="color" value="#ea25f5"> <font color="#ea25f5"><i class="bi bi-square-fill"></i> Purple</font></label>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-12 border border-primary p-2">
          <div class="form-group text-start text-primary">
            <h3 class="text-center"><i class="bi bi-stickies"></i>Icon</h3>
            <div class="radio">
              <label><input type="radio" name="icon" value="person-circle"> <i class="bi bi-person-circle"></i> Person</label>
            </div>
            <div class="radio">
              <label><input type="radio" name="icon" value="emoji-smile"> <i class="bi bi-emoji-smile"></i> Smile</label>
            </div>
            <div class="radio">
              <label><input type="radio" name="icon" value="emoji-sunglasses"> <i class="bi bi-emoji-sunglasses"></i> Cool</label>
            </div>
            <div class="radio">
              <label><input type="radio" name="icon" value="controller"> <i class="bi bi-controller"></i> Controller</label>
            </div>
            <div class="radio">
              <label><input type="radio" name="icon" value="phone"> <i class="bi bi-phone"></i> Phone</label>
            </div>
          </div>
        </div>
      </div>
      <button type="submit" name='submit' class="btn btn-primary mt-2">Submit</button>
    </form>
  </div>
  <div class="card-footer text-muted text-center">
    By <a href="https://muraft.github.io/" style="text-decoration: none">Muraft</a>
  </div>
</div>
