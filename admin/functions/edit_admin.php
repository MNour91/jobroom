<?php

require "connect.php";

if(!isset($_POST['submit'])){
   header("location:../admins.php");
   exit();
}
$id = $_POST['id'];
$name = $_POST['name'];
$password = $_POST['password'];
$password_hash = password_hash($password,PASSWORD_DEFAULT);

$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$check = $connect -> query( "select * from admins where email ='$email'");
$counter = $check -> num_rows;
if($counter == 0 ){

 $connect -> query("UPDATE admins SET name='$name',email='$email',phone='$phone',password='$password_hash' , address='$address' WHERE id = '$id' ");

 header("location:../admins.php");
}else{
    header("location:../admins.php?do=edit&id=$id&error=this Email found before"); 
}