<?php
require "connect.php";

$id = $_GET['id'];
$connect -> query("DELETE FROM admins WHERE id = '$id'");
header('location:../admins.php');


