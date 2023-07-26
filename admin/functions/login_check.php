<?php
session_start();
require "connect.php";

if(!isset($_POST['submit'])){
   header("location:../login.php");
   exit();
}
$email = $_POST['email'];
$password = $_POST['password'];

$result_admin = $connect -> query("SELECT * FROM admins WHERE email = '$email'");

$row_admin = $result_admin -> fetch_assoc();

$id = $row_admin['id'];

$count = $result_admin -> num_rows;

$password_mysql = $row_admin['password'];

if(password_verify($password,$password_mysql)){

    if($count > 0){
        $_SESSION['login'] = $id;

  
            header("location:../index.php");
    
        
    }
    

}else{
    header("location:../login.php?error='email or password was Wrong'"); 
}