<?php
session_start();
include("config.php");
$token = $_POST['token'];
$item_name = $_POST['item_name'];
$item_description = $_POST['item_description'];
$privacy = $_POST['privacy'];
$tags = $_POST['tags'];
$connect->query("UPDATE `folder_items` SET `item_name`='".mysqli_real_escape_string($connect,$item_name)."', `item_description`='".mysqli_real_escape_string($connect,$item_description)."', `privacy`='$privacy', `tags`='".mysqli_real_escape_string($connect,$tags)."' WHERE `item_token`='$token'");
header("Location:../item.settings?token=".$token);
?>