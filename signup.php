<?php 
error_reporting(0);
include "php/regsitration.php" ?>


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
        <div class="row justifyBetween itemsCenter resCol mobileRes mobileTwoRes" >
            <form class="wrapper1 row justifyCenter itemsCenter flexCol" id="myForm" method="post">   
                <div class="logo">
                    <img src="imgs/theme/logo2.png" alt="">
                </div>
                <div class="signUpTitle">
                    <h1>Welcome back</h1>
                    <p>Don’t have an account? <a href="login.php">Sign In</a> </p>
                </div>
                <?php
                if($err){

           
                ?>
                <p class="err"><?php echo $errMsg ?></p>

                <?php 
                
            }
                ?>
                <div class="formControl">
                    <input type="text" placeholder="Name" id="name" required name="name">
                </div>
                <div class="formControl">
                    <input type="email" placeholder="Email" required name="email">
                </div>
                <div class="formControl">
                    <input type="number" placeholder="Phone" required  name="number">
                </div>
                <div class="formControl">
                    <input type="password" placeholder="Password" required name="pass">
                </div>
                <div class="formControl">
                    <input type="password" placeholder="Confirm Password" required name="cPass">
                </div>
                <div class="formControl">
                   <button name="signUP" class="btn" type="submit">Sign Up</button>
                </div>
            </form>
            <div class="wrapper2"></div>
        </div>
      
    </div>
   

    <script src="js/registration.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</body>
</html>