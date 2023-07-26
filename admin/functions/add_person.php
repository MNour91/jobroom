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
$age = $_POST['age'];
$email = $_POST['email'];
$password = $_POST['password'];
$degree = $_POST['degree'];
$university = $_POST['university'];
$department = $_POST['department'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$password_hash = password_hash($password,PASSWORD_DEFAULT);
$result = $connect -> query("SELECT * FROM users WHERE email = '$email'");
$count = $result -> num_rows;
if($count == 0){
   $insert = $connect -> query("INSERT INTO users(type_user, name, username, phone, email, age, gender, password, university, department, address, degree) VALUES ('$type_user','$name','$username','$phone','$email','$age','$gender','$password_hash','$university','$department','$address','$degree')");
   if($insert){
      $id = $connect->insert_id;
      $_SESSION['user'] = $id;
      $_SESSION['type'] = $type_user;
      header("location:../../index.php");

   }
}