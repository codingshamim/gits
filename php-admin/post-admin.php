<?php
session_start();
include "../php/conn.php";
$err = false;
$succ = false;

$userid = $_SESSION['auth'];
if (isset($_POST['addPost'])) {
    $postTitle = mysqli_real_escape_string($conn, $_POST['postTitle']);
    $cateGory = mysqli_real_escape_string($conn, $_POST['cateGory']);
    $postDesc = mysqli_real_escape_string($conn, $_POST['postDesc']);
    $otherDes = mysqli_real_escape_string($conn, $_POST['otherDes']);


    $postThumbName = $_FILES['postThumb']['name'];
    $postThumbTmp = $_FILES['postThumb']['tmp_name'];
    $folder = "../shajjad/cleaning/posts/";
    
    $ext = pathinfo($postThumbName, PATHINFO_EXTENSION);
    if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
     
       $uploadThumb =  move_uploaded_file($postThumbTmp, $folder . $postThumbName);
    }else{
        $err = true;
        $errMsg = "Only Jpg Jpeg Png File Supported";
    }

    if($uploadThumb){
        $postSql = "INSERT INTO `posts` ( `title`, `cate`, `Descs`, `thumb`, `user`, `desOther`) VALUES ( '$postTitle', '$cateGory', '$postDesc', '$postThumbName', '$userid', '$otherDes')";
        $postQuery  = mysqli_query($conn,$postSql);

        if($postQuery){
            $succ = true;
            $succMsg = "Post Added Successfully";
        }
    }
   
}
