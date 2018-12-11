<?php
include ("inc.config.php");
$sectionID = $_GET['i'];
$qsection = "SELECT * FROM `sections` WHERE `section_id`='".$sectionID."'";
$rsection = $connect->query($qsection);
$section = mysqli_fetch_array($rsection);
$section_parent = $section['section_parent'];
$connect->query("DELETE FROM `sections` WHERE `section_id`='".$sectionID."'");
$connect->query("DELETE FROM `sections` WHERE `section_parent`='".$sectionID."'");
if ($section_parent==0){
    header("Location:sections.php");
}else{
    header("Location:section.expand.php?i=$section_parent");
}
?>