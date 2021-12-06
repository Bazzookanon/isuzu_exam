<?php
session_start(); 

    $id = $_POST['id'];
    $tasktitle = $_POST['tasktitle'];
    $description = $_POST['description'];

    include_once('../class/db.php');
    include_once('../class/data.php');
    include_once('../class/updatetask.php');
    $reg = new updateTask($id, $tasktitle, $description);  

    echo $reg->saveUpdateTask();
  