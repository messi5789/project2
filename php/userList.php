<?php 
session_start();
if(isset($_SESSION['users'])){
 foreach(($_SESSION['users']) as $value){
	 
	echo "<div class=\"listUser\"  >"; 
	echo"<div class=\"name\" style=\" cursor:pointer    \" id=\"".$value."\" onclick=\"privateChat(this)\">"; 
	echo "<p style=\" color:black; \">".$value."</p>";  
    echo "</div>";
	echo "<div class=\"exit\"  >"; 
	echo"<input type=\"button\"   id=\"button\"  value=\"X\"  onclick=\"eraser('".$value."')\">";  
    echo "</div>";
	echo "<div class=\"clear\"  >"; 
	echo "</div>";
	echo "</div>"; 
	
	
 }
 echo "<div class=\"clear\"  >"; 
	echo "</div>";
}
	?>