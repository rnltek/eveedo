<?php
include("inc.config.php");
$qfolder = "SELECT * FROM `folders`";
$rfolder = $connect->query($qfolder);
while ($folder = mysqli_fetch_array($rfolder)){
    $qsection = "SELECT * FROM `sections` WHERE `section_name`='".$folder['section']."'";
    $rsection = $connect->query($qsection);
    $section = mysqli_fetch_array($rsection);
    $connect->query("UPDATE `folders` SET `section_image`='".$section['section_image']."', `section_color`='".$section['section_color']."' WHERE `folder_id`='".$folder['folder_id']."'");
    
}
echo "<pre>Done</pre>";
?>