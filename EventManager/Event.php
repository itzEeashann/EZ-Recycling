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
    <title>Events Page</title>
    
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
                <li class="list_active ">
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
                <div class="container">
            
                <br>               
                <!--This is section-->

                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="#" class="btn btn-primary btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#RequestModal"><i class="fa fa-plus"></i> New Event</a>
                            </div>
                        </div>
                    </div>
                
                </section>

<!-- ################################################################################################################# -->



<!-- ################################################################################################################# -->

                <!-- Request event Modal -->
                <!-- Header Post -->
                <div class="modal fade" id="RequestModal">
                    <div class="modal-dialog modal-lg" style="margin-left: 500px;">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <div class="modal-title">
                                    <h5>Request Events</h5>
                                </div>
                                <button class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="newevent.php" method="post" enctype="multipart/form-data" name="req-event">
                                    <div class="form-group">
                                        <label class="form-control-label">Event Name</label>
                                        <input type="text" name="Event_Name" class="form-control" required/>
                                        <label class="form-control-label">Venue</label>
                                        <input type="text" name="Venue" class="form-control" required/>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="form-control-label">Date</label>
                                        <input type="date" name="Date" class="form-control" required/>
                                    </div>
                                    <div>
                                        <label class="form-control-label">Time</label>
                                        <input type="text" name="Time" class="form-control" required/>
                                        <label class="form-control-label">Capacity</label>
                                        <input type="text" name="capacity" class="form-control" required/>

                                    </div>
                                    <div class="form-group" required>
                                        <label>Description</label>
                                        <textarea name="descriptions" class="form-control" required placeholder='Event Description'></textarea>
                                    </div>
                                    <div>
                                        <label class="form-control-label">Pictures</label>
                                        <input type="file" name="event_pic" class="form-control" required/>
                                        <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                                    </div>
                                                                                    

                                    <div class="modal-footer">
                                        <button class="btn btn-danger" style="border-radius:0%;" data-dismiss="modal">Close</button>
                                        <input type="hidden" name="status" value="0">
                                        <input type="submit" class="btn btn-success" style="border-radius:0%;" name = 'apply'value="Apply">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

  <!-- ################################################################################################################# -->


 
  

    <!-- ############################################################################################3 -->

                    <div class="row mt-2 pb-3 ml-3  " >
                    <?php
                            include 'dbcon.php';
                            $stmt = $con->prepare('SELECT * FROM events where status=1');
                            $stmt->execute();
                            $result = $stmt->get_result();
                            while ($row = $result->fetch_assoc()):
                        ?>
                        <div class="card" style="width: 18rem; margin:1rem;padding:20px; border:solid black; border-radius:20px;background: linear-gradient(135deg, #c7f800 10%, #00ff77 90%);">
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