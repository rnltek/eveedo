<?php
include("inc.config.php");
$connect->query("DELETE FROM `admins` WHERE `admin_id`='".$_GET['i']."'");
header("Location:admins.php");
?>