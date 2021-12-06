<?php
session_start(); 
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    include_once('../class/db.php');
    include_once('../class/data.php');
    include_once('../class/login.php');
    $reg = new loginUser($email, $pass); 

    $reg->login();

    // header('location: ../User/index.php?page=1');
    // exit();
    
}