<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){

    require_once 'connect.php';

    $id_user = $_POST['id_user'];
    $comment = $_POST['comment'];

    if(isset($_POST['id_post'])){
        $id_post = $_POST['id_post'];
        $con = $connect->query("INSERT INTO comments (id_user,id_post,comment) VALUES ('$id_user','$id_post','$comment')");
        if($con){
            $select = $connect->query("SELECT * FROM comments WHERE id_post = $id_post");
            echo $select->num_rows; 
           }
    }else{
        $book_id = $_POST['id_book'];
        $con = $connect->query("INSERT INTO comments (id_user,comment,book_id) VALUES ('$id_user','$comment','$book_id')");
        if($con){
            $select = $connect->query("SELECT * FROM comments WHERE book_id = $book_id");
            echo $select->num_rows; 
        }
    }


   

    
}