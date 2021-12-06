<div class="card" id="log-card">
  <div class="card-header">
    LOGIN
  </div>
  <div class="card-body">
    <?php
         if ($errmsg != "") {
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>'
          .$errmsg.
          '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span></button></div>';
          }
      ?>
    <form action="../includes/login-user.php" method="post">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pass">
      </div>
      <div class="col text-center">
        <button type="submit" class="btn btn-success" name="submit" id="btn">Submit</button>
      </div>

    </form>
  </div>
</div>