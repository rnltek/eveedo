<?php
session_start();
include("../inc.config.php");
$_SESSION['loginError'] = "false";
$e = $_POST['e'];
$p = md5($_POST['p']);
$query = "SELECT * FROM `users` WHERE `email`='$e' AND `password`='$p' OR `ecn`='$e' AND `password`='$p'";
$result = $connect->query($query);
$test = mysqli_num_rows($result);
if($test==0){
    //login incorrect
    $_SESSION['loginError'] = "true";
    header("Location:../login.php");
    exit();
}
if($test==1){
    //login correct
    $row = mysqli_fetch_array($result);
    if($row['dob_month']==1){$birthday='January '.$row['dob_day'];}
    if($row['dob_month']==2){$birthday='February '.$row['dob_day'];}
    if($row['dob_month']==3){$birthday='March '.$row['dob_day'];}
    if($row['dob_month']==4){$birthday='April '.$row['dob_day'];}
    if($row['dob_month']==5){$birthday='May '.$row['dob_day'];}
    if($row['dob_month']==6){$birthday='June '.$row['dob_day'];}
    if($row['dob_month']==7){$birthday='July '.$row['dob_day'];}
    if($row['dob_month']==8){$birthday='August '.$row['dob_day'];}
    if($row['dob_month']==9){$birthday='September '.$row['dob_day'];}
    if($row['dob_month']==10){$birthday='October '.$row['dob_day'];}
    if($row['dob_month']==11){$birthday='November '.$row['dob_day'];}
    if($row['dob_month']==12){$birthday='December '.$row['dob_day'];}
    $dob_month = $row['dob_month'];
    $dob_day = $row['dob_day'];
    $dob_year = $row['dob_year'];
    $cookie_name = "dob_month";
    $cookie_value = "$dob_month";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    $cookie_name = "dob_day";
    $cookie_value = "$dob_day";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    $cookie_name = "dob_year";
    $cookie_value = "$dob_year";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    $cookie_name = "ecn";
    $cookie_value = $row['ecn'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    $cookie_name = "token";
    $cookie_value = $row['token'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    $cookie_name = "first_name";
    $cookie_value = $row['first_name'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    $cookie_name = "last_name";
    $cookie_value = $row['last_name'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    $cookie_name = "full_name";
    $cookie_value = $row['first_name'].' '.$row['last_name'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    $cookie_name = "gender";
    $cookie_value = $row['gender'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    $cookie_name = "avatar";
    $cookie_value = $row['avatar'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    $cookie_name = "location";
    $cookie_value = $row['location'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    $cookie_name = "country";
    $cookie_value = $row['country'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    $cookie_name = "location_full";
    $cookie_value = $row['location_full'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    $cookie_name = "birthday";
    $cookie_value = "$birthday";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    $_SESSION['in'] = "true";
    $_SESSION['first_login']="false";
    $ref = $_POST['ref'];
    if($ref>'0'){
    header("Location:../$ref");
    }else{
    header("Location:../discover.php");
    }
    exit();
}
?>