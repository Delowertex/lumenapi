<?php
use Firebase\JWT\JWT;
include 'vendor/autoload.php';


$key = "123456";
$payload = array(
    "name" => "Delower",
    "city" => "comilla",
    "phone" => "01728984157",
    "location" => "Dhaka 1207"
);

$jwt = JWT::encode($payload, $key);
echo $jwt;
?>