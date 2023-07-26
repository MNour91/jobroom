<?php

require "connect.php";

if(!isset($_POST['submit'])){
   header("location:../admins.php");
   exit();
}

$name = $_POST['name'];
$password = $_POST['password'];
$password_hash = password_hash($password,PASSWORD_DEFAULT);

$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];


$insert_admin = "INSERT INTO admins(name,email,phone,password,address)VALUES('$name','$email','$phone','$password_hash',$address)";


$connect -> query($insert_admin);
header("location:../admins.php");






