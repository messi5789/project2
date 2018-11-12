<?php
session_start();   
include('connect.php');
 $query="select * from users";
 $result=mysqli_query($conn,$query);
 while($row=mysqli_fetch_assoc($result)){
	echo" <div class=\"users\">".$row['name']."</div> ";
	echo"<div class=\"private\">";
	echo"<input type=\"button\" value=\"private chat\"  id=\"".$row['name']."\" onclick=\"privateChat(this)\">";
	echo"</div>"; 
	
	
	  
 }
	 
 
   


?>