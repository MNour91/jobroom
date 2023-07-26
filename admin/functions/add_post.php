<?php
require "connect.php";

$id_user = $_POST['id_user'];
$title = $_POST['title'];
$type_post = $_POST['type_post'];
$subject = $_POST['subject'];

$select_user = $connect->query("SELECT * FROM users WHERE id = '$id_user'");
$row_user = $select_user ->fetch_assoc();

$department	=$row_user['discipliens'];


$img = $_FILES['img']['name'];
if(empty($img)){
    $insert = $connect -> query("INSERT INTO post(id_user, title, subject, type_post, department) VALUES ('$id_user','$title','$subject','$type_post','$department')");
    if($insert){
    header("location:../../index.php");
    }
}else{
    $extentions = array("jpg","png","gif","jpeg","jfif");
    if($_FILES['img']['error']==0 and $_FILES['img']['size']<50000000){
        $ext = pathinfo($img ,PATHINFO_EXTENSION);
        if(in_array($ext,$extentions)){
            $newImg = md5(uniqid()).'.'.$ext;
        
            move_uploaded_file($_FILES['img']['tmp_name'],'../images/'.$newImg);
        }else{
            echo 'This extention File is wrong';
        }
    }else{
        echo ' error in uploud or size ';
    }
    
    $dir_img ='admin/images/'.$newImg;
    
    $insert = $connect -> query("INSERT INTO post(id_user, title, subject, img, type_post, department) VALUES('$id_user','$title','$subject','$dir_img','$type_post','$department')");
    if($insert){
    header("location:../../index.php");
    }
}
