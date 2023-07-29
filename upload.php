<?php 
include "php/conn.php";
$email = mysqli_real_escape_string($conn,$_POST['email']);
$insert = "INSERT INTO `subs` (`email`) VALUES ( '$email')";
mysqli_query($conn,$insert);
?>