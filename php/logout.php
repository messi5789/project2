<?php
session_start(); 
include('connect.php');
$u=$_SESSION['username'];
 
$query="Delete from users where name='$u'";
$result=mysqli_query($conn,$query);
unset($_SESSION['username']);
unset($_SESSION['guest']);
unset($_SESSION['users']);
unset($_SESSION['soluong']);
unset($_SESSION['hide']);
header('location:../index.php'); 


 
  
 











?>