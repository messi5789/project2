<?php
session_start();
include('connect.php');
if(isset($_POST['user'])){
	$u=$_POST['user'];
	$o=$_SESSION['username'];
	 
	
	$query="delete from privatechat where sentFrom='$u' And sentTo='$o'";
	$result=mysqli_query($conn,$query);
	
	
	
	
	
	
}







?>