<!-- <?php
include 'protected.php';
?> -->

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.css">
	<title>Recyclable Item List</title>
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
		
		button{
			height: 50px;
			padding: 10px 20px;
			
		}
		
		.a{
			text-decoration: none;
			padding: 8px;
			margin: 10px;
			width: 100px;
			text-align: center;
			line-height: 40px;
			height: 20px; 
			color: white;
			border-radius: 7px;
		}
	</style>
</head>

<body>
	<div><?php include_once('adminheader.php');?></div> 
	<main>
		<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
  			<path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
		</svg>
    <span>Recyclable Item</span>
	</main>
    <div id="main-content">
		<form method="post"> 
			<div class="box">
				<button style='background-color:#808080;' class="btn btn-secondary"; name="addnewbtn" href='add_doctor.php'>Add New</button>
				<div class>
					<a style='color: white;'>Search Material Type:&nbsp;</a>
					<input type="text" name="search_key" placeholder="Search....">
					<button type="button" class="btn btn-light" name="searchbtn" type="submit">Search</button>
				</div>
			</div>

			<?php 
				include("conn.php");
				$result=mysqli_query($con,"SELECT * FROM recyclable_items_stock");
			?>

			<?php
			$search_key = ""; 
			if(isset($_POST['searchbtn']))
			{ 
				$search_key = $_POST['search_key']; 
			}
			$result = mysqli_query($con,"SELECT * FROM recyclable_items_stock WHERE material_type LIKE '%$search_key%'");
			?>

			<table id="table_list" class="text-center">
				<tr>
					<th class="text-center">Material Type</th>
					<th class="text-center">Amount</th>
					<th class="text-center">Date</th>
					<th class="text-center">Action</th>
				</tr>

				<?php 
				while($row = mysqli_fetch_array($result))
				{
				echo"<tr bgcolor=\"#99FF66\">";

				echo"<td>";
				echo $row['material_type'];
				echo"</td>";

				echo"<td>";
				echo $row['amount'];
				echo"</td>";

				echo"<td>";
				echo $row['date']; 
				echo"</td>";
				
				echo"<td><button class='col-3 m-1 btn btn-info' href=\'admin_dashboard.php?material_type='";
				echo $row['material_type'];
				echo"\">View More</button>";

				echo"<button class='col-3 m-1 btn btn-warning' href=\'view_doctor.php?material_type='"; 
				echo $row['material_type'];
				echo"\">Edit</button>";

				echo"<button style='background-color:#FF0000;' class='col-3 m-1 btn btn-danger' href=\"admin-action-php1/doctor-delete.php?material_type="; 
				echo $row['material_type']; 
				echo"\" onClick=\"return confirm('Delete ";
				echo $row['material_type'];echo" details?');\">Delete</button></td></tr>";
				}
				mysqli_close($con);
				?>
			</table>
		</form>
</body>
</html>