<?php 
session_start();
	include('db.php'); 

	if (isset($_SESSION['username'])) {
		$result = mysqli_query($conn,"select * from accounts where username='".$_SESSION['username']."'");
        $row = mysqli_fetch_array($result);
	}
                        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events Page</title>
    <script src="https://kit.fontawesome.com/8557daf5de.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/bootstrap.css">
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
                <h3>Member</h3>
            </div>
            <ul>
                <li class="list ">
                    <a href="Dashboard-Member.php">
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
                <li class="list_active ">
                    <a href="event.php">
                        <span class="icon"><i class="fa-solid fa-calendar-check"></i></span>
                        <span class="title">Events</span>
                    </a>
                </li>
                <li class="list ">
                    <a href="product.php">
                        <span class="icon"><i class="fa-solid fa-calendar-plus"></i></span>
                        <span class="title">Product</span>
                    </a>
                </li>
                <li class="list ">
                    <a href="query.php">
                        <span class="icon"><i class="fa-solid fa-recycle"></i></span>
                        <span class="title">Query</span>
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
                <center><h1 style='font-size:3rem; font-weight:bolder;'>Events Page</h1></center>
                <br><hr><br>
                <div class="container">
                     <!-- Table -->
                    <div class="container" style='background: linear-gradient(115deg, #c17afc 10%, #f42e78 90%); font-weight:bolder;       border-radius:10px; border:solid black;'>
                        <center><h3 style='margin-top:10px;font-size:2rem; font-weight:600;padding:10px; background-color:orange;border:solid black; width:300px; border-radius:20px;'>Events Joined</h3></center>
                        <div class="card-body" style='padding:20px; ' >
                            <div class="row" >         
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <th>#</th>
                                        <th>Event Name</th>
                                        <th>Venue</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Capacity</th>
                                        <th>Description</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            include("db.php");
                                            
                                            $sql = "SELECT * FROM events, participant WHERE participant.username = '".$_SESSION['username']."' AND events.Event_Name = participant.Event_Name";
                                            $que = mysqli_query($conn,$sql);
                                            $cnt=1;
                                            while ($result = mysqli_fetch_assoc($que)) {
                                            ?>
                                            
                                            
                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo $result['Event_Name']; ?></td>
                                            <td><?php echo $result['Venue']; ?></td>
                                            <td><?php echo $result['Date']; ?></td>
                                            <td><?php echo $result['Time']; ?></td>
                                            <td><?php echo $result['capacity']; ?></td>
                                            <td><?php echo $result['descriptions']; ?></td>
                                            
                                            <?php 
                                                
                                        $cnt++;	}
                                            ?>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

    <!-- ############################################################################################3 -->
                    <hr >
                    <div class="row mt-2 pb-3 ml-3  " >
                    <?php
                            include 'db.php';
                            $stmt = $conn->prepare('SELECT * FROM events where status=1');
                            $stmt->execute();
                            $result = $stmt->get_result();
                            while ($row = $result->fetch_assoc()):
                        ?>
                        <div class="card" style="width: 18rem; margin:1rem;padding:20px; border:solid black; border-radius:20px;background: linear-gradient(135deg, #c17afc 10%, #f42e78 90%);">
                            <img style="width: 15rem;height: 10rem; " src="../uploads/<?= $row['event_pic'] ?>" class="card-img-top mb-2" alt="Event Pic">
                            <div class="card-body">
                                <h5 class="card-title text-center" ><?= $row['Event_Name'] ?></h5>
                                <p class="card-text" style="text-align:left;">
                                    <h5 style='margin-bottom:10px;'>Venue : &nbsp;&nbsp;<?= $row['Venue'] ?></h5>
                                    <h5 style='margin-bottom:10px;'>Date &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;<?= $row['Date'] ?></h5>
                                    <h5 style='margin-bottom:10px;'>Time &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;<?= $row['Time'] ?></h5>
                                </p>
                                <br>
                                <center>
                                <a style='border-radius:10px;'href="eventdetails.php?GetID=<?php echo $row['Event_ID'] ?>" class="btn btn-warning ">View Event Details</a></center>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
                    


                








