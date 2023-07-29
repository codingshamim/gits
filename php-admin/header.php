<?php
error_reporting(0);
include "../php/conn.php";
session_start();
$userId = $_SESSION['auth'];

if(!isset($userId)){
  header("location:../login.php");
}
$usersSql = "select * from user where id = '$userId'";
$usersQuery = mysqli_query($conn, $usersSql);
$users = mysqli_fetch_assoc($usersQuery);
if($users['type']==0){
  header("location:../index.php");
}
?>



<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cleaning Desert</title>
  <link rel="shortcut icon" type="image/png" href="../imgs/theme/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body >
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.php" class="text-nowrap logo-img">
            <img src="../imgs/theme/logo2.png" width="100" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
          
            <li class="nav-small-cap cursor-pointer">
                <a href="index.php">
             <img  style="width: 20px;" src="icons/dashboard.png" alt="">
              <span style="color:black"  class="mx-2 hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap cursor-pointer">
                <a href="category.php">
             <img src="icons/category.png" alt="">
              <span style="color:black"  class="mx-2 hide-menu">Category</span>
              </a>
            </li>
            <li class="nav-small-cap cursor-pointer drobMain">
          
             <img style="width: 20px;" src="icons/more.png" alt="">
              <span style="color:black"  class="mx-3 hide-menu">Post</span>
            
            <ul class="ms-4 mt-2 drob">
              <li><a href="post.php">Add New Post</a> </li>
              <li class="mt-2"><a href="all-post.php">All Post</a> </li>
            </ul>
            </li>
            <li class="nav-small-cap cursor-pointer">
                <a href="users-list.php">
             <img style="width: 20px;" src="icons/user.png" alt="">
              <span style="color:black"  class="mx-2 hide-menu">Users</span>
              </a>
            </li>
            <li class="nav-small-cap cursor-pointer">
                <a href="subscriber.php">
             <img style="width: 20px;" src="icons/user.png" alt="">
              <span style="color:black"  class="mx-2 hide-menu">Subscribers</span>
              </a>
            </li>
          </ul>
         
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
           
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
           
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up customCard" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3"><?php echo $users['name'] ?></p>
                    </a>
                  
                   
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->

      <style>
         .left-sidebar, .app-header{
          background: #e0e0e0;
         } 

         body{
          background: #e0e0e0;
         }
      </style>

      
  <style>
  body {
    overflow-x: hidden;
  }

  .customCard {
    margin-left: 10px;
    border-radius: 5px;
    background: #e0e0e0;
    box-shadow: 5px 5px 10px #bebebe,
      -5px -5px 10px #ffffff;
  }

  .tableCard {
    overflow-y: auto;
    height: 400px;
  }

  input , textarea, select{
    border-radius: 50px;
    border: none;
    outline: none;
    box-shadow: inset 3px 3px 3px #bebebe,
      inset -3px -3px 3px #ffffff!important;
  }
  input:focus, textarea:focus, select:focus{
    border: none;
    outline: none;
    box-shadow: inset 3px 3px 3px #bebebe,
      inset -3px -3px 3px #ffffff!important;
  }
  .cke_top  {
    box-shadow: inset 3px 3px 3px #bebebe,
      inset -3px -3px 3px #ffffff!important;
    border: none;
    border-radius: 0;
    background: #e0e0e0!important;
  }

  .rks-img-bodys{
    width: 100%;
  }

  .cke_1_contents{
    border-radius: 0px!important;
  }
  .drob{
    display: none;
    transition: all 0.5s;
  }

  .drobMain:hover .drob{
    display: block;
  }

  
</style>
