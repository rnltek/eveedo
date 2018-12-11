<?php
session_start();
include("config.php");
$token = $_POST['token'];
$folder_name = $_POST['folder_name'];
$folder_description = $_POST['folder_description'];
$privacy = $_POST['privacy'];
$tags = $_POST['tags'];
$connect->query("UPDATE `folders` SET `folder_name`='".mysqli_real_escape_string($connect,$folder_name)."', `folder_description`='".mysqli_real_escape_string($connect,$folder_description)."', `privacy`='$privacy', `tags`='".mysqli_real_escape_string($connect,$tags)."' WHERE `token`='$token'");
header("Location:../folder.settings?token=".$token);
?>