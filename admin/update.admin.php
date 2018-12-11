<?php
include("inc.config.php");
$admin_id = $_POST['admin_id'];
$username = $_POST['username'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$password = $_POST['password'];
$connect->query("UPDATE `admins` SET `username`='".$username."' WHERE `admin_id`='".$admin_id."'");
$connect->query("UPDATE `admins` SET `first_name`='".$first_name."' WHERE `admin_id`='".$admin_id."'");
$connect->query("UPDATE `admins` SET `last_name`='".$last_name."' WHERE `admin_id`='".$admin_id."'");
if($password>'0'){
$connect->query("UPDATE `admins` SET `password`='".md5($password)."' WHERE `admin_id`='".$admin_id."'");
}
header("Location:admins.php");
?>