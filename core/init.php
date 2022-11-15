<?php
$severname = "localhost";
$username = "root";
$password = "11paradise";
$databasename = "digital veritas shop";

//Create connection
$conn = new mysqli($severname, $username, $password, $databasename);
if($conn->connect_error){
  die('Connection failed'.$conn->connect_error);
}
//echo "connected successfully.";
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
require_once BASEURL.'/helpers/helpers.php';
require_once BASEURL.'/vendor/autoload.php';

$cart_id = '';
if(isset($_COOKIE[CART_COOKIE])){
  $cart_id = sanitize($_COOKIE[CART_COOKIE]);
}

?>
