<?php
 require_once('connection.php');
 
   $query = 'SELECT * FROM `messaging`';
   $res = mysqli_query($connect,$query);
 
   if($res){
	   while($detail = mysqli_fetch_array($res)){
		   echo $detail['name'].':'.$detail['message'].' '.$detail['date'].'</br>';
	   }
   }
   
   mysqli_close($connect);
   
?>

