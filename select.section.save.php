<?php
session_start();
include("inc.config.php");
$qsection = "SELECT * FROM `sections` WHERE `section_id`='".$_GET['i']."'";
$rsection = $connect->query($qsection);
$section = mysqli_fetch_array($rsection);
$_SESSION['working'] = $section['section_name'];
$_SESSION['working_image'] = $section['section_image'];
$_SESSION['working_color'] = $section['section_color'];
    if($_GET['f']=='1'){
        include("inc.config.php");
        $connect->query("UPDATE `folders` SET `section`='".$section['section_name']."',`section_image`='".$section['section_image']."',`section_color`='".$section['section_color']."' WHERE `folder_token`='".$_GET['t']."'");
    }
    if($_GET['f']=='2'){
        include("inc.config.php");
        $connect->query("UPDATE `folder_items` SET `section`='".$section['section_name']."',`section_image`='".$section['section_image']."',`section_color`='".$section['section_color']."' WHERE `item_token`='".$_GET['t']."'");
    }
header("Location:".$_GET['r'].".php?t=".$_GET['t']);
?>