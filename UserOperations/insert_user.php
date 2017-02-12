<?php
require_once 'user.php';
session_start();
require 'config.php';
ob_start();
$_SESSION['username'] = $_POST['name'];
$user = new users();
$user->name=        $_POST['name'];
$user->passwd=      $_POST['pass'];
$user->email=       $_POST['email'];
$user->job=         $_POST['job'];
$user->birthDay=    $_POST['birthday'];
$user->address=     $_POST['address'];
$user->creditLimit= $_POST['credit'];
$user->insert();
?>
