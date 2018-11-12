<?php
session_start();
ob_start(); 
if(!isset($_SESSION['users'])){ 
 $_SESSION['users']=array();
}
 if(!isset($_SESSION['hide'])){ 
 $_SESSION['hide']=array();
 }
 
 if(!isset($_SESSION['soluong'])){ 
 $_SESSION['soluong']=array();
 }
 
  
 
 
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="description" content="CHat room for everyone">
<meta name="keyword" content="chat,group,public,private">
<meta name="author" content="Huy Pham">
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<title>Chat room for everyone</title> 
<link rel="stylesheet" type="text/css" href="css/page.css" /> 
<script src="js/jquery3.js "></script> 
<script src="js/script.js"></script> 

</head>

<body> 
<div class="header">
</p>
CHAT ROOM FOR EVERYONE
</p>

</div>
<div class="letter"> 
</div>


<div id="chatContainer">

    <div id="chatTopBar"  >
	<?php 
	if(isset($_SESSION['username'])){
		echo"
		 <div class=\"info\">
		<p>".$_SESSION['username']."</p>  
		</div> 
		<div class=\"status\">  
		<a href=\"php/logout.php\" onclick=\"removeUser()\" >LogOut </a> 
		</div> 
		<div class=\"clear\"> 
		</div> 
			";
	}
	
	?>
	</div>
	<div id="back" style="cursor:pointer"   >
	<p>Lobby Room</p>
	</div>
	
	<div id="userList"  > 
	</div>
	
	<div class="clear"></div>
    <div id="chatLineHolder"> 
	 
	</div>
    <div id="chatusers"  >  
	</div> 
	
	<div id="chatPrivate"></div>
	
    <div id="chatBottomBar"  >
	
    	<div class="tip"></div>
        <?php
		if(!isset($_SESSION['username'])){
		?>
        <form style="display:block" id="loginForm" method="post"  >
            <input type="text" id="name" name="name"   maxlength="16" placeholder="your username" />
            <input type="text" id="email" name="email" placeholder="your email"  />
            <input type="button" name="submit" id="login"   value="Login" onclick="addUser()" />
        </form>
		<?php
		}
		else{
		?>        
        <form id="submitForm" method="post" onsubmit="return false" >
            <input type="text" id="chatText" name="chatText"  maxlength="255" />
            <input type="button" name="Gửi"   value="Gửi" onclick="sendMsg()"  />
        </form>
     <?php
		} 
		 
		?>   
    </div>
   
</div> 
   
  
  
<script language="javascript"> 
function removeUser(){
	  
	$.ajax({
		url:'php/ajax4.php',
		type:'POST'    
		 
		 
	}); 
  
	
}
function addUser(){
	 var name=document.getElementById('name').value;
	var email=document.getElementById('email').value;  
	$.ajax({
		url:'php/ajax.php',
		type:'POST', 
		data:{
			name:name,
			email:email
			
		},
		dataType:'json',
		success:function(data){
			if(data.number===1){
				alert('mời bạn chọn tên đăng nhập khác,tên đăng nhập đã bị trùng');
				
			}else{
			 
			    var html=''; 
				  html+='<div class="info">';
				  html+='<p>';
				  html+=data.name;
				  html+='</p>'; 
				  html+='</div>';
				   html+='<div class="status">';
				   html+='<a href="php/logout.php" onclick="removeUser()">';
				  html+=data.status;
				  html+='</a>';
				  html+='</div>';
				  html+='<div class="clear">'; 
				  html+='</div>'; 
			   
			 $('#chatTopBar').html(html);
			 document.getElementById("loginForm").style.display = 'none';
			 html2='';
			 html2+='<form id="submitForm" method="post"  onsubmit="return false">';
            html2+='<input type="text" id="chatText" name="chatText"   maxlength="255" />';
            html2+='<input type="button" name="submit"   value="Gửi" onclick="sendMsg()" />';
       html2+= '</form>';
			 
			 $('#chatBottomBar').html(html2) ;
			 $('#chatText').keypress(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {  
        sendMsg();
    }
}); 
			 setInterval(function() {$('#chatusers').load('php/UserOnline.php');},2000);	
			 setInterval(function() {$('#chatLineHolder').load('php/showMessage.php');},500);
			
			} 
			  
			
		}
		 
	}); 
 
} 

 
function sendMsg(){  
	 var chatText=document.getElementById('chatText').value;
	 
	 $.ajax({
		
		type:'POST',
		url:'php/ajax2.php',
		data:{
			text:chatText
			
		},
		dataType:'text',
		success:function(data){ 
			document.getElementById('chatText').value=' '; 
			 
		}
	 
	 
	 
});

}

 

 

function privateChat(k){  
 
  
	$.ajax({
		type:'POST', 
		url:'php/infoUser.php',
		data:{
			user:k.id
		}, 
		success:function(data){  
		$.ajaxSetup({cache:false});
	    $('#userList').load('php/userList.php');  	  
		 setTimeout(function(){
			    var v=document.getElementById(k.id);
			 v.style.backgroundColor="blue";},1000);
		}
		
		
		
	});
 
	
}
function privateChat2(k){  
 
  var user=k.id.slice(2);
	$.ajax({
		type:'POST', 
		url:'php/infoUser.php',
		data:{
			user:user
		}, 
		success:function(data){  
		$.ajaxSetup({cache:false});
	    $('#userList').load('php/userList.php');  	  
		 setTimeout(function(){
			    var v=document.getElementById(user);
			 v.style.backgroundColor="blue";},1000);
		}
		
		
		
	});
 
	
}

function eraser(k){
	
	$.ajax({
		type:'POST', 
		url:'php/Eraser.php',
		data:{
			user:k
		},
		  
		success:function(data){  
			 $.ajaxSetup({cache:false});
		  	 $('#userList').load('php/userList.php'); 
		}
		
		
		
	});
	
	
} 

function DeleteChat(k){
	 
 $.ajax({
		type:'POST', 
		url:'php/delete2.php',
		data:{
			user1:k
		}, 
		 dataType:'text',
		success:function(data){   
		 
			 
		}
	});
	  
	 
	 
}
 

 <?php
 if(isset($_SESSION['username'])){
	?>
setInterval(function() {$('#chatusers').load('php/UserOnline.php');},2000);
setInterval(function() {$('#chatLineHolder').load('php/showMessage.php');},700);	
	<?php 
 }
 
 
 ?>
 function load(url, element)
{
    r = new XMLHttpRequest();
    r.open("POST", url, false);
    r.send(null);

    element.innerHTML = r.responseText; 
}
   var back=document.getElementById('back');
   back.addEventListener("click", function(){
         load('php/userList.php',document.getElementById('userList'));
            });
         
     
   
  
</script>
 
</body>
</html>
 