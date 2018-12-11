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
include ("../inc.config.php");
$folder_name = $_POST['folder_name'];
$folder_description = $_POST['folder_description'];
$privacy = $_POST['privacy'];
$tags = $_POST['tags'];
$ecn = $_COOKIE['ecn'];
$token = strtoupper(md5($_COOKIE['ecn']).md5(time()).TokenGen(50));
$section = $_POST['section'];
$section_image = $_POST['section_image'];
$section_color = $_POST['section_color'];
$parent = $_POST['parent'];
$query = "INSERT INTO `folders` (`folder_name`,`folder_description`,`folder_token`,`owner_ecn`,`parent_folder`,`folder_private`,`tags`,`section`,`section_image`,`section_color`) VALUES('".mysqli_real_escape_string($connect,$folder_name)."','".mysqli_real_escape_string($connect,$folder_description)."','".mysqli_real_escape_string($connect,$token)."','$ecn','".mysqli_real_escape_string($connect,$parent)."','$privacy','".mysqli_real_escape_string($connect,$tags)."','$section','$section_image','$section_color')";
$connect->query($query);
//echo $query;
header("Location:../edit.folder.php?t=$token");
?>