<?php
session_start();
$ecn = $_COOKIE['ecn'];
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
include("config.php");
$folder = $_POST['folder'];
$item_name = $_POST['event_name'];
$item_description = $_POST['event_description'];
$tags = $_POST['tags'];
$privacy = $_POST['privacy'];
$item_token = strtoupper(md5(time())).TokenGen(50);
$item = "event?token=".$item_token;
$item_type = "event";
$item_icon = "/img/icon-event.png";
$event_start = $_POST['event_start'];
$event_stop = $_POST['event_stop'];
$connect->query("INSERT INTO  `folder_items` (`ecn`,`folder`,`item_name`,`item_description`,`item_type`,`item_token`,`item_url`,`item_icon`,`privacy`,`item_size`,`tags`,`event_start`,`event_stop`) VALUES('$ecn','$folder','".mysqli_real_escape_string($connect,$item_name)."','".mysqli_real_escape_string($connect,$item_description)."','event','$item_token','$item','$item_icon','$privacy','','".mysqli_real_escape_string($connect,$tags)."','$event_start','$event_stop')");
header("Location:../folder?token=".$folder);
?>