<?php
session_start(); 
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    include_once('../class/db.php');
    include_once('../class/data.php');
    include_once('../class/user.php');
    $reg = new SignUpCont($fname, $email, $pass, $cpass);
    
    $reg->signupUser();

    $sucess='Save Success!';
    header('location: ../pub/index.php');
    exit();
    
}