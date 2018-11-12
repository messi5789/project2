<?php
session_start();  
if(isset($_POST['user1'])){
$_SESSION['hide'][]=$_POST['user1'];
	 
	 
}  

?>