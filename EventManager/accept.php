<?php
	include('dbcon.php'); 
	if (isset($_POST['approve'])){
		$Event_ID = $_POST['Event_ID'];
		$sql = "UPDATE events SET status='1' WHERE Event_ID = '$Event_ID'";
		$run = mysqli_query($con,$sql);
		if($run == true){
			
			echo "<script> 
					alert('Event Approved');
					window.open('EventStatus.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Update Failed');
			</script>";
		}
	}
	include('dbcon.php'); 
	if (isset($_POST['reject'])){
		$Event_ID = $_POST['Event_ID'];
		$sql = "UPDATE events SET status='2' WHERE Event_ID = '$Event_ID'";
		$run = mysqli_query($con,$sql);
		if($run == true){
			
			echo "<script> 
					alert('Event Rejected');
					window.open('EventStatus.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Update Failed');
			</script>";
		}
	}
	include('dbcon.php'); 
	if (isset($_POST['done'])){
		$Event_ID = $_POST['Event_ID'];
		$sql = "UPDATE events SET status='3' WHERE Event_ID = '$Event_ID'";
		$run = mysqli_query($con,$sql);
		if($run == true){
			
			echo "<script> 
					alert('Event Completed');
					window.open('EventStatus.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Update Failed');
			</script>";
		}
	}
	
	
 ?>