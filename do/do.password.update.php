<?php
session_start();
$ecn = $_COOKIE['ecn'];
include ("../inc.config.php");
$pwd = md5($_POST['password']);
$connect->query("UPDATE `users` SET `password`='$pwd' WHERE `ecn`='$ecn'");
header("Location:../");
?>