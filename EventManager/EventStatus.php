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
    <title>Event Status</title>
    
    <script src="https://kit.fontawesome.com/8557daf5de.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="bootstrap.css">


    <style>
body{
        background: lightgreen;
    }
        .navigation .profile-pic h1 {
            font-weight: bolder;
            font-size:2rem;
            margin-bottom:0rem;
        }
        .navigation .profile-pic h3 {
            font-weight: bolder;
            margin-bottom:0rem;
            font-size:1.25rem;
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
                <h3>Event Manager</h3>
            </div>
            <ul>
            <li class="list ">
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
                <li class="list_active ">
                    <a href="EventStatus.php">
                        <span class="icon"><i class="fa-solid fa-calendar-plus"></i></span>
                        <span class="title">Events Status</span>
                    </a>
                </li>
                <li class="list ">
                    <a href="Participant.php">
                        <span class="icon"><i class="fa-solid fa-calendar-check"></i></span>
                        <span class="title">Participant List</span>
                    </a>
                </li>
                <li class="list ">
                    <a href="report.php">
                        <span class="icon"><i class="fa fa-file"></i></span>
                        <span class="title">Report</span>
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
        <div class="mainbox animate-in">
            <div  class="content">
                <!-- Pending -->
                <section id="post" style='border-radius:10px; border:solid black;background: linear-gradient(125deg, #04A5E2 30%, #00FC08 70%); font-weight:bolder;'>
                    <center><h2 style='font-weight:600; margin-bottom:1rem;'>Pending Event</h2></center>
                    <div class="container">
                        <div class="row">
                            <table class="table table-bordered table-hover table-striped">
							<thead>
								<th>Event ID </th>
                                <th>Event Name</th>
                                <th>Venue</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Capacity</th>
								<th>Description</th>
                                <th>Picture</th>
                                <th>Username</th>
                                <th>Status</th>
							</thead>
							 <tbody>
							 	<?php 
                                    include("dbcon.php");

									$sql = "SELECT * FROM events WHERE status = 0 ";
									$que = mysqli_query($con,$sql);
									$cnt = 1;
									while ($row = mysqli_fetch_assoc($que)) {
									?>

									
							 	<tr>
									<td><?php echo $row['Event_ID'] ?></td>
                                    <td><?php echo $row['Event_Name'] ?></td>
                                    <td><?php echo $row['Venue'] ?></td>
                                    <td><?php echo $row['Date'] ?></td>
                                    <td><?php echo $row['Time'] ?></td>
                                    <td><?php echo $row['capacity'] ?></td>
                                    <td><?php echo $row['descriptions'] ?></td>
                                    <td><?php echo  "<img src=../uploads/".$row['event_pic'].' width=100px height="100px">'  ; ?></td>
                                    <td><?php echo $row['Username'] ?></td>
							 		<td>
							 			<form action="accept.php" <?php echo $row['Event_ID']; ?> method="POST">
							 				<input type="hidden" name="Event_ID" value="<?php echo $row['Event_ID']; ?>">
							 				<input style = 'padding:10px;font-weight:bold;font-size:1rem;color:black;border:solid;'type="submit" class="btn btn-sm btn-danger" name="approve" value='Approve'>
							 				<input type="hidden" name="Event_ID" value="<?php echo $row['Event_ID']; ?>">
							 				<input style = 'padding:10px;font-weight:bold;font-size:1rem;color:black;border:solid;'type="submit" class="btn btn-sm btn-danger" name="reject" value='Reject'>
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

                <!-- Accept -->
                <section id="post" style='border-radius:10px; border:solid black;background: linear-gradient(125deg, #04A5E2 30%, #00FC08 70%); font-weight:bolder;'>
                    <center><h2 style='font-weight:600; margin-bottom:1rem;'>Approved Event</h2></center>
                    <div class="container">
                        <div class="row">
                            <table class="table table-bordered table-hover table-striped">
							<thead>
								<th>Event ID </th>
                                <th>Event Name</th>
                                <th>Venue</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Capacity</th>
								<th>Description</th>
                                <th>Picture</th>
                                <th>Username</th>
                                <th>Status</th>
							</thead>
							 <tbody>
							 	<?php 
                                    include("dbcon.php");

									$sql = "SELECT * FROM events WHERE status = 1 ";
									$que = mysqli_query($con,$sql);
									$cnt = 1;
									while ($row = mysqli_fetch_assoc($que)) {
									?>

									
							 	<tr>
									<td><?php echo $row['Event_ID'] ?></td>
                                    <td><?php echo $row['Event_Name'] ?></td>
                                    <td><?php echo $row['Venue'] ?></td>
                                    <td><?php echo $row['Date'] ?></td>
                                    <td><?php echo $row['Time'] ?></td>
                                    <td><?php echo $row['capacity'] ?></td>
                                    <td><?php echo $row['descriptions'] ?></td>
                                    <td><?php echo  "<img src=../uploads/".$row['event_pic'].' width=100px height="100px">'  ; ?></td>
                                    <td><?php echo $row['Username'] ?></td>
                                    <td>
                                        <form action="accept.php" <?php echo $row['Event_ID']; ?> method="POST">
							 				<input type="hidden" name="Event_ID" value="<?php echo $row['Event_ID']; ?>">
							 				<input style = 'padding:10px;font-weight:bold;font-size:1rem;color:black;border:solid;'type="submit" class="btn btn-sm btn-danger" name="done" value='Completed'>
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

                <!-- Reject -->
                <section id="post" style='border-radius:10px; border:solid black;background: linear-gradient(125deg, #04A5E2 30%, #00FC08 70%); font-weight:bolder;'>
                    <center><h2 style='font-weight:600; margin-bottom:1rem;'>Rejected Event</h2></center>
                    <div class="container">
                        <div class="row">
                            <table class="table table-bordered table-hover table-striped">
							<thead>
								<th>Event ID </th>
                                <th>Event Name</th>
                                <th>Venue</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Capacity</th>
								<th>Description</th>
                                <th>Picture</th>
                                <th>Username</th>
                                <th>Status</th>
							</thead>
							 <tbody>
							 	<?php 
                                    include("dbcon.php");

									$sql = "SELECT * FROM events WHERE status = 2 ";
									$que = mysqli_query($con,$sql);
									$cnt = 1;
									while ($row = mysqli_fetch_assoc($que)) {
									?>

									
							 	<tr>
									<td><?php echo $row['Event_ID'] ?></td>
                                    <td><?php echo $row['Event_Name'] ?></td>
                                    <td><?php echo $row['Venue'] ?></td>
                                    <td><?php echo $row['Date'] ?></td>
                                    <td><?php echo $row['Time'] ?></td>
                                    <td><?php echo $row['capacity'] ?></td>
                                    <td><?php echo $row['descriptions'] ?></td>
                                    <td><?php echo  "<img src=../uploads/".$row['event_pic'].' width=100px height="100px">'  ; ?></td>
                                    <td><?php echo $row['Username'] ?></td>
                                    <td>
                                                    <?php 
                                                    if ($row['status'] == 0) {
                                                        echo "<span>Pending</span>";
                                                    }
                                                    elseif ($row['status'] == 1){
                                                           echo "<span>Approved</span>";
                                                    }
                                                    elseif ($row['status'] == 2){
                                                        echo "<span>Rejected</span>";
                                                    }
                                                    elseif ($row['status'] == 3){
                                                        echo "<span>Done</span>";
                                                    }
                                                    
                                            $cnt++;	}
                                                ?>
                                                </td>
							 		
							 	</tr>

							 </tbody>
						</table>
                        </div>
                    </div>
                                    </section>
                                    <!-- ################################################################################## -->
	
                <!-- done -->
                <section id="post" style='border-radius:10px; border:solid black;background: linear-gradient(125deg, #04A5E2 30%, #00FC08 70%); font-weight:bolder;'>
                    <center><h2 style='font-weight:600; margin-bottom:1rem;'>Finished Event</h2></center>
                    <div class="container">
                        <div class="row">
                            <table class="table table-bordered table-hover table-striped">
							<thead>
								<th>Event ID </th>
                                <th>Event Name</th>
                                <th>Venue</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Capacity</th>
								<th>Description</th>
                                <th>Picture</th>
                                <th>Username</th>
                                <th>Status</th>
							</thead>
							 <tbody>
							 	<?php 
                                    include("dbcon.php");

									$sql = "SELECT * FROM events WHERE status = 3 ";
									$que = mysqli_query($con,$sql);
									$cnt = 1;
									while ($row = mysqli_fetch_assoc($que)) {
									?>

									
							 	<tr>
									<td><?php echo $row['Event_ID'] ?></td>
                                    <td><?php echo $row['Event_Name'] ?></td>
                                    <td><?php echo $row['Venue'] ?></td>
                                    <td><?php echo $row['Date'] ?></td>
                                    <td><?php echo $row['Time'] ?></td>
                                    <td><?php echo $row['capacity'] ?></td>
                                    <td><?php echo $row['descriptions'] ?></td>
                                    <td><?php echo  "<img src=../uploads/".$row['event_pic'].' width=100px height="100px">'  ; ?></td>
                                    <td><?php echo $row['Username'] ?></td>
                                    <td>
                                                    <?php 
                                                    if ($row['status'] == 0) {
                                                        echo "<span class='badge badge-warning'>Pending</span>";
                                                    }
                                                    elseif ($row['status'] == 1){
                                                           echo "<span class='badge badge-success'>Approved</span>";
                                                    }
                                                    elseif ($row['status'] == 2){
                                                        echo "<span class='badge badge-danger'>Rejected</span>";
                                                    }
                                                    elseif ($row['status'] == 3){
                                                        echo "<span class='badge badge-secondary'>Done</span>";
                                                    }
                                                    
                                            $cnt++;	}
                                                ?>
                                                </td>
							 	
							 				<?php
							 			
							 			
							 		 ?>
							 		
							 	</tr>

							 </tbody>
						</table>
                        </div>
                    </div>
                                    </section>
	
  
  
  <script src="js/jquery.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
  <script>
	CKEDITOR.replace('descriptions');
  </script>

  <script>
            // add active class in selected list item
            let list = document.querySelectorAll('.list');
            for (let i = 0; i < list.length; i++) {
                list[i].onclick = function () {
                    let j = 0;
                    while (j < list.length) {
                        list[j++].className = 'list';

                    }
                    list[i].className = 'list active';
                }
            }

        </script>
</body>
</html>
