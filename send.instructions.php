<?php
include("inc.config.php");
$e = $_POST['e'];
$query = "SELECT * FROM `users` WHERE `email`='$e'";
$result = $connect->query($query);
$test = mysqli_num_rows($result);
if($test==0){
    header("Location:no.account.found.php");
}
if($test==1){
    $user = mysqli_fetch_array($result);
    $token = $user['token'];
    // the message
    $msg = "You have requested your password be reset\nuse the link below to change your password.\nhttps://my.eveedo.com/reset.password.php?t=$token";

    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg,70);

    // send email
    mail("$e","Eveedo Password Reset",$msg,null,'-f noreply@eveedo.com');
    header("Location:instructions.sent.php");
}
?>