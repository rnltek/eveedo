<?php
include("inc.config.php");
$id = $_GET['i'];
$connect->query("DELETE FROM `interests` WHERE `id`=$id");
header("Location:extended.php");
?>