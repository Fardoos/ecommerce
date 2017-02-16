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
    $result = "true";

else if($res == false)
    $result = "false";

echo json_encode($result);
?>