<?php
session_start();
include("../inc.config.php");
$token = $_POST['item_token'];
$item_name = $_POST['item_name'];
$item_description =$_POST['item_description'];
$privacy = $_POST['privacy'];
$tags = $_POST['tags'];
$section = $_POST['section'];
$connect->query("UPDATE `folder_items` SET `section`='".mysqli_real_escape_string($connect,$section)."', `item_name`='".mysqli_real_escape_string($connect,$item_name)."', `item_description`='".mysqli_real_escape_string($connect,$item_description)."', `privacy`='$privacy', `tags`='".mysqli_real_escape_string($connect,$tags)."' WHERE `item_token`='$token'");
header("Location:../edit.item.php?t=".$token);
?>