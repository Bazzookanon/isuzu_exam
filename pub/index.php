<?php
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0; // no error
$errmsg = $_REQUEST['errmsg'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>ToDoApp</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
  <script src="../assets/js/main.js"></script>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">ToDoApp</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?=$a2?>">
            <a class="nav-link" href="../includes/logout.php">Logout</a>
          </li>
        </ul>
      </form>
    </div>
  </nav>

  <div class="container">

    <div class="card" id="dash-card">
      <div class="card-header" id="dash-head">
        ToDoApp
      </div>
      <div class="card-body">
        <strong>Welcome: <?=$_SESSION['name'];?></strong>
        <button type="button" class="btn btn-primary float-right" onclick="openModal()">
          <i class="fa fa-calendar-plus-o" style="font-size:36px"></i>
        </button>
        <br>
        <br>
        <br>
        <?php
         if ($errmsg != "") {
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>'
          .$errmsg.
          '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span></button></div>';
          }
      ?>
        <br>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">Task Title</th>
              <th scope="col">Task Description</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody id="tbl">

          </tbody>
        </table>
      </div>
    </div>

  </div>


  <!-- Modal -->
  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="mtitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../includes/task-user.php" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Task Title</label>
              <input type="text" class="form-control" id="tasktitle" name="tasktitle" aria-describedby="emailHelp"
                placeholder="Enter Task Title" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Task Description </label>
              <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
        </div>

        <div class="modal-footer">
          <input type="hidden" name="id" id="id">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="submit" id="save">Save changes</button>
          <button type="button" class="btn btn-warning" name="submit" onclick="saveUpdate()" id="update"
            style="display: none;">Update changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>