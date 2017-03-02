<?php
  session_start();
  require_once('connection.php');

   if(isset($_SESSION['guest'])){
		 $name = $_SESSION['guest'];
		 
		 $query = "SELECT `id` FROM `user` WHERE `name`= '".$name."'";
		 if($query){
			$result= mysqli_query($connect,$query);
			 if($result){
				 $user_id = mysqli_fetch_array($result)['id'];
			 }
		 } 
	}
    
    $message = $_POST['message'];
  
  
  $query = "INSERT INTO `messaging` (`id`, `user_id`,`name`, `message`, `date`) VALUES (NULL, '".$user_id."','".$name."', '".$message."', CURRENT_TIMESTAMP)";
  
   $result =  mysqli_query($connect,$query);
   if(!$result){
	   echo "query string failed";
   }
   
   mysqli_close($connect);

?>