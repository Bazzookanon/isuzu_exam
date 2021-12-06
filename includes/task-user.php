<?php
session_start();
if (isset($_POST['submit'])) {
    $tasktitle = $_POST['tasktitle'];
    $description = $_POST['description'];

    include_once('../class/db.php');
    include_once('../class/data.php');
    include_once('../class/task.php');
    $reg = new taskUser($tasktitle, $description); 

    $reg->verifiedUser();

    header('location: ../pub/index.php?msg=success');
    exit();
    
}