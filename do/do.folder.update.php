<?php
session_start();
include("../inc.config.php");
$token = $_POST['folder'];
$folder_name = $_POST['folder_name'];
$folder_description = utf8_decode($_POST['folder_description']);
$privacy = $_POST['privacy'];
$tags = $_POST['tags'];
$section = $_POST['section'];
$connect->query("UPDATE `folders` SET `section`='".mysqli_real_escape_string($connect,$section)."', `folder_name`='".mysqli_real_escape_string($connect,$folder_name)."', `folder_description`='".mysqli_real_escape_string($connect,$folder_description)."', `folder_private`='$privacy', `tags`='".mysqli_real_escape_string($connect,$tags)."' WHERE `folder_token`='$token'");
header("Location:../edit.folder.php?t=".$token);
?>