<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){

    require_once 'connect.php';

    $id_user = $_POST['id_user'];

    $id_me = $_POST['id_me'];

    $select =$connect ->query("SELECT * FROM users WHERE id = '$id_me' ");
    $row =  $select->fetch_assoc();
    $follow = explode("#",$row['follow']);
    if(in_array($id_user,$follow)){

    }else{
        array_push($follow,$id_user);
        $follows = implode("#",$follow);
        $connect ->query("UPDATE users SET follow = '$follows'  WHERE id = '$id_me' ");
        $select_me =$connect ->query("SELECT * FROM users WHERE id = '$id_user' ");
        $row_me =  $select_me->fetch_assoc();
        $followers = explode("#",$row_me['followers']);
        array_push($followers,$id_me);
        $followerss = implode("#",$followers);
        $connect ->query("UPDATE users SET followers = '$followerss'  WHERE id = '$id_user' ");

    
    }
}