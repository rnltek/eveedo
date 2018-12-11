<?php
session_start();
include ("../inc.config.php");
$ecn = $_COOKIE['ecn'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$dob_month = $_POST['dob_month'];
$dob_day = $_POST['dob_day'];
$dob_year = $_POST['dob_year'];
$full_name = $first_name.' '.$last_name;
$email = $_POST['email'];
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
$connect->query("UPDATE `users` SET `email`='$email',`first_name`='$first_name', `last_name`='$last_name', `gender`='$gender', `dob_month`='$dob_month', `dob_day`='$dob_day', `dob_year`='$dob_year' WHERE `ecn`='$ecn'");
$cookie_name = "first_name";
$cookie_value = "$first_name";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
$cookie_name = "last_name";
$cookie_value = "$last_name";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
$cookie_name = "full_name";
$cookie_value = "$full_name";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
$cookie_name = "gender";
$cookie_value = "$gender";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
$cookie_name = "dob_month";
$cookie_value = "$dob_month";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
$cookie_name = "dob_day";
$cookie_value = "$dob_day";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
$cookie_name = "dob_year";
$cookie_value = "$dob_year";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
$cookie_name = "birthday";
$cookie_value = "$birthday";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
$_SESSION['details_saved'] = "true";
header("Location:../extended.php");
?>