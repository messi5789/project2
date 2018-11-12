<?php 
session_start();  
include('connect.php');
 
	
if(isset($_POST['name'])){
	
	$name=addslashes($_POST['name']);
	$queryy="select name from users where name='$name'";
	$resultt=mysqli_query($conn,$queryy);
	$roww=mysqli_num_rows($resultt);
	if($roww==0){
	$_SESSION['username']=$_POST['name'];
	$email=addslashes($_POST['email']);
	$query="insert into users (name,email) values('$name','$email')";
	$result=mysqli_query($conn,$query);  
	$info=array(
	'name'=>stripslashes($name),
	'status'=>'LogOut' 
	);
	 
	echo json_encode($info);
	} 
	else{
	$u=	array(
	'number'=>1
	
	);
		
	echo json_encode($u);	
	}
	 
}
  
 
 
 
 
 
 
 
 
 
 ?>