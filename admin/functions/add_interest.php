<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){

    require_once 'connect.php';

    $id_user = $_POST['id_user'];

    $id_post = $_POST['id_post'];

    $con = $connect->query("INSERT INTO intersted_blog (id_blog,user_id) VALUES ('$id_post','$id_user')");

    
}