<div class="card" id="reg-card">
  <div class="card-header">
    REGISTER
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
    <form action="../includes/validate-user.php" method="post">
      <div class="form-group">
        <label for="email">Full Name:</label>
        <input type="text" class="form-control" placeholder="Enter fullname" name="fname">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" placeholder="Enter email" name="email">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" placeholder="Enter password" name="pass">
      </div>
      <div class="form-group">
        <label for="pwd">Confirm password:</label>
        <input type="password" class="form-control" placeholder="Confirm password" name="cpass">
      </div>
      <div class="col text-center">
        <button type="submit" class="btn btn-success" name="submit" id="btn">Submit</button>
      </div>

    </form>
  </div>
</div>