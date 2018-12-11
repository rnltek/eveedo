<?php
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
function ECNGen($len){
    $result = "";
    $chars = "0123456789";
    $charArray = str_split($chars);
    for($i = 0; $i < $len; $i++){
	    $randItem = array_rand($charArray);
	    $result .= "".$charArray[$randItem];
    }
    return $result;
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
session_start();
include ("../inc.config.php");
$email = $_POST['e'];
$query = "SELECT * FROM `users` WHERE `email`='".$email."'";
$result = $connect->query($query);
$test = mysqli_num_rows($result);
if($test>0){header("Location:../regsteperror.php");exit();}
$password = md5($_POST['p']);
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$dob_month = $_POST['dob_month'];
$dob_day = $_POST['dob_day'];
$dob_year = $_POST['dob_year'];
$ecn = ECNGen(3).'-'.ECNGen(3).'-'.ECNGen(4);
$lat = $_COOKIE['lat'];
$lon = $_COOKIE['lon'];
$location = getaddressNoStreet($lat,$lon);
$location_full = getaddressFull($lat,$lon);
$country = getaddressCountry($lat,$lon);
$fullname = $_POST['first_name'].' '.$_POST['last_name'];
if ($country=="Afghanistan"){$ecnpre = "901";}
if ($country=="Albania"){$ecnpre = "902";}
if ($country=="Algeria"){$ecnpre = "903";}
if ($country=="Andorra"){$ecnpre = "904";}
if ($country=="Angola"){$ecnpre = "905";}
if ($country=="Anguilla"){$ecnpre = "906";}
if ($country=="Antigua & Barbuda"){$ecnpre = "907";}
if ($country=="Argentina"){$ecnpre = "908";}
if ($country=="Armenia"){$ecnpre = "909";}
if ($country=="Australia"){$ecnpre = "104";}
if ($country=="Austria"){$ecnpre = "911";}
if ($country=="Azerbaijan"){$ecnpre = "912";}
if ($country=="Bahamas"){$ecnpre = "913";}
if ($country=="Bahrain"){$ecnpre = "914";}
if ($country=="Bangladesh"){$ecnpre = "915";}
if ($country=="Barbados"){$ecnpre = "916";}
if ($country=="Belarus"){$ecnpre = "917";}
if ($country=="Belgium"){$ecnpre = "918";}
if ($country=="Belize"){$ecnpre = "919";}
if ($country=="Benin"){$ecnpre = "920";}
if ($country=="Bermuda"){$ecnpre = "921";}
if ($country=="Bhutan"){$ecnpre = "922";}
if ($country=="Bolivia"){$ecnpre = "923";}
if ($country=="Bosnia & Herzegovina"){$ecnpre = "924";}
if ($country=="Botswana"){$ecnpre = "925";}
if ($country=="Brazil"){$ecnpre = "926";}
if ($country=="Brunei Darussalam"){$ecnpre = "927";}
if ($country=="Bulgaria"){$ecnpre = "928";}
if ($country=="Burkina Faso"){$ecnpre = "929";}
if ($country=="Myanmar"){$ecnpre = "930";}
if ($country=="Burundi"){$ecnpre = "931";}
if ($country=="Cambodia"){$ecnpre = "932";}
if ($country=="Cameroon"){$ecnpre = "933";}
if ($country=="Canada"){$ecnpre = "102";}
if ($country=="Cape Verde"){$ecnpre = "934";}
if ($country=="Cayman Islands"){$ecnpre = "935";}
if ($country=="Central African Republic"){$ecnpre = "936";}
if ($country=="Chad"){$ecnpre = "937";}
if ($country=="Chile"){$ecnpre = "938";}
if ($country=="China"){$ecnpre = "939";}
if ($country=="Colombia"){$ecnpre = "940";}
if ($country=="Comoros"){$ecnpre = "941";}
if ($country=="Congo"){$ecnpre = "942";}
if ($country=="Costa Rica"){$ecnpre = "943";}
if ($country=="Croatia"){$ecnpre = "944";}
if ($country=="Cuba"){$ecnpre = "945";}
if ($country=="Cyprus"){$ecnpre = "946";}
if ($country=="Czech Republic"){$ecnpre = "947";}
if ($country=="Democratic Republic of the Congo"){$ecnpre = "948";}
if ($country=="Denmark"){$ecnpre = "949";}
if ($country=="Djibouti"){$ecnpre = "950";}
if ($country=="Dominican Republic"){$ecnpre = "951";}
if ($country=="Dominica"){$ecnpre = "952";}
if ($country=="Ecuador"){$ecnpre = "953";}
if ($country=="Egypt"){$ecnpre = "954";}
if ($country=="El Salvador"){$ecnpre = "955";}
if ($country=="Equatorial Guinea"){$ecnpre = "956";}
if ($country=="Eritrea"){$ecnpre = "957";}
if ($country=="Estonia"){$ecnpre = "958";}
if ($country=="Ethiopia"){$ecnpre = "959";}
if ($country=="Fiji"){$ecnpre = "960";}
if ($country=="Finland"){$ecnpre = "961";}
if ($country=="France"){$ecnpre = "962";}
if ($country=="French Guiana"){$ecnpre = "963";}
if ($country=="Gabon"){$ecnpre = "964";}
if ($country=="Gambia"){$ecnpre = "965";}
if ($country=="Georgia"){$ecnpre = "966";}
if ($country=="Germany"){$ecnpre = "967";}
if ($country=="Ghana"){$ecnpre = "968";}
if ($country=="Great Britain"){$ecnpre = "103";}
if ($country=="Greece"){$ecnpre = "969";}
if ($country=="Grenada"){$ecnpre = "970";}
if ($country=="Guadeloupe"){$ecnpre = "971";}
if ($country=="Guatemala"){$ecnpre = "972";}
if ($country=="Guinea"){$ecnpre = "973";}
if ($country=="Guinea-Bissau"){$ecnpre = "974";}
if ($country=="Guyana"){$ecnpre = "975";}
if ($country=="Haiti"){$ecnpre = "976";}
if ($country=="Honduras"){$ecnpre = "977";}
if ($country=="Hungary"){$ecnpre = "978";}
if ($country=="Iceland"){$ecnpre = "979";}
if ($country=="India"){$ecnpre = "980";}
if ($country=="Indonesia"){$ecnpre = "981";}
if ($country=="Iran"){$ecnpre = "982";}
if ($country=="Iraq"){$ecnpre = "983";}
if ($country=="Israel"){$ecnpre = "984";}
if ($country=="Italy"){$ecnpre = "985";}
if ($country=="Ivory Coast"){$ecnpre = "986";}
if ($country=="Jamaica"){$ecnpre = "987";}
if ($country=="Japan"){$ecnpre = "988";}
if ($country=="Jordan"){$ecnpre = "989";}
if ($country=="Kazakhstan"){$ecnpre = "990";}
if ($country=="Kenya"){$ecnpre = "991";}
if ($country=="Kosovo"){$ecnpre = "992";}
if ($country=="Kuwait"){$ecnpre = "993";}
if ($country=="Kyrgyzstan"){$ecnpre = "994";}
if ($country=="Laos"){$ecnpre = "995";}
if ($country=="Latvia"){$ecnpre = "996";}
if ($country=="Lebanon"){$ecnpre = "997";}
if ($country=="Lesotho"){$ecnpre = "998";}
if ($country=="Liberia"){$ecnpre = "999";}
if ($country=="Libya"){$ecnpre = "801";}
if ($country=="Liechtenstein"){$ecnpre = "802";}
if ($country=="Lithuania"){$ecnpre = "803";}
if ($country=="Luxembourg"){$ecnpre = "804";}
if ($country=="Macedonia"){$ecnpre = "805";}
if ($country=="Madagascar"){$ecnpre = "806";}
if ($country=="Malawi"){$ecnpre = "807";}
if ($country=="Malaysia"){$ecnpre = "808";}
if ($country=="Maldives"){$ecnpre = "809";}
if ($country=="Mali"){$ecnpre = "810";}
if ($country=="Malta"){$ecnpre = "811";}
if ($country=="Martinique"){$ecnpre = "812";}
if ($country=="Mauritania"){$ecnpre = "813";}
if ($country=="Mauritius"){$ecnpre = "814";}
if ($country=="Mayotte"){$ecnpre = "815";}
if ($country=="Mexico"){$ecnpre = "816";}
if ($country=="Moldova"){$ecnpre = "817";}
if ($country=="Monaco"){$ecnpre = "818";}
if ($country=="Mongolia"){$ecnpre = "819";}
if ($country=="Montenegro"){$ecnpre = "820";}
if ($country=="Montserrat"){$ecnpre = "821";}
if ($country=="Morocco"){$ecnpre = "822";}
if ($country=="Mozambique"){$ecnpre = "823";}
if ($country=="Namibia"){$ecnpre = "824";}
if ($country=="Nepal"){$ecnpre = "825";}
if ($country=="Netherlands"){$ecnpre = "826";}
if ($country=="New Zealand"){$ecnpre = "827";}
if ($country=="Nicaragua"){$ecnpre = "828";}
if ($country=="Niger"){$ecnpre = "829";}
if ($country=="Nigeria"){$ecnpre = "830";}
if ($country=="North Korea"){$ecnpre = "831";}
if ($country=="Norway"){$ecnpre = "832";}
if ($country=="Oman"){$ecnpre = "833";}
if ($country=="Pacific Islands"){$ecnpre = "834";}
if ($country=="Pakistan"){$ecnpre = "835";}
if ($country=="Panama"){$ecnpre = "836";}
if ($country=="Papua New Guinea"){$ecnpre = "837";}
if ($country=="Paraguay"){$ecnpre = "838";}
if ($country=="Peru"){$ecnpre = "839";}
if ($country=="Philippines"){$ecnpre = "163";}
if ($country=="Poland"){$ecnpre = "840";}
if ($country=="Portugal"){$ecnpre = "105";}
if ($country=="Puerto Rico"){$ecnpre = "106";}
if ($country=="Qatar"){$ecnpre = "841";}
if ($country=="Reunion"){$ecnpre = "842";}
if ($country=="Romania"){$ecnpre = "843";}
if ($country=="Russian Federation"){$ecnpre = "844";}
if ($country=="Rwanda"){$ecnpre = "845";}
if ($country=="Saint Kitts and Nevis"){$ecnpre = "846";}
if ($country=="Saint Lucia"){$ecnpre = "847";}
if ($country=="Saint Vincent's & Grenadines"){$ecnpre = "848";}
if ($country=="Samoa"){$ecnpre = "849";}
if ($country=="Sao Tome and Principe"){$ecnpre = "850";}
if ($country=="Saudi Arabia"){$ecnpre = "851";}
if ($country=="Senegal"){$ecnpre = "852";}
if ($country=="Serbia"){$ecnpre = "853";}
if ($country=="Seychelles"){$ecnpre = "854";}
if ($country=="Sierra Leone"){$ecnpre = "855";}
if ($country=="Singapore"){$ecnpre = "856";}
if ($country=="Slovakia"){$ecnpre = "857";}
if ($country=="Slovenia"){$ecnpre = "858";}
if ($country=="Solomon Islands"){$ecnpre = "859";}
if ($country=="Somalia"){$ecnpre = "860";}
if ($country=="South Africa"){$ecnpre = "861";}
if ($country=="South Korea"){$ecnpre = "862";}
if ($country=="South Sudan"){$ecnpre = "863";}
if ($country=="Spain"){$ecnpre = "107";}
if ($country=="Sri Lanka"){$ecnpre = "864";}
if ($country=="Sudan"){$ecnpre = "865";}
if ($country=="Suriname"){$ecnpre = "866";}
if ($country=="Swaziland"){$ecnpre = "867";}
if ($country=="Sweden"){$ecnpre = "868";}
if ($country=="Switzerland"){$ecnpre = "869";}
if ($country=="Syria"){$ecnpre = "870";}
if ($country=="Tajikistan"){$ecnpre = "871";}
if ($country=="Tanzania"){$ecnpre = "872";}
if ($country=="Thailand"){$ecnpre = "873";}
if ($country=="Timor Leste"){$ecnpre = "874";}
if ($country=="Togo"){$ecnpre = "875";}
if ($country=="Trinidad & Tobago"){$ecnpre = "876";}
if ($country=="Tunisia"){$ecnpre = "877";}
if ($country=="Turkey"){$ecnpre = "878";}
if ($country=="Turkmenistan"){$ecnpre = "879";}
if ($country=="Turks & Caicos Islands"){$ecnpre = "880";}
if ($country=="Uganda"){$ecnpre = "881";}
if ($country=="Ukraine"){$ecnpre = "882";}
if ($country=="United Arab Emirates"){$ecnpre = "883";}
if ($country=="United States"){$ecnpre = "101";}
if ($country=="United Kingdom"){$ecnpre = "103";}
if ($country=="Uruguay"){$ecnpre = "884";}
if ($country=="Uzbekistan"){$ecnpre = "885";}
if ($country=="Venezuela"){$ecnpre = "886";}
if ($country=="Vietnam"){$ecnpre = "887";}
if ($country=="UK Virgin Islands"){$ecnpre = "889";}
if ($country=="US Virgin Islands"){$ecnpre = "888";}
if ($country=="Yemen"){$ecnpre = "890";}
if ($country=="Zambia"){$ecnpre = "891";}
if ($country=="Zimbabwe"){$ecnpre = "892";}
$token = strtoupper(md5($ecnpre.'-'.$ecn).md5(time()).TokenGen(50));
$connect->query("INSERT INTO `users` (`ecn`,`token`,`email`,`password`,`first_name`,`last_name`,`gender`,`dob_month`,`dob_day`,`dob_year`,`location`,`location_full`,`country`,`lat`,`lon`) VALUES('".$ecnpre."-".$ecn."','".mysqli_real_escape_string($connect,$token)."','".mysqli_real_escape_string($connect,$email)."','".mysqli_real_escape_string($connect,$password)."','".mysqli_real_escape_string($connect,$first_name)."','".mysqli_real_escape_string($connect,$last_name)."','".mysqli_real_escape_string($connect,$gender)."','".$dob_month."','".$dob_day."','".$dob_year."','".mysqli_real_escape_string($connect,$location)."','".mysqli_real_escape_string($connect,$location_full)."','".mysqli_real_escape_string($connect,$country)."','".mysqli_real_escape_string($connect,$lat)."','".mysqli_real_escape_string($connect,$lon)."')");
$foldertoken = strtoupper(md5($ecnpre.'-'.$ecn).md5(time()).TokenGen(50));
$connect->query("INSERT INTO `folders` (`folder_name`,`folder_description`,`folder_token`,`owner_ecn`,`parent_folder`) VALUES('Documents','Saved Documents','$foldertoken','".mysqli_real_escape_string($connect,$ecnpre."-".$ecn)."','0')");
$foldertoken = strtoupper(md5($ecnpre.'-'.$ecn).md5(time()).TokenGen(50));
$connect->query("INSERT INTO `folders` (`folder_name`,`folder_description`,`folder_token`,`owner_ecn`,`parent_folder`) VALUES('Photos','Saved Photos','$foldertoken','".mysqli_real_escape_string($connect,$ecnpre."-".$ecn)."','0')");
$foldertoken = strtoupper(md5($ecnpre.'-'.$ecn).md5(time()).TokenGen(50));
$connect->query("INSERT INTO `folders` (`folder_name`,`folder_description`,`folder_token`,`owner_ecn`,`parent_folder`) VALUES('Videos','Saved Videos','$foldertoken','".mysqli_real_escape_string($connect,$ecnpre."-".$ecn)."','0')");
$foldertoken = strtoupper(md5($ecnpre.'-'.$ecn).md5(time()).TokenGen(50));
$connect->query("INSERT INTO `folders` (`folder_name`,`folder_description`,`folder_token`,`owner_ecn`,`parent_folder`) VALUES('Audio','Saved Audio','$foldertoken','".mysqli_real_escape_string($connect,$ecnpre."-".$ecn)."','0')");
$foldertoken = strtoupper(md5($ecnpre.'-'.$ecn).md5(time()).TokenGen(50));
$connect->query("INSERT INTO `folders` (`folder_name`,`folder_description`,`folder_token`,`owner_ecn`,`parent_folder`) VALUES('Archives','Saved Archives','$foldertoken','".mysqli_real_escape_string($connect,$ecnpre."-".$ecn)."','0')");
$foldertoken = strtoupper(md5($ecnpre.'-'.$ecn).md5(time()).TokenGen(50));
$connect->query("INSERT INTO `folders` (`folder_name`,`folder_description`,`folder_token`,`owner_ecn`,`parent_folder`) VALUES('Websites','Saved Websites','$foldertoken','".mysqli_real_escape_string($connect,$ecnpre."-".$ecn)."','0')");
$foldertoken = strtoupper(md5($ecnpre.'-'.$ecn).md5(time()).TokenGen(50));
$connect->query("INSERT INTO `folders` (`folder_name`,`folder_description`,`folder_token`,`owner_ecn`,`parent_folder`) VALUES('Files','Saved Files','$foldertoken','".mysqli_real_escape_string($connect,$ecnpre."-".$ecn)."','0')");
$cookie_name = "ecn";
$cookie_value = "$ecnpre-$ecn";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
$cookie_name = "token";
$cookie_value = "$token";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
$cookie_name = "location";
$cookie_value = "$location";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
$cookie_name = "full_name";
$cookie_value = "$fullname";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
$cookie_name = "firstname";
$cookie_value = "$first_name";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    if($dob_month==1){$birthday='January '.$dob_day;}
    if($dob_month==2){$birthday='February '.$dob_day;}
    if($dob_month==3){$birthday='March '.$dob_day;}
    if($dob_month==4){$birthday='April '.$dob_day;}
    if($dob_month==5){$birthday='May '.$dob_day;}
    if($dob_month==6){$birthday='June '.$dob_day;}
    if($dob_month==7){$birthday='July '.$dob_day;}
    if($dob_month==8){$birthday='August '.$dob_day;}
    if($dob_month==9){$birthday='September '.$dob_day;}
    if($dob_month==10){$birthday='October '.$dob_day;}
    if($dob_month==11){$birthday='November '.$dob_day;}
    if($dob_month==12){$birthday='December '.$dob_day;}
    $cookie_name = "dob_month";
    $cookie_value = "$dob_month";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    $cookie_name = "dob_day";
    $cookie_value = "$dob_day";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    $cookie_name = "dob_year";
    $cookie_value = "$dob_year";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    $cookie_name = "gender";
    $cookie_value = "$gender";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    $cookie_name = "birthday";
    $cookie_value = "$birthday";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    mkdir("../user/".$ecnpre."-".$ecn);
$_SESSION["first_login"]="true";
header("Location:../home.php");
?>