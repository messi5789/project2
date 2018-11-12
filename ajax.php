<?php 
session_start();  
include('php/connect.php');
if(isset($_POST['name'])){
	$_SESSION['username']=$_POST['name'];
	$name=addslashes($_POST['name']);
	$email=addslashes($_POST['email']);
	$query="insert into users (name,email) values('$name','$email')";
	$result=mysqli_query($conn,$query); 
	
	 
} 
 
 ?>