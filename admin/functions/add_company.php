<?php
session_start();
require "connect.php";

// if(!isset($_POST['submit'])){
//    header("location:../../sinp.php");
//    exit();
// }
$type_user = $_POST['type_user'];
$name = $_POST['name'];
$username = $_POST['username'];
$phone = $_POST['phone'];
$website = $_POST['website'];
$email = $_POST['email'];
$password = $_POST['password'];
$disciplien = $_POST['disciplien'];
$about = $_POST['about'];

$address = $_POST['address'];

$password_hash = password_hash($password,PASSWORD_DEFAULT);

$insert = $connect -> query("INSERT INTO users (type_user, name, username, phone, email, password, address,discipliens, website, about) VALUES ('$type_user','$name','$username','$phone','$email','$password_hash','$address','$disciplien','$website','$about')");
if($insert){
    $id = $connect->insert_id;
    $_SESSION['user'] = $id;
    $_SESSION['type'] = $type_user;
    header("location:../../index.php");

}
