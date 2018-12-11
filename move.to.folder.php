<?php
include("inc.config.php");
$old_folder = $_GET['o'];
$new_folder = $_GET['f'];
$item = $_GET['t'];
$connect->query("UPDATE `folder_items` SET `folder`='$new_folder' WHERE `item_token`='$item'");
header("Location:folder.php?t=$old_folder");
?>
