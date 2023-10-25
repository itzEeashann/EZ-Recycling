<?php
include 'protected.php';
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.css">
	<title>Delivery List</title>
	<style>
		body {
			height: 100%;
			margin: 0;
			background-color: #303952
		}

		main{
            height: 50px;
            margin: 0 0 4% 24%;
            padding-top: 2%; 
            font-family: system-ui;
            color: white;
            width: 60%;
            font-size: 40px;
        }
		
		#main-content {
			width: 76%;
			display: inline-block;
			margin-left: 23%;
		}

		#table_list {
			border-collapse: collapse;
			width: 100%;
		}
		#table_list td, #table_list th {
			border: 1px solid #ddd;
			padding: 5px;
		}

		#table_list tr{
			background-color: #202836;
			color: white;
			width: 100%;
		}
		
		#table_list th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #202836;
			color: #f0b159;
		}
		
		.box {
			display: flex;
			justify-content: space-between;
			margin: 20px;
		}
		
		div a{
			text-decoration: none;
			width: 100px;
			align: center;		
			height: 40px; 
			color: white;
			border-radius: 7px;
		}
	</style>
</head>

<body>
	<div><?php include_once('adminheader.php');?></div> 
	<main>
		<svg xmlns="http://www.w3.org/2000/svg" width="35" height="40" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
			<path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
			<path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
		</svg>
		<span>Delivery</span>
	</main>
    <div id="main-content">
		<form method="post"> 
			<div class="box">
				<div class>
					<a style='color: white;'>Search Delivery ID:&nbsp;</a>
					<input type="text" name="search_key" placeholder="Search....">
					<button class="btn btn-light" name="searchbtn" type="submit">Search</button>
				</div>
			</div>

			<?php 
				include("conn.php");
				$result=mysqli_query($con,"SELECT * FROM delivery");
			?>

			<?php
			$search_key = ""; 
			if(isset($_POST['searchbtn']))
			{ 
				$search_key = $_POST['search_key']; 
			}
			$result = mysqli_query($con,"SELECT * FROM delivery WHERE delivery_id LIKE '%$search_key%'");
			?>

			<table id="table_list" class="text-center">
				<tr>
					<th class="text-center">Delivery ID</th>
					<th class="text-center">Order ID</th>
					<th class="text-center">Username</th>
					<th class="text-center">Status</th>
					<th class="text-center">Action</th>
				</tr>

				<?php 
				while($row = mysqli_fetch_array($result))
				{
				echo"<tr bgcolor=\"#99FF66\">";

				echo"<td>";
				echo $row['delivery_id'];
				echo"</td>";

				echo"<td>";
				echo $row['order_id'];
				echo"</td>";

				echo"<td>";
				echo $row['username']; 
				echo"</td>";

				echo"<td>";
				echo $row['status']; 
				echo"</td>";
				
				echo"<td><a class='col-3 m-1 btn btn-info' href=\"view_delivery.php?delivery_id=";
				echo $row['delivery_id'];
				echo"\">View</a>";

				echo"<a class='col-3 m-1 btn btn-warning' href=\"edit_delivery.php?delivery_id="; 
				echo $row['delivery_id'];
				echo"\">Edit</a>";
				}
				mysqli_close($con);
				?>
			</table>
		</form>
</body>
</html>