<?php
include("../inc.config.php");
$item = $_GET['t'];
$folder = $_GET['f'];
$qitem = "SELECT * FROM `folder_items` WHERE `item_token`='$item'";
$ritem = $connect->query($qitem);
$row = mysqli_fetch_array($ritem);
unlink("../".$row['item_url']);
$connect->query("DELETE FROM `folder_items` WHERE `item_token`='$item'");
header("Location:../folder.php?t=".$folder);
?>