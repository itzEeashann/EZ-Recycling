<?php 
	include('dbcon.php'); 
	include('../inc/session.php'); 

	if (isset($_SESSION['username'])) {
		$result = mysqli_query($con,"select * from accounts where username='".$_SESSION['username']."'");
        $row = mysqli_fetch_array($result);
	}
                        
?>





<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width,
initial-scale=1.0">
    <title>Collection</title>
    <script src="https://kit.fontawesome.com/8557daf5de.js" crossorigin="anonymous"></script>
</head>
<link rel="stylesheet" href="navbar.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">


<style>

body{
        background: lightgreen;
    }
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



<body >
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
                    <a href="EventStatus.php">
                        <span class="icon"><i class="fa-solid fa-calendar-plus"></i></span>
                        <span class="title">Events Status</span>
                    </a>
                </li>
                <li class="list_active ">
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
            <div class="content">
            <div class="row" >         
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Event Name</th>
                                        <th>Venue</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Capacity</th>
                                        <th>Description</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            include("dbcon.php");
                                            
                                            $sql = "SELECT * FROM events, participant WHERE events.Event_Name = participant.Event_Name";
                                            $que = mysqli_query($con,$sql);
                                            $cnt=1;
                                            while ($result = mysqli_fetch_assoc($que)) {
                                            ?>
                                            
                                            
                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo $result['username']; ?></td>
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
<!-- JS  -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js" ></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"> </script>   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

    
    

    



</body>
</html>

