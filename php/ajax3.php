<?php
session_start(); 
include('connect.php');
if(isset($_POST['text'])){ 
$user=$_SESSION['user'];
$username=$_SESSION['username']; 
	$text=addslashes($_POST['text']);
	$query="insert into privatechat (sentFrom,text,sentTo) values('$username','$text','$user')";
	$result=mysqli_query($conn,$query);
 
 
}
 











?>