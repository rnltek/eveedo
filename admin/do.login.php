<?php
session_start();
include("inc.config.php");
$username = $_POST['username'];
$password = md5($_POST['password']);
$qadmin = "SELECT * FROM `admins` WHERE `username`='".$username."' AND `password`='".$password."'";
$radmin = $connect->query($qadmin);
$test = mysqli_num_rows($radmin);
if ($test==0){
    header("Location:/admin/");
}else{
    $admin = mysqli_fetch_array($radmin);
    $_SESSION['first_name'] = $admin['first_name'];
    $_SESSION['last_name'] = $admin['last_name'];
    $_SESSION['admin_id'] = $admin['admin_id'];
    header("Location:index.php");
}
?>