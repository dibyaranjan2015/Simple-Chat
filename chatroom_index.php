<?php
session_start();
include('php-emoji-master/lib/emoji.php');
?>
<html>
  <head>
    <title> Chat Room</title>
	<link rel="stylesheet" type="text/css" href="chatroom.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	 
 
  </head>
    
   <?php
     if(isset($_SESSION['guest'])){
		 $name = $_SESSION['guest'];
	 }else{
		 header("Location:index.php");
	     exit;
	 }
   ?>
	
	<body onload="setInterval(update_data,100)">
	
		
	   <div id="container">
			<div id="chat_container">
			<h3>Hi <?php echo ucfirst($name); ?></h3>
			<h3>Welcome to Chat Room</h3>
			   <div id="chat"> </div>
				<div id="msg_box">
					<input type="text"  placeholder="Enter the message here.." id="message" /> <button id="send" >SEND </button>
				</div>
			
			</div>
	   <div>
	     
		 	 <script> 
			     //window.onload = setInterval(update_data,1000);
				 	function update_data(){
					 $.ajax({
					 type:"GET",
					 url:'get_msg.php',
					
					 success:function(response){
						 $('#chat').html(response);
					 }
					 });
				   }
				 
				 $("#send").click(function(){
					 
					 var message = $('#message').val();
					 var name = '<?php echo $name; ?>';
					 update_data();
					 
					if(message != ''){
					   $.ajax({
					   type:"POST",
					   
					   data:{'name':name,'message':message,},
					   url:"add_msg.php",
					   success:function(data){
						   $('#message').val('');
						   
					   }
						 
					 });
					}
					 
					 
				 });
				 
			
			 
			 $('#message').keyup(function(e){
				 if(e.keyCode == 13){
					 
					 update_data();
					  var message = $('#message').val();
					  
					  var length = message.length;
						
					if (length !== 0){
					 $.ajax({
					   type:"POST",
					   data:{'message':message,},
					   
					   url:"add_msg.php",
					   success:function(data){
						   $('#message').val('');
						   
					   }
					 });
					}else{
						$(this).val('');
					}
					 
				 }
			 });
			 </script>
	</body>
</html>