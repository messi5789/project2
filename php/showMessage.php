<?php
	session_start(); 
	include('connect.php');
	if(isset($_SESSION['username']) ){
		if(isset($_SESSION['guest']) ){
	$username=$_SESSION['username'];
	$user=$_SESSION['guest']; 
 $query="select * from privatechat where (sentFrom='$username' AND sentTo='$user') OR (sentFrom= '$user' AND sentTo= '$username')";
 $result=mysqli_query($conn,$query);
 
 
 
 while($row=mysqli_fetch_assoc($result)){
	 
	 echo "<div class=\"users\">".$row["sentFrom"].":"." ".stripslashes($row['text'])." </div>";
	  
	 
	 
 }
 }
	else
 	{
	$query="select * from messenger"; 
	$result=mysqli_query($conn,$query);
	while($row=mysqli_fetch_assoc($result)){
			if($_SESSION['username']==$row['author']){
    echo "<div class=\"you\"><span>Bạn</span>".":"." ".stripslashes($row['content'])."</div><br>";
	}
			
	else{
				
	echo "<div class=\"users\"><span>".$row['author']."</span>:"." ".stripslashes($row['content'])."</div><br>";		
				
	}
	
	}	
}
	
}


?>