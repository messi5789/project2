<?php
session_start();
include('connect.php');
$len=count($_SESSION['hide']); 
  
 
$user=$_SESSION['username'];
 
 $query="select sentFrom,text,sentTo,count(*) as sl   from privatechat where sentTo='$user'   GROUP BY sentFrom";
  
 $result=mysqli_query($conn,$query);
  
  


 if(mysqli_num_rows($result)>0){
 echo"Your Private message";	 
	while($row=mysqli_fetch_assoc($result)) {  
	$status=NULL;
	if($len>0){ 
	
	if($row['sl']==1){
		$_SESSION['soluong'][$row['sentFrom']]=1;
		
	}
	else if($row['sl']==(($_SESSION['soluong'][$row['sentFrom']])+1) ){
	$_SESSION['soluong'][$row['sentFrom']]=$row['sl'];
	 
	for($c=0;$c<$len;$c++){ 
	if($_SESSION['hide'][$c]==$row['sentFrom']){
	array_splice($_SESSION['hide'],$c,1);
	 
	 } 
	} 
	$len=count($_SESSION['hide']);
	}else{
		
	$_SESSION['soluong'][$row['sentFrom']]=$row['sl'];  	
		
	}
	 
 if($len>0){
	for($j=0;$j<$len;$j++){
	if($_SESSION['hide'][$j]!=$row['sentFrom']){
		$status=1;
		 
	}
	else{
		$status=0;
		break;
		}
	}
 }else{
		$status=1;

 } 
if($status==1){	
		echo"<div style=\"display:block\" class=\"private2\">";
		echo "<p>".$row['sentFrom']."</p><br>";
		echo"<input type=\"button\" value=\"private chat\"  id=\"i-".$row['sentFrom']."\" onclick=\"privateChat2(this)\">";
		echo"<input type=\"button\" value=\"X\"    onclick=\"DeleteChat('".$row['sentFrom']."')\">";
		echo"</div>"; 	
      		
		}
		else{ 
		echo"<div style=\"display:none\" class=\"private2\">";
		echo "<p>".$row['sentFrom']."</p><br>";
		echo"<input type=\"button\" value=\"private chat\"  id=\"i-".$row['sentFrom']."\" onclick=\"privateChat2(this)\">";
		echo"<input type=\"button\" value=\"X\"    onclick=\"DeleteChat('".$row['sentFrom']."')\">";
		echo"</div>"; 	
		   
	  }
	  	 
}  
	 
	else{
	 
		echo"<div style=\"display:block\" class=\"private2\">";
		echo "<p>".$row['sentFrom']."</p><br>";
		echo"<input type=\"button\" value=\"private chat\"  id=\"i-".$row['sentFrom']."\" onclick=\"privateChat2(this)\">";
		echo"<input type=\"button\" value=\"X\"    onclick=\"DeleteChat('".$row['sentFrom']."')\">";
		echo"</div>"; 		
		   
	  }
	  
	} 
	
	}else
	
	{ 
		echo"No private message";
		
		
		
	}









?>