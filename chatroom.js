<script>
  function login(){
	   $.ajax({
		   type:"POST";
		   url:"get_msg.php";
		   data:{};
		   dataType:"json";
		   success:
	   })
   }
   
   
   $(#send).click(function() {
	   $.ajax({
		   type:"GET";
		   url:"get_msg.php";
		   success:function(data){
			   $('#chat').html(data);
		   }
	   });
	   
   });
</script>