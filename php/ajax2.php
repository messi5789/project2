<?php
session_start();
include('connect.php');

if(isset($_SESSION['guest'])){
if(isset($_POST['text'])){ 
$user=$_SESSION['guest'];
$username=$_SESSION['username']; 
	$text=addslashes($_POST['text']);
	$query="insert into privatechat (sentFrom,text,sentTo) values('$username','$text','$user')";
	$result=mysqli_query($conn,$query);
 
 
}
} 
else 
{
if(isset($_POST['text'])){ 
	 $text=addslashes($_POST['text']);
	 $user=$_SESSION['username']; 
	$query="insert into messenger (author,content) values('$user','$text')";
	$result=mysqli_query($conn,$query);  
	 
	 
	 }
	 
}









?>