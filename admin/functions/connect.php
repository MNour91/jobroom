<?php

$server_name = "localhost";
$user_name = "root";
$password = "";
$dbname = "jobroom";

$connect = new mysqli($server_name,$user_name,$password,$dbname);

if(!$connect){
  echo "Not Connected";
}

