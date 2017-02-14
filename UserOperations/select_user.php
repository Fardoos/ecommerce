<?php
require_once 'user.php';
session_start();
require 'config.php';
ob_start();
$_SESSION['email'] = $_POST['email'];
$user = new users();
$user->passwd = $_POST['pass'];
$user->email= $_POST['email'];

 $res=$user->select();
if($res == true)
    //$result = "exist";
    header("Location: customer-orders.php");

else if($res == false)
    //$result = "not exist";
     header("Location: register.php");

//echo $result;
//echo json_encode($result);
?>