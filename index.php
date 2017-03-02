<?php
session_start();
require_once('connection.php');
?>

<html>
	<head>
		<title>LogIn-ChatRoom</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="chatroom.js"></script>
	</head>
	
	<body>
	   <h3> LogIn To ChatRoom </h3>
	    		
	    <form method="post" action="index.php">
         
		 <h4>Guest Name:</h4><input type="text" name="guest" value=''/> 
		 <input type="submit" name='submit' value="LogIn"/>
	    </form>
	</body>
	
	<?php
	   $error = '';
	   
	  if(isset($_POST['submit'])){
		  if($_POST['guest'] ==''){echo $error = 'Please enter the Name';}
		  else{ $guest = $_POST['guest']; 
		  $_SESSION['guest'] = $guest;
		  
		  $query1 = "SELECT `name` FROM `user` WHERE `name`= '".$guest."'";
		  if($query1){
			  $query_res = mysqli_query($connect,$query1);
			  if($query_res){
				  if(mysqli_num_rows($query_res)!= 0){
					  echo $error .= '</br> Username already exist';
				  }else{
		              $query2 = "INSERT INTO `user` (`id`, `name`) VALUES (NULL, '".$guest."')";
					  if($query2){
						   mysqli_query($connect,$query2);
					     }
						   header("Location:chatroom_index.php");
						   exit;
					}
			  }
		  } 
		  
	  
	  }
	 
	  }
	?>
	
	
</html>