<?php
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0; // no error
$errmsg = $_REQUEST['errmsg'];
$sucess = $_REQUEST['sucess'];
$page=$_REQUEST['page']; 
if($page=='') { $wp='login.php'; $a1='active';}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>ToDoApp</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
  <?php
      $a1='';
      $a2='';
      $a3='';
      if($page=='1') { $wp='login.php'; $a1='active'; }
      if($page=='2') { $wp='register.php'; $a2='active'; }
  ?>
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
          <li class="nav-item <?=$a1?>">
            <a class="nav-link" href="index.php?page=1">Login</a>
          </li>
          <li class="nav-item <?=$a2?>">
            <a class="nav-link" href="index.php?page=2">Register</a>
          </li>
        </ul>
      </form>
    </div>
  </nav>

  <div class="container">
    <?php require_once($wp)?>
  </div>
</body>

</html>