<?php 
	include('dbcon.php'); 
	include('../inc/session.php'); 

	if (isset($_SESSION['username'])) {
		$result = mysqli_query($con,"select * from accounts where username='".$_SESSION['username']."'");
        $row = mysqli_fetch_array($result);
	}
                        
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery</title>
    
    <script src="https://kit.fontawesome.com/8557daf5de.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="bootstrap.css">


    <style>

        .navigation .profile-pic h1 {
            font-weight: bolder;
            font-size:2rem;
            margin-bottom:0rem;
            color:black;
        }
        .navigation .profile-pic h3 {
            font-weight: bolder;
            margin-bottom:0rem;
            font-size:1.25rem;
            color:black;

        }
        .animate-in {
            -webkit-animation: fadeIn .5s ease-in;
            animation: fadeIn .5s ease-in;
        }

        .animate-out {
            -webkit-transition: opacity .5s;
            transition: opacity .5s;
            opacity: 0;
        }

        @-webkit-keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
    
</head>
<body>
    <!--Nav Bar Starts-->
    <h1 class='copyrite' style='text-align:right;'>EZ Recycling<sup><i style='font-size:small;' class="fa-solid fa-copyright"></i> </sup></h1>
    <div class="container">
        <div class="navigation">
            <div class="profile-pic">
                <img src="../uploads/<?php echo $row['picture']; ?>">
                <h1><?php echo $row['username'];?> </h1>
                <h3>Environmentalist</h3>
            </div>
            <ul>
                <li class="list">
                    <a href="Dashboard.php">
                        <span class="icon"><i class="fa-solid fa-house-chimney"></i></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="list ">
                    <a href="Profile.php">
                        <span class="icon"><i class="fa-solid fa-user"></i></span>
                        <span class="title">Profile</span>
                    </a>
                </li>
                <li class="list ">
                    <a href="Event.php">
                        <span class="icon"><i class="fa-solid fa-calendar-check"></i></span>
                        <span class="title">Events</span>
                    </a>
                </li>
                <li class="list ">
                    <a href="ReqEvent.php">
                        <span class="icon"><i class="fa-solid fa-calendar-plus"></i></span>
                        <span class="title">Request Events</span>
                    </a>
                </li>
                <li class="list ">
                    <a href="Collection.php">
                        <span class="icon"><i class="fa-solid fa-recycle"></i></span>
                        <span class="title">Collection</span>
                    </a>
                </li>
                <li class="list_active ">
                    <a href="Delivery.php">
                        <span class="icon"><i class="fa-solid fa-truck"></i></span>
                        <span class="title">Delivery</span>
                    </a>
                </li>
                <center>
                <li class="list exit ">
                    <!-- <a href="Delivery.php"> -->
                            <button class="exit_btn" onclick="location.href='../inc/testlogout.php'" type="button"><i class="fa-solid fa-right-from-bracket"></i></button>
                    </a>
                </li>
                </center>
            </ul>
        </div>
    </div>
    <div class="official">
        <div class="mainbox animate-in" >
            <div class="content">
                <div class="page-title">
                    <center><h5 style='font-size:2.5rem; font-weight:bolder;margin-bottom:1rem;'>Delivery</h5></center>
                </div>
                <br><hr class="mt-2 mb-4">
            
    <!-- ################################################################################################################## -->

                <!-- Pending -->
                <section id="post" style='border-radius:10px; border:solid black;background: linear-gradient(125deg, #04A5E2 30%, #00FC08 70%); font-weight:bolder;'>
                    <center><h2 style='font-weight:600; margin-bottom:1rem;'>Pending Delivery</h2></center>
                    <div class="container">
                        <div class="row">
                            <table class="table table-bordered table-hover table-striped">
							<thead>
								<th>Delivery ID </th>
                                <th>Order ID</th>
                                <th>Products</th>
                                <th>Delivery Address</th>
                                <th>Description</th>
								<th>Status</th>
							</thead>
							 <tbody>
							 	<?php 
                                    include("dbcon.php");

									$sql = "SELECT * FROM delivery WHERE status = 'Pending' && username='".$_SESSION['username']."'";
									$que = mysqli_query($con,$sql);
									$cnt = 1;
									while ($row = mysqli_fetch_assoc($que)) {
									?>

									
							 	<tr>
									<td><?php echo $row['delivery_id'] ?></td>
                                    <td><?php echo $row['order_id'] ?></td>
                                    <td><?php echo $row['total_products'] ?></td>
                                    <td><?php echo $row['deliveryAddress'] ?></td>
                                    <td><?php echo $row['description'] ?></td>
							 		<td>
							 			<form action="accept.php" <?php echo $row['delivery_id']; ?> method="POST">
							 				<input type="hidden" name="delivery_id" value="<?php echo $row['delivery_id']; ?>">
							 				<input style = 'padding:10px;font-weight:bold;font-size:1rem;color:black;border:solid;'type="submit" class="btn btn-sm btn-danger" name="approve" value="Pending">
							 			</form>
							 		</td>
							 				<?php
							 			
							 			}
							 		 ?>
							 		
							 	</tr>

							 </tbody>
						</table>
                        </div>
                    </div>
                </section>

    <!-- ################################################################################################################## -->

                <!-- Delivered -->
                <section id="post" style='border-radius:10px; border:solid black;background: linear-gradient(125deg, #04A5E2 30%, #00FC08 70%); font-weight:bolder;'>
                    <center><h2 style='font-weight:600; margin-bottom:1rem;'>Completed Delivery</h2></center>
                    <div class="container">
                        <div class="row">
                            <table class="table table-bordered table-hover table-striped">
							<thead>
								<th>Delivery ID </th>
                                <th>Order ID</th>
                                <th>Products</th>
                                <th>Delivery Address</th>
                                <th>Description</th>
								<th>Status</th>
							</thead>
							 <tbody>
							 	<?php 
                                    include("dbcon.php");

									$sql = "SELECT * FROM delivery WHERE status = 'Delivered' && username='".$_SESSION['username']."'";
									$que = mysqli_query($con,$sql);
									while ($row = mysqli_fetch_assoc($que)) {
									?>

									
							 	<tr>
									<td><?php echo $row['delivery_id'] ?></td>
                                    <td><?php echo $row['order_id'] ?></td>
                                    <td><?php echo $row['total_products'] ?></td>
                                    <td><?php echo $row['deliveryAddress'] ?></td>
                                    <td><?php echo $row['description'] ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-success" style = 'padding:10px;font-weight:bold;font-size:1rem;color:black;border:solid;'>
                                            <?php echo $row['status'] ?>
                                        </button>
                                    </td>
							 		
							 				<?php
							 			
							 			}
							 		 ?>
							 		
							 	</tr>

							 </tbody>
						</table>
                        </div>
                    </div>
                </section>


                        


 </body>  
 </html> 

 