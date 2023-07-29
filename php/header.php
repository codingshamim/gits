<?php
error_reporting(0);
include "conn.php";
session_start();

$userId = $_SESSION['auth'];


$usersSql = "select * from user where id = '$userId'";
$usersQuery = mysqli_query($conn, $usersSql);
$users = mysqli_fetch_assoc($usersQuery);

$postsSql = "select * from posts";
$postQuery  = mysqli_query($conn, $postsSql);


// if  selected top menu 
$selTop  = "select * from category";
$seltopQuery  = mysqli_query($conn, $selTop);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cleaning Desert </title>

    <link rel="icon" type="image/x-icon" href="imgs/theme/favicon.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
    <!-- preloader start  -->
    <div class="preloader">
        <div class="load">

        </div>
        <div class="load load2">

        </div>
        <div class="load">

        </div>
    </div>
    <!-- preloader end  -->
    <!-- header section start -->
    <header id="homeSections">
        <div class="container">
            <!-- nav section start  -->
            <nav>
                <div class="row justifyBetween itemsCenter">
                    <div class="menus_logo row justifyCenter itemsCenter">
                        <div class="logo">
                            <a href=""> <img src="imgs/theme/logo2.png" alt=""></a>
                        </div>

                        <ul class="row justifyCenter itemsCenter menuBar">
                            <button class="closeBtn">
                                <ion-icon name="close-outline"></ion-icon>
                            </button>
                            <li><a href="index.php">Home</a></li>

                            <li><a href="blog.php">Blog</a></li>
                            <?php
                            while ($fetchCate =  mysqli_fetch_assoc($seltopQuery)) {
                                if($fetchCate['status']==1){

                             

                            ?>
                                <li><a href="all.php?all=<?php echo $fetchCate['id'] ?>"><?php echo $fetchCate['cateName'] ?></a></li>
                            <?php
                               }
                            }
                            ?>
                            <li><a href="contact.php">Contact</a></li>

                        </ul>


                    </div>
                    <div class="menuContainer">
                        <ion-icon name="menu-outline"></ion-icon>
                    </div>
                    <div class="btnContainer">
                        <?php
                        if (isset($userId)) {

                        ?>
                            <button type="button" class="btn"><?php echo $users['name'] ?></button>
                        <?php
                        } else {



                        ?>
                            <button id="signUp" class="btn">Sign Up</button>

                        <?php

                        }
                        ?>
                    </div>
                </div>
            </nav>
            <!-- nav section end -->

        </div>
    </header>
    <!-- header section end -->


    <script>
        let signUp = document.querySelector("#signUp");

        signUp.onclick = () => {
            window.location.href = "signup.php";
        }
    </script>