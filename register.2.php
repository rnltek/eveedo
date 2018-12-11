<?php
session_start();
$email = $_POST['e'];
$password = md5($_POST['p']);
$fn = $_POST['fn'];
$ln = $_POST['ln'];
$gender = $_POST['gender'];
$dob_month = $_POST['dob_month'];
$dob_day = $_POST['dob_day'];
$dob_year = $_POST['dob_year'];

?>