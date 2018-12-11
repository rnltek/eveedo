<?php
include("inc.config.php");
$username = $_POST['username'];
$password = md5($_POST['password']);
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$connect->query("INSERT INTO `admins` (`username`,`password`,`first_name`,`last_name`) VALUES('".$username."','".$password."','".$first_name."','".$last_name."')");
header("Location:admins.php");
?>