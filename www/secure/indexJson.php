<?php
session_start();
if (!isset($_SESSION['login_status']) || $_SESSION['login_status'] == 0) {
	header('location: login.php');
} 
include('function.php');
?>
<?
$sql = "SELECT * FROM user WHERE username = '".$_SESSION['username']."';";
$result = confetch($sql);
$_SESSION['uid'] = $result[0]['id'];
$_SESSION['role'] = $result[0]['role'];
$myJSON = json_encode($_SESSION);

echo $myJSON;
?>