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
    <title>Request Event</title>
    
    <script src="https://kit.fontawesome.com/8557daf5de.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="bootstrap.css">


    <style>

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
        .badge{
            color:black;
            padding:10px;
            font-size:1rem;
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
                <li class="list_active ">
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
                <li class="list ">
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
        <div class="mainbox animate-in">
            <div  class="content">
                <strong><h1 style='font-weight:bold;text-align:center;'> Request Events</h1></stcorong>
                <br>               
                <!--This is section-->
                <section id="sections" class="py-4 mb-4 bg-faded">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="#" class="btn btn-primary btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#RequestModal"><i class="fa fa-plus"></i> Request Events</a>
                            </div>
                            <div class="col-md-3">
                                <a href="#" class="btn btn-warning btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#PendingModal"><i class="fa fa-spinner"></i> Pendings</a>
                            </div>
                            <div class="col-md-3">
                                <a href="#" class="btn btn-success btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#ApproveModal"><i class="fa fa-check"></i> Approved Events</a>
                            </div>
                            <div class="col-md-3">
                                <a href="#" class="btn btn-danger btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#RejectedModal"><i class="fa fa-xmark"></i> Rejected Events</a>
                            </div>
                        </div>
                    </div>
                
                </section>

<!-- ################################################################################################################# -->

                <!----Display events ---->
                <section id="post">
                    <div class="container">
                        <div class="row">
                        <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <th>#</th>
                                            <th>Event Name</th>
                                            <th>Venue</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Capacity</th>
                                            <th>Description</th>
                                            <th>Pictures</th>
                                            <th>Status</th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                include("dbcon.php");
                                                $sql = "SELECT * FROM events WHERE username='".$_SESSION['username']."'";
                                                $que = mysqli_query($con,$sql);
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
                                                <td><?php echo  "<img src=../uploads/".$result['event_pic'].' width=100px height="100px">'  ; ?></td>
                                                        

                                                <td>
                                                    <?php 
                                                    if ($result['status'] == 0) {
                                                        echo "<span class='badge badge-warning'>Pending</span>";
                                                    }
                                                    elseif ($result['status'] == 1){
                                                           echo "<span class='badge badge-success'>Approved</span>";
                                                    }
                                                    elseif ($result['status'] == 2){
                                                        echo "<span class='badge badge-danger'>Rejected</span>";
                                                    }
                                                    elseif ($result['status'] == 3){
                                                        echo "<span class='badge badge-primary'>Done</span>";
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
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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
                                <form action="uploadevent.php" method="post" enctype="multipart/form-data" name="req-event">
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

                <!--Pending Modal-->
                <div class="modal fade" id="PendingModal">
                    <div class="modal-dialog modal-lg" style="margin-left: 500px;">
                        <div class="modal-content">
                            <div class="modal-header bg-warning text-white">
                                <div class="modal-title">
                                    <h5>Pending Request</h5>
                                </div>
                                <button class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div class="modal-body">
                            <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <th>#</th>
                                            <th>Event Name</th>
                                            <th>Venue</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Capacity</th>
                                            <th>Description</th>
                                            <th>Pictures</th>
                                            <th>Status</th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $sql = "SELECT * FROM events WHERE status = 0 && username='".$_SESSION['username']."'";

                                                $que = mysqli_query($con,$sql);
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
                                                <td><?php echo  "<img src=../uploads/".$result['event_pic'].' width=100px height="100px">'  ; ?></td>
                                                        

                                                <td>
                                                    <?php 
                                                    if ($result['status'] == 0) {
                                                        echo "<span class='badge badge-warning'>Pending</span>";
                                                    }
                                                    elseif ($result['status'] == 1){
                                                        echo "<span class='badge badge-success'>Approved</span>";
                                                    }
                                                    elseif ($result['status'] == 2){
                                                        echo "<span class='badge badge-danger'>Rejected</span>";
                                                    }
                                                    
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

<!-- ################################################################################################################# -->

                <!-- Approve Modal -->
                <div class="modal fade" id="ApproveModal">
                    <div class="modal-dialog modal-lg" style="margin-left: 500px;">
                        <div class="modal-content">
                            <div class="modal-header bg-success text-white">
                                <div class="modal-title">
                                    <h5>Approved Request</h5>
                                </div>
                                <button class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <th>#</th>
                                        <th>Event Name</th>
                                        <th>Venue</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Capacity</th>
                                        <th>Description</th>
                                        <th>Pictures</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $sql = "SELECT * FROM events WHERE status = 1 && username='".$_SESSION['username']."'";
                                            $que = mysqli_query($con,$sql);
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
                                            <td><?php echo  "<img src=../uploads/".$result['event_pic'].' width=100px height="100px">'  ; ?></td>
                                                    

                                            <td>
                                                <?php 
                                                if ($result['status'] == 0) {
                                                    echo "<span class='badge badge-warning'>Pending</span>";
                                                }
                                                elseif ($result['status'] == 1){
                                                    echo "<span class='badge badge-success'>Approved</span>";
                                                }
                                                elseif ($result['status'] == 2){
                                                    echo "<span class='badge badge-danger'>Rejected</span>";
                                                }
                                                
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


<!-- ########################################################################################################################### -->

                <!-- Rejected Modal -->
                <div class="modal fade" id="RejectedModal">
                    <div class="modal-dialog modal-lg" style="margin-left: 500px;">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <div class="modal-title">
                                    <h5>Rejected Request</h5>
                                </div>
                                <button class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <th>#</th>
                                        <th>Event Name</th>
                                        <th>Venue</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Capacity</th>
                                        <th>Description</th>
                                        <th>Pictures</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $sql = "SELECT * FROM events WHERE status = 2 && username='".$_SESSION['username']."'";
                                            $que = mysqli_query($con,$sql);
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
                                            <td><?php echo  "<img src=../uploads/".$result['event_pic'].' width=100px height="100px">'  ; ?></td>
                                                    

                                            <td>
                                                <?php 
                                                if ($result['status'] == 0) {
                                                    echo "<span class='badge badge-warning'>Pending</span>";
                                                }
                                                elseif ($result['status'] == 1){
                                                    echo "<span class='badge badge-success'>Approved</span>";
                                                }
                                                elseif ($result['status'] == 2){
                                                    echo "<span class='badge badge-danger'>Rejected</span>";
                                                }
                                                
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
