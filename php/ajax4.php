<?php
session_start(); 
$user=$_SESSION['username'];
include('connect.php');
$query="delete from users where name='$user'"
$result=mysqli_query($conn,$query);

unset($_SESSION['user']);  
unset($_SESSION['users']);
unset($_SESSION['show_hide']);    


?>