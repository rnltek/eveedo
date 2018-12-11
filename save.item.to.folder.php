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
$item_token = $_GET['i'];
$folder_token = $_GET['f'];
$qitem = "SELECT * FROM `folder_items` WHERE `item_token`='$item_token'";
$ritem = $connect->query($qitem);
$item = mysqli_fetch_array($ritem);
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
$new_token = strtoupper(md5(time()).TokenGen(50));
//echo "<p>Folder - $folder_token</p>";
//echo "<p>Name/Title - $item_name</p>";
//echo "<p>Description - $item_description</p>";
//echo "<p>Image - $item_icon</p>";
//echo "<p>Section - $section</p>";
//echo "<p>tags - $tags</p>";
//echo "<p>Type - $item_type</p>";
//echo "<p>Privacy - $privacy</p>";
//echo "<p>New Token - $new_token</p>";
$connect->query("INSERT INTO  `folder_items` (`ecn`,`folder`,`item_name`,`item_description`,`item_type`,`item_token`,`item_url`,`item_icon`,`privacy`,`item_size`,`tags`,`section`,`section_image`,`section_color`) VALUES('$ecn','$folder_token','".mysqli_real_escape_string($connect,$item_name)."','".mysqli_real_escape_string($connect,$item_description)."','$item_type','$new_token','$item_url','$item_icon','$privacy','$item_size','".mysqli_real_escape_string($connect,$tags)."','".$section."','".$section_image."','".$section_color."')");
header("Location:folder.php?t=$folder_token");
?>