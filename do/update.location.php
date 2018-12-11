<?php
session_start();
function getaddressCountry($lat,$long)
{
    $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($long);
    $json = @file_get_contents($url);
    $data=json_decode($json);
    $status = $data->status;
    if($status=="OK")
        for($j=0;$j<count($data->results[0]->address_components);$j++){

            $cn=array($data->results[0]->address_components[$j]->types[0]);

            if(in_array("country", $cn)){
                return $country= $data->results[0]->address_components[$j]->long_name;
            }
        }
    else
        return false;
}
function getaddressNoStreet($lat,$long)
{
    $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($long);
    $json = @file_get_contents($url);
    $data=json_decode($json);
    $status = $data->status;
    if($status=="OK")
        return $data->results[2]->formatted_address;
    else
        return false;
}
function getaddressFull($lat,$long)
{
    $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($long);
    $json = @file_get_contents($url);
    $data=json_decode($json);
    $status = $data->status;
    if($status=="OK")
        return $data->results[0]->formatted_address;
    else
        return false;
}
$lat = $_GET['lat'];
$lon = $_GET['lon'];
$location = getaddressNoStreet($lat,$lon);
$location_full = getaddressFull($lat,$lon);
$country = getaddressCountry($lat,$lon);
if(isset($_COOKIE['ecn'])){
include("../inc.config.php");
    $ecn = $_COOKIE['ecn'];
    $connect->query("UPDATE `users` SET `lat`='$lat', `lon`='$lon',`location`='$location',`location_full`='$location_full',`country`='$country' WHERE `ecn`='$ecn'");
?>
<script>
console.log("<?php echo $lat;?>");
console.log("<?php echo $lon;?>");
console.log("<?php echo $location;?>");
console.log("<?php echo $location_full;?>");
console.log("<?php echo $country;?>");
</script>
<?php
}else{
$cookie_name = "lat";
$cookie_value = $lat;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
$cookie_name = "lon";
$cookie_value = $lon;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
$cookie_name = "location";
$cookie_value = $location;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
$cookie_name = "location_full";
$cookie_value = $location_full;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
$cookie_name = "country";
$cookie_value = $country;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
?>
<script>
console.log("<?php echo $lat;?>");
console.log("<?php echo $lon;?>");
console.log("<?php echo $location;?>");
console.log("<?php echo $location_full;?>");
console.log("<?php echo $country;?>");
</script>
<?php
}
?>