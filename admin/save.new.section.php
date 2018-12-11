<?php
include ("inc.config.php");
$section_name = $_POST['section_name'];
$section_parent = $_POST['section_parent'];
$section_image = $_POST['section_image'];
$section_color = $_POST['section_color'];
$connect->query("INSERT INTO `sections` (`section_name`,`section_parent`,`section_image`,`section_color`) VALUES('".$section_name."','".$section_parent."','".$section_image."','".$section_color."')");
header("Location:section.expand.php?i=$section_parent")
?>