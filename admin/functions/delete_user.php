<?php
session_start();

require "connect.php";


$id = $_POST['id'];
$password = $_POST['password'];
$result_user = $connect -> query("SELECT * FROM users WHERE id = '$id'");

$row_user = $result_user -> fetch_assoc();

$password_mysql = $row_user['password'];

if(password_verify($password,$password_mysql)){
    
    $connect -> query("DELETE FROM users WHERE id = '$id'");
    unset($_SESSION['user']);
    unset($_SESSION['type']);
    header("location:../../sign-in.php");


}else{
    header("location:../../settings.php");
}