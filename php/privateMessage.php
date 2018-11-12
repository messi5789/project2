<?php
session_start();
include('connect.php'); 
if(isset($_SESSION['username']) ){
	$username=$_SESSION['username'];
	$user=$_SESSION['user']; 
 $query="select * from privatechat where sentFrom='$username' AND sentTo= '$user'";
 $result=mysqli_query($conn,$query);
 
 
 
 while($row=mysqli_fetch_assoc($result)){
	 
	 echo $row["sentFrom"].":"." ".stripslashes($row['text'])."</br>";
	  
	 
	 
 }
	
 }	
	
	  









?>