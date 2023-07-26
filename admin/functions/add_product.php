<?php
require "connect.php";

$id = $_POST['id'];
$title = $_POST['title'];
$type = $_POST['type'];
$link = $_POST['link'];
$discipliens = $_POST['discipliens'];
$description = $_POST['description'];
$Price = $_POST['price'];
$img = $_FILES['img']['name'];
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
    $insert = $connect -> query("INSERT INTO product(id_user, type_product, title, discipliens, link, img, descr, price) VALUES ('$id','$type','$title','$discipliens','$link','$dir_img ','$description','$Price')");
    if($insert){
        header("location:../../index.php");
    }

