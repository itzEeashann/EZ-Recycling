<?php
include 'protected.php';
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.css">
	<title>Order List</title>
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
		<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
			<path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
		</svg>
		<span>Order Info</span>
	</main>
    <div id="main-content">
		<form method="post"> 
			<div class="box">
				<div>
					<a style='color: white;'>Search Order ID:&nbsp;</a>
					<input type="text" name="search_key" placeholder="Search....">
					<button class="btn btn-light" name="searchbtn" type="submit">Search</button>
				</div>
			</div>

			<?php 
				include("conn.php");
				$result=mysqli_query($con,"SELECT * FROM orders");
			?>

			<?php
			$search_key = ""; 
			if(isset($_POST['searchbtn']))
			{ 
				$search_key = $_POST['search_key'];
				$result = mysqli_query($con,"SELECT * FROM orders WHERE order_id LIKE '%$search_key%'");
			}
			?>

			<table id="table_list" class="text-center">
				<tr>
					<th class="text-center">Order ID</th>
					<th class="text-center">Ordered Products</th>
					<th class="text-center">Price</th>
					<th class="text-center">Payment Method</th>
					<th class="text-center">Action</th>
				</tr>

				<?php 
				while ($row = mysqli_fetch_array($result))
				{
				echo"<tr bgcolor=\"#99FF66\">";

				echo"<td>";
				echo $row['order_id'];
				echo"</td>";

				echo"<td>";
				echo $row['total_product'];
				echo"</td>";
				
				echo"<td>";
				echo 'RM';
				echo $row['price_total'];
				echo"</td>";

				echo"<td>";
				echo $row['payment_method'];
				echo"</td>";
				
				echo"<td><a class='col-6 m-1 btn btn-info' href=\"view_order.php?order_id=";
				echo $row['order_id'];
				echo"\">View</a>";
				}
				mysqli_close($con);
				?>
			</table>
		</form>
	</div>
</body>
</html>