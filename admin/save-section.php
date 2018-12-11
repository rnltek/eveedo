<?php
include("../inc.config.php");
$section_parent = $_POST['parent'];
$section_name = $_POST['section_name'];
$connect->query("INSERT INTO `sections` (`section_name`,`section_parent`) VALUES('$section_name','$section_parent')");
header("Location:sections-expand.php?s=".$section_parent);
?>