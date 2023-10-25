<?php
include("conn.php");
if (isset($_POST['edit_delivery'])) {
    $link = $_POST['delivery_id'];
	$check = "SELECT * from delivery where delivery_id ='$link'";
	$result = mysqli_query($con,$check);
	{
		$sql= "UPDATE delivery SET 
        username='$_POST[username]'
        where delivery_id = '$link'";

    if(!mysqli_query($con,$sql)) {
        die("Error:" .mysqli_error($con));
    }
    else{
        echo '<script>alert("Record saved!");
        window.location.href ="delivery_list.php";
        </script>';
    }   
    mysqli_close($con);
    }
}
?>