<?php
require "connect.php";

$id = $_POST['id'];
$password = $_POST['password'];
$c_password = $_POST['c_password'];
if($password == $c_password){
    $password_hash = password_hash($password,PASSWORD_DEFAULT);
    $update = $connect ->query("UPDATE users SET password = '$password_hash' WHERE id = '$id'");

    if($update){
        header("location:../../settings.php?done = done");
    }

}else{
    
        header("location:../../settings.php?done = error");
  
}