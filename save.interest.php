<?php
session_start();
$ecn = $_COOKIE['ecn'];
$interest = $_GET['i'];
include("inc.config.php");
$connect->query("INSERT INTO `interests` (`ecn`,`interest`) VALUES('$ecn','$interest')");
header("Location:extended.php");
?>