<?php
include 'protected.php';
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.css">
	<title>Event List</title>
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
			width: 140px;
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
	<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
		<path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
		<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
	</svg>
    <span>Event</span>
	</main>
    <div id="main-content">
		<form method="post"> 
			<div class="box">
				<div class>
					<a style='color: white;'>Search Event Name:&nbsp;</a>
					<input type="text" name="search_key" placeholder="Search....">
					<button class="btn btn-light" name="searchbtn" type="submit">Search</button>
				</div>
			</div>

			<?php 
				include("conn.php");
				$result=mysqli_query($con,"SELECT * FROM events");
			?>

			<?php
			$search_key = ""; 
			if(isset($_POST['searchbtn']))
			{ 
				$search_key = $_POST['search_key'];
				$result = mysqli_query($con,"SELECT * FROM events WHERE Event_Name LIKE '%$search_key%'");
			}
			?>

			<table id="table_list" class="text-center">
				<tr>
					<th class="text-center">Event ID</th>
					<th class="text-center">Event Name</th>
					<th class="text-center">status</th>
					<th class="text-center">Action</th>
				</tr>

				<?php 
				while($row = mysqli_fetch_array($result))
				{
				echo"<tr bgcolor=\"#99FF66\">";

				echo"<td>";
				echo $row['Event_ID'];
				echo"</td>";

				echo"<td>";
				echo $row['Event_Name'];
				echo"</td>";
				
				echo"<td>";				 
					if ($row['status'] == 0) {
						echo "<span>Pending</span>";
					}
					elseif ($row['status'] == 1){
						echo "<span>Approved</span>";
					}
					elseif ($row['status'] == 2){
						echo "<span>Rejected</span>";
					}
					else{
						echo "<span>Done</span>";
					}
				echo"</td>";
				
				echo"<td><a class='col-5 m-1 btn btn-info' href=\"view_event.php?Event_ID=";
				echo $row['Event_ID'];
				echo"\">View</a>";
				}
				mysqli_close($con);
				?>
			</table>
		</form>
	</div>
</body>
</html>