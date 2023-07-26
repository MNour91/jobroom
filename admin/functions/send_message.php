<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){

    require_once 'connect.php';

    $id_user = $_POST['id_user'];
    $message = $_POST['message'];
    $to_user = $_POST['to_user'];
    $con = $connect->query("INSERT INTO message (from_user,to_user,message) VALUES ('$id_user','$to_user','$message')");
     
    
}