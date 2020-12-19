<?php
session_start();
include_once('config.php');
function con()
{
  include('config.php');
  $link = mysqli_connect($CONFIG['db_host'], $CONFIG['db_user'], $CONFIG['db_password'], $CONFIG['db_name']);
  if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
  }
  mysqli_set_charset($link, "utf8");
  return $link;
}

function conn()
{
  include('config.php');
  $servername = $CONFIG['db_host'];
  $username = $CONFIG['db_user'];
  $password = $CONFIG['db_password'];
  $dbname = $CONFIG['db_name'];
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die($conn->connect_error);
  } else {
    mysqli_set_charset($conn, 'utf8');
    return $conn;
  }
}

function confetch($sql)
{
  $con = con();
  $res = mysqli_query($con, $sql);
  $result = array();
  $i = 0;
  while ($row = mysqli_fetch_assoc($res)) {
    $result[$i] = $row;
    $i = $i + 1;
  }
  mysqli_fetch_assoc($result);
  return $result;
}

function conmultifetch($sql)
{
  $result = array();
  $con = con();
  $i = 0;
  $res = mysqli_multi_query($con, $sql);
  do {
    // Store first result set
    if ($date = mysqli_store_result($con)) {
      while ($row = mysqli_fetch_row($date)) {
        // printf("%s\n", $row);
        $result[$i] = $row;
        $i = $i + 1;
      }
      mysqli_free_result($date);
    }
    // if there are more result-sets, the print a divider
    if (mysqli_more_results($con)) {
      // printf("-------------\n");
    }
     //Prepare next result set
  } while (mysqli_next_result($con));
  return $result;
}

function alreadyLogin()
{
  return isset($_SESSION['login_status']);
}
function pre($arr){
  echo "<pre>";
  print_r($arr);
  echo "</pre>";
}
function alert($string){
  echo '<script>alert("'.$string.'")</script>';
}
function generateRandomString($length) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}