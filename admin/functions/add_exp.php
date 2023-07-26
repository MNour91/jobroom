<?php

require "connect.php";


$id = $_POST['id'];
$company = $_POST['company'];
$from = $_POST['from'];
$to = $_POST['to'];
$job = $_POST['job'];

$insert = $connect -> query("INSERT INTO experience( id_user, company, from_date, to_date, job) VALUES ('$id','$company','$from','$to','$job')");
if($insert){
    header("location:../../settings.php?done = done");
}