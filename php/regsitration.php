<?php
$err = false;
include "php/conn.php";
if(isset($_POST['signUP'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $number = mysqli_real_escape_string($conn,$_POST['number']);
    $pass = mysqli_real_escape_string($conn,md5($_POST['pass']));
    $cPass = mysqli_real_escape_string($conn,md5($_POST['cPass']));

    // if user already exits 
    $userSql= "select * from user where email = '$email'";
    $userQuery  = mysqli_query($conn,$userSql);

    if(mysqli_num_rows($userQuery)>0){
        $err = true;
        $errMsg = "This User Already Exist";

    }else if($pass !== $cPass){
        $err = true;
        $errMsg = "Password Are Not Matching";
    }
    
    else {
        $userISql = "INSERT INTO `user` (`name`, `email`, `phone`, `pass`, `cPass`) VALUES ( '$name', '$email', '$number', '$pass', '$cPass')";

        if(mysqli_query($conn,$userISql)){
           header("location:login.php");
        }
    }

}



?>