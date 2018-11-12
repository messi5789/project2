<?php
session_start();

if(isset($_POST['user'])){ 
$u=$_POST['user'];
$len=count($_SESSION['users']);
if($len>0){

for($i=0;$i<$len;$i++)
{
if($_SESSION['users'][$i]==$_POST['user'])
{
	$_SESSION['guest']=$_POST['user']; 
	$user=NULL;
	break;
	
}else{
	
	$user=$_POST['user'];
}

}

 if($user!=NULL&&$_SESSION['username']!=$user){
	$_SESSION['users'][]=$user;  
	$_SESSION['guest']=$user; 	
 }
  
 }	 
else if($_SESSION['username']!=$user){
	
	$_SESSION['users'][]=$_POST['user'];  
	$_SESSION['guest']=$u; 
	
}
 
  
}

?>

