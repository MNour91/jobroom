<?php
session_start();
require "connect.php";

$email = $_POST['email'];
$password = $_POST['password'];

$result_user = $connect -> query("SELECT * FROM users WHERE email = '$email'");

$row_user = $result_user -> fetch_assoc();

$id = $row_user['id'];
$type = $row_user['type_user'];
$count = $result_user -> num_rows;

$password_mysql = $row_user['password'];

if(password_verify($password,$password_mysql)){

    if($count > 0){
        
        $_SESSION['user'] = $id;
        $_SESSION['type'] = $type;
        header("location:../../index.php");

        
    }
    

}else{
    header("location:../../sign-in.php?error='email or password was Wrong'"); 
}