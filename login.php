<?php
error_reporting(0);
include "php/conn.php";
session_start();
$userId = $_SESSION['auth'];
if(isset($userId)){
    header("location:index.php");
}

if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = mysqli_real_escape_string($conn,md5($_POST['pass']));
  


    $selelctuser = "select * from user where email = '$email' AND pass = '$pass'";
    $selectuserQuery = mysqli_query($conn,$selelctuser);
    $users = mysqli_fetch_assoc($selectuserQuery);
    if(mysqli_num_rows($selectuserQuery)>0){
        if($users['type']==1){
            header("location:shajjad");
        }else{
            header("location:index.php");
        }
      
     
       $_SESSION['auth']= $users['id'];
    }else{
       $err = true;
       $errMsg = "User Email And Password Are Not Matching!";
    }


}
//  login system  


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up || Cleaning  Desert</title>
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body>

    <div class="container">
        <div class="row justifyBetween itemsCenter resCol mobileRes mobileTwoRes">
            <form action="login.php" method="post" class="wrapper1 row justifyCenter itemsCenter flexCol">   
                <div class="logo">
                    <img src="imgs/theme/logo2.png" alt="">
                </div>
                <div class="signUpTitle">
                    <h1>Welcome back</h1>
                    <p>Don’t have an account? <a href="signup.php">Sign Up</a> </p>
                </div>
    
                <div class="formControl">
                    <input type="text" placeholder="Email" name="email">
                </div>
    
                <div class="formControl">
                    <input type="text" placeholder="Password" name="pass">
                </div>
              
                <div class="formControl">
                   <button class="btn" name="login">Login</button>
                </div>
            </form>
            <div class="wrapper2"></div>
        </div>
      
    </div>
    
</body>
</html>