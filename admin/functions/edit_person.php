<?php

require "connect.php";

$id = $_POST['id'];
$name = $_POST['name'];
$username = $_POST['username'];
$phone = $_POST['phone'];
$age = $_POST['age'];
$email = $_POST['email'];
$password = $_POST['password'];
$degree = $_POST['degree'];
$university = $_POST['university'];
$department = $_POST['department'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$disciplien = $_POST['disciplien'];
$skills = $_POST['skills'];
$language = $_POST['language'];
$website = $_POST['website'];
$about = $_POST['about'];
$skill = implode("#",$skills);
$languages = implode("#",$language);

$preson = $_FILES['preson']['name'];
if(empty($preson)){
    $dir_preson ='';
}else{
    $extentions = array("jpg","png","gif","jpeg","jfif");
    if($_FILES['preson']['error']==0 and $_FILES['preson']['size']<50000000){
        $ext = pathinfo($preson ,PATHINFO_EXTENSION);
        if(in_array($ext,$extentions)){
            $newpreson = md5(uniqid()).'.'.$ext;
        
            move_uploaded_file($_FILES['preson']['tmp_name'],'../images/'.$newpreson);
        }else{
            echo 'This extention File is wrong';
        }
    }else{
        echo ' error in uploud or size ';
    }
    
    $dir_preson ='admin/images/'.$newpreson;
    

}
$back = $_FILES['back']['name'];
if(empty($back)){
    $dir_back ='';
}else{
    $extentions = array("jpg","png","gif","jpeg","jfif");
    if($_FILES['back']['error']==0 and $_FILES['back']['size']<50000000){
        $ext = pathinfo($back ,PATHINFO_EXTENSION);
        if(in_array($ext,$extentions)){
            $newback = md5(uniqid()).'.'.$ext;
        
            move_uploaded_file($_FILES['back']['tmp_name'],'../images/'.$newback);
        }else{
            echo 'This extention File is wrong';
        }
    }else{
        echo ' error in uploud or size ';
    }
    
    $dir_back ='admin/images/'.$newback;
    

}

$update = $connect ->query("UPDATE users SET name='$name',username='$username',phone='$phone',email='$email',age='$age',gender='$gender',university='$university',department='$department',language='$languages',address='$address',skills='$skill',discipliens='$disciplien',back_img='$dir_back',preson_img='$dir_preson',degree='$degree',website='$website',about='$about' WHERE id = '$id'");

if($update){
    header("location:../../settings.php?done = done");
}
