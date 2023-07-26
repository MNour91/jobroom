<?php

require "connect.php";


$id = $_POST['id'];
$card_num = $_POST['card_num'];
$date = $_POST['date'];
$s_code = $_POST['s_code'];
$post_code = $_POST['post_code'];

$insert = $connect -> query("INSERT INTO payment(id_user, card_num, to_date, s_code, post_code) VALUES ('$id','$card_num','$date','$s_code','$post_code')");
if($insert){
    header("location:../../settings.php?done = done");
}