<?php
// insert category 
include "../php/conn.php";
$succ = false;
if(isset($_POST['cateSub'])){
    $catename = mysqli_real_escape_string($conn,$_POST['cateName']);
    $cateShow = mysqli_real_escape_string($conn,$_POST['cateShow']);


    // insert the category sql and query 
    $cateSql = "INSERT INTO `category` ( `cateName`, `status`) VALUES ('$catename', '$cateShow')";
    $cateQuery = mysqli_query($conn,$cateSql);
    if($cateQuery){
        $succ = true;
        $succMsg = "category created successfully";
    }
}


?>