<?php
include 'protected.php';
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.css">
	<title>Account List</title>
	<style>
		body {
			height: 100%;
			margin: 0;
			background-color: #303952;
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
	<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
		<path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
		<path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
		<path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
	</svg>
    <span>Account</span>
	</main>
    <div id="main-content">
		<form method="post"> 
			<div class="box">
				<div>
					<a style='color: white;'>Search Username:&nbsp;</a>
					<input type="text" name="search_key" placeholder="Search....">
					<button class="btn btn-light" name="searchbtn" type="submit">Search</button>
				</div>
			</div>

			<?php 
				include("conn.php");
				$result=mysqli_query($con,"SELECT * FROM accounts WHERE Role != 'Admin'");
			?>

			<?php
			$search_key = ""; 
			if(isset($_POST['searchbtn']))
			{ 
				$search_key = $_POST['search_key']; 
				$result = mysqli_query($con,"SELECT * FROM accounts WHERE username LIKE '%$search_key%'");
			}
			
			?>

			<table id="table_list" class="text-center">
				<tr>
					<th class="text-center">Username</th>
					<th class="text-center">Name</th>
					<th class="text-center">Role</th>
					<th class="text-center">Action</th>
				</tr>

				<?php 
				while($row = mysqli_fetch_array($result))
				{
				echo"<tr bgcolor=\"#99FF66\">";

				echo"<td>";
				echo $row['username'];
				echo"</td>";

				echo"<td>";
				echo $row['firstname'];
				echo "&nbsp;";
				echo $row['lastname'];
				echo"</td>";

				echo"<td>";
				echo $row['Role']; 
				echo"</td>";
				
				echo"<td><a class='col-3 m-1 btn btn-info' href=\"view_account.php?username="; 
				echo $row['username'];
				echo"\">View</a>";

				echo"<a class='col-3 m-1 btn btn-warning' href=\"edit_account.php?username="; 
				echo $row['username'];
				echo"\">Edit</a>";

				echo"<a style='background-color:#FF0000;' class='col-3 m-1 btn btn-danger' href=\"delete_account.php?username=";  
				echo $row['username']; 
				echo"\" onClick=\"return confirm('Delete ";
				echo $row['username'];echo" details?');\">Delete</a></td></tr>";
				}
				mysqli_close($con);
				?>
			</table>
			<br><br>
		</form>
</body>
</html>