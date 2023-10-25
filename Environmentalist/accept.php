<?php
	include('dbcon.php'); 
	if (isset($_POST['approve'])){
		$delivery_id = $_POST['delivery_id'];
		$sql = "UPDATE delivery SET status='Delivered' WHERE delivery_id = '$delivery_id'";
		$run = mysqli_query($con,$sql);
		if($run == true){
			
			echo "<script> 
					alert('Delivery Completed');
					window.open('delivery.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Delivery Pending');
			</script>";
		}
	}
	
 ?>