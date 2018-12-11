<?php
session_start();
function TokenGen($len){
    $result = "";
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $charArray = str_split($chars);
    for($i = 0; $i < $len; $i++){
        $randItem = array_rand($charArray);
        $result .= "".$charArray[$randItem];
    }
    return $result;
}
$ecn = $_COOKIE['ecn'];
include("inc.config.php");
$old_folder = $_GET['of'];
$parent = $_GET['nf'];
$qfolder = "SELECT * FROM `folders` WHERE `folder_token`='$old_folder'";
$rfolder = $connect->query($qfolder);
$folder = mysqli_fetch_array($rfolder);
$folder_name = $folder['folder_name'];
$folder_description = $folder['folder_description'];
$folder_image = $folder['folder_image'];
$folder_cover = $folder['folder_cover'];
$section = $folder['section'];
$section_image = $folder['section_image'];
$section_color = $folder['section_color'];
$tags = $folder['tags'];
$privacy = $folder['folder_private'];
$new_token = "F".strtoupper(md5(time()).TokenGen(50));
//echo "<p>Folder - $folder_token</p>";
//echo "<p>Name/Title - $item_name</p>";
//echo "<p>Description - $item_description</p>";
//echo "<p>Image - $item_icon</p>";
//echo "<p>Section - $section</p>";
//echo "<p>tags - $tags</p>";
//echo "<p>Type - $item_type</p>";
//echo "<p>Privacy - $privacy</p>";
//echo "<p>New Token - $new_token</p>";
$query = "INSERT INTO `folders` (`folder_name`,`folder_description`,`folder_image`,`folder_cover`,`folder_token`,`owner_ecn`,`parent_folder`,`folder_private`,`tags`,`section`,`section_image`,`section_color`) VALUES('".mysqli_real_escape_string($connect,$folder_name)."','".mysqli_real_escape_string($connect,$folder_description)."','$folder_image','$folder_cover','".mysqli_real_escape_string($connect,$new_token)."','$ecn','".mysqli_real_escape_string($connect,$parent)."','$privacy','".mysqli_real_escape_string($connect,$tags)."','".$section."','".$section_image."','".$section_color."')";
$connect->query($query);

$qitems = "SELECT * from `folder_items` WHERE `folder`='$old_folder' AND `privacy`='Public'";
$ritems = $connect->query($qitems);
while ($item = mysqli_fetch_array($ritems)){
$newitemtoken = "I".strtoupper(md5(time()).TokenGen(50));
$item_name = $item['item_name'];
$item_description = $item['item_description'];
$item_icon = $item['item_icon'];
$item_url = $item['item_url'];
$section = $item['section'];
$section_image = $item['section_image'];
$section_color = $item['section_color'];
$tags = $item['tags'];
$item_type = $item['item_type'];
$item_size = $item['item_size'];
$privacy = $item['privacy'];
$connect->query("INSERT INTO  `folder_items` (`ecn`,`folder`,`item_name`,`item_description`,`item_type`,`item_token`,`item_url`,`item_icon`,`privacy`,`item_size`,`tags`,`section`,`section_image`,`section_color`) VALUES('$ecn','$new_token','".mysqli_real_escape_string($connect,$item_name)."','".mysqli_real_escape_string($connect,$item_description)."','$item_type','$newitemtoken','$item_url','$item_icon','$privacy','$item_size','".mysqli_real_escape_string($connect,$tags)."','".$section."','".$section_image."','".$section_color."')");
}
header("Location:folder.php?t=$parent");
?>