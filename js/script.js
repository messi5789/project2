 $(document).ready(function(){ 
	  
	 setInterval(function() {$('#chatLineHolder').scrollTop($('#chatLineHolder')[0].scrollHeight);},400); 
	 
   $('#chatText').keypress(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {  
        sendMsg();
    }
}); 
 
 $('#name').keypress(function (event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') { 
        addUser();
    }
});
 $('#email').keypress(function (event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') { 
        addUser() ;
    }
});
});
 
$(document).ready(function() {
 $.ajaxSetup({cache:false}); 
	setInterval(function() {$('.letter').load('php/sentUser.php');},1200);
	  $.ajax({
		type:'POST', 
		url:'php/back.php', 
		
	}); 
	
	   	
	 
});

$(document).ready(function() {
 $.ajaxSetup({cache:false});
	 $('#userList').load('php/userList.php'); 	 
});

  $(document).ready(function() {
	$("#back").click(function(event){
                 $.ajax({
		type:'POST', 
		url:'php/back.php',
		 
		
	});
	});
	});

