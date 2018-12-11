<?php
include("inc.config.php");
$qitems = "SELECT * FROM `folder_items`";
$ritems = $connect->query($qitems);
while ($item = mysqli_fetch_array($ritems)){
    $qsection = "SELECT * FROM `sections` WHERE `section_name`='".$item['section']."'";
    $rsection = $connect->query($qsection);
    $section = mysqli_fetch_array($rsection);
    $connect->query("UPDATE `folder_items` SET `section_image`='".$section['section_image']."', `section_color`='".$section['section_color']."' WHERE `id`='".$item['id']."'");

}
echo "<pre>Done</pre>";
?>