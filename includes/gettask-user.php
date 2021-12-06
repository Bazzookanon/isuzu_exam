<?php
session_start(); 

    $id = $_POST['id'];
    $pro = $_POST['pro'];

    include_once('../class/db.php');
    include_once('../class/data.php');
    include_once('../class/gettask.php');
    $reg = new getTask($id); 
     if ($pro == 1) {
         echo $reg->getspcTask();
     }
     if ($pro == 2){
        echo $reg->doneTask();
     }
     if ($pro == 3){
        echo $reg->removeTask();
     }
     if ($pro == 4){
        echo $reg->editTask();
     }
   
   
    
    