<?php
session_start();
$len=count($_SESSION['users']);
if(isset($_POST['user'])){
	
	for($i=0;$i<$len;$i++){
		
		if($_SESSION['users'][$i]==$_POST['user'] && $_SESSION['guest']==$_POST['user'] ){
			
			array_splice($_SESSION['users'],$i,1);
			unset ($_SESSION['guest'] );
			
		}
		else if($_SESSION['users'][$i]==$_POST['user'] && $_SESSION['guest']!=$_POST['user'] ){
				
				array_splice($_SESSION['users'],$i,1);
		
		
		
		}
	}
	
	
	
	
}













?>