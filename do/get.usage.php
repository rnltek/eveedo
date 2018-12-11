<?php
//session_start();
include("inc.config.php");
$ecn = $_COOKIE['ecn'];
$quser = "SELECT * FROM `users` WHERE `ecn`='$ecn'";
$ruser = $connect->query($quser);
$user = mysqli_fetch_array($ruser);
function folderSize ($dir)
{
    $size = 0;
    foreach (glob(rtrim($dir, '/').'/*', GLOB_NOSORT) as $each) {
        $size += is_file($each) ? filesize($each) : folderSize($each);
    }
    return $size;
}
function human_filesize($bytes, $decimals = 2) {
    $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}
$userdir = "c:/wamp/www/data/".$ecn;
//echo filesize($userdir);
$query = "SELECT * FROM `folder_items` WHERE `ecn`='$ecn'";
$result = $connect->query($query);
$ttl=0;
while($row=mysqli_fetch_array($result)){
 $ttl=$ttl+$row['item_size'];   
}
$max = human_filesize($user['max_bytes']);
$ttl = human_filesize($ttl);
echo $ttl.' of '.$max.' used';
?>