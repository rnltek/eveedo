<?php
session_start();
include("../inc.config.php");
$qadmin = "SELECT * FROM `admins` WHERE `admin_id`='".$_SESSION['admin_id']."'";
$radmin = $connect->query($qadmin);
$admin = mysqli_fetch_array($radmin);
echo $admin['first_name'].' '.$admin['last_name'];
?>