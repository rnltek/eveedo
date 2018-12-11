<?php
session_start();
include("config.php");
$ecn = $_COOKIE['ecn'];
$folder = $_POST['folder'];
$url = $_POST['url'];


function fetch_og($url)
{
    $data = file_get_contents($url);
    $dom = new DomDocument;
    @$dom->loadHTML($data);
     
    $xpath = new DOMXPath($dom);
    # query metatags with og prefix
    $metas = $xpath->query('//*/meta[starts-with(@property, \'og:\')]');

    $og = array();

    foreach($metas as $meta){
        # get property name without og: prefix
        $property = str_replace('og:', '', $meta->getAttribute('property'));
        # get content
        $content = $meta->getAttribute('content');
        $og[$property] = $content;
    }

    return $og;
}

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

$og = fetch_og($url);
//echo'<p>';
//echo $og['title'];
//echo'</p>';
//echo'<p>';
//echo $og['description'];
//echo'</p>';
//echo'<p>';
//echo '<img src="'.$og['image'].'" />';
//echo'</p>';
//$token = $_POST['token'];
$item_name = $og['title'];
$item_description = $og['description'];
$tags = str_replace(",&","",str_replace(" ",",",$og['title']));
$privacy = "Public";
$item_token = strtoupper(md5(time())).TokenGen(50);
$item = $url;
$item_icon=$og['image'];
if ($item_icon<"0"){$item_icon='/img/img_not_available.png';}
$connect->query("INSERT INTO  `folder_items` (`ecn`,`folder`,`item_name`,`item_description`,`item_type`,`item_token`,`item_url`,`item_icon`,`privacy`,`item_size`,`tags`) VALUES('$ecn','$folder','".mysqli_real_escape_string($connect,$item_name)."','".mysqli_real_escape_string($connect,$item_description)."','link','$item_token','$item','$item_icon','$privacy','','".mysqli_real_escape_string($connect,$tags)."')");
header("Location:../folder.php?token=".$folder);
?>