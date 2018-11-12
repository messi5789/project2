<?php
session_start();
$len=count($_SESSION['sentUsers']);

if($len>0){
	echo "Private message"."<br>";
	for($i=0;$i<$len;$i++){
echo"<div class=\"private2\">";
	echo "<p>".$_SESSION['sentUsers'][$i]."</p><br>";
	echo"<input type=\"button\" value=\"private chat\"  id=\"".$_SESSION['sentUsers'][$i]."\" onclick=\"privateChat(this)\">";
	echo"<input type=\"button\" value=\"xóa\"    onclick=\"DeleteChat('".$row['sentFrom']."')\">";
	echo"</div>"; 


}

}else{
	
	 echo'no private message';
	
	
}


?>