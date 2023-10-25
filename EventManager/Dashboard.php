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
    <title>Environmentalist</title>
    <script src="https://kit.fontawesome.com/8557daf5de.js" crossorigin="anonymous"></script></head>
    <link rel="stylesheet" href="navbar.css">
    <!-- <link rel="stylesheet" href="bootstrap.css"> -->
    <link rel="stylesheet" href="bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
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

    .accordion-button {
        background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%);
        font-weight:bold;

    }
    .card-header {
        background: linear-gradient(115deg, #c7f800 10%, #078513 90%);
        font-weight:bold;
    }
    .section .container{
        background:white;
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
                <h1><?php echo $_SESSION['username'];?> </h1>
                <h3>Event Manager</h3>
                
                
            </div>
            <ul>
                <li class="list_active ">
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
                            <button class="exit_btn" onclick="location.href='../inc/testlogout.php'" type="button"><i class="fa-solid fa-right-from-bracket"></i> </button>
                    </a>
                </li>
                </center>
            </ul>
        </div>
    </div>
    <div class="official " >
        <div class="mainbox animate-in" >
            <div class="content">
                <center>
                <div class="welcome" style="background: url('../uploads/green.jpg') no-repeat; border-radius:20px; height:200px; width:700px; border:solid black; padding:20px;">
                    <hr class="mt-0 mb-4"> 
                    <h1 style='Text-align:center;font-weight:bold; color:#000000;'>Welcome Back  </h1>
                    <h1 style='Text-align:center;font-weight:bold; color:#000000;'>Event Manager</h1>

                   
                </div></center>
                <br><br>
                

<!-- ################################################################################################################### -->

                    <!-- Profile Card -->
                    <div class="card " style='padding:20px;text-align:center; background: linear-gradient(115deg, #c7f800 10%, #078513 90%);font-weight:bold; border-radius:20px; border-style: solid;' >
                    <h3 class="card-title " style='Text-align:center;font-weight:bold;'>Profile</h3><hr class="mt-0 mb-4">
                        <div class="row g-0">
                            
                            <div class="col-md-4">
                                <img class="img-account-profile rounded-circle  mb-2" style='height:300px; width:300px;border-style: solid;' src="../uploads/<?php echo $row['picture']; ?>" username="picture">
                            </div>
                            <div class="col-md-8">

                                <div class="card-body">
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (first name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="firstname">First name</label>
                                            <input class="form-control" name="firstname" placeholder="Enter your First Name" value="<?php echo $row['firstname'];?>" disabled="disabled">
                                        </div>
                                        <!-- Form Group (last name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="lastname">Last name</label>
                                            <input class="form-control" name="lastname" placeholder="Enter your Last Name" value="<?php echo $row['lastname'];?>" disabled="disabled">
                                        </div>
                                    </div><br>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (username)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="username1">Username</label>
                                            <input class="form-control" name="username1" placeholder="Enter your Username" value="<?php echo $row['username'];?>" disabled="disabled">
                                            <input type="hidden" name="username" value="<?php echo $row['username'];?>">
                                        </div>
                                        <!-- Form Group (Email)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="email">Email</label>
                                                <input class="form-control" name="email" placeholder="Enter your Email" value="<?php echo $row['email'];?>"disabled="disabled">
                                            </div>
                                        </div>
                                    </div>
                                    <div style='Text-align:center;'>
                                    <button class='bg-warning'style='border-radius:20px;padding:5px; width:300px;font-size:1.5rem;font-weight:bold;margin-top:10px;' onclick="location.href='profile.php'" type="button">View Full Profile</button>   
                                    
                                </div>
                            </div>
                        </div>
                    </div>

<!-- ################################################################################################################### -->

                    <!-- Collection -->

                    <br><br><br><br><br> 
                    <hr class="mt-4 mb-6"> 
                    <br><br><br><br><h2 style='Text-align:center;font-weight:bold;'>Overviews</h2>


<!-- ################################################################################################################### -->

                    <!-- Event -->
            
            <div class="row" >
                <div class="col">
                    <!-- Collapsable Card Example -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#Event" class="d-block card-header py-3" data-toggle="collapse"
                            role="button" aria-expanded="true" aria-controls="Event">
                            <center>
                                <h6 class="m-0 font-weight-bold text" style='font-size:1.5rem;'>Events Overview</h6>
                            </center>                                
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="Event">
                            <div class="card-body">
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
                                                            
                                                    $cnt++;	}
                                                        ?>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              <br>
              
             
<!-- ################################################################################################################### -->
           
 











            
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <script>
    // add active class in selected list item
        let list = document.querySelectorAll('.list');
        for (let i = 0; i < list.length; i++) {
            list[i].onclick = function () {
                let j = 0;
                while (j < list.length) {
                    list[j++].className='list';
                
                }
                list[i].className= 'list active';
            }
        }
    
    </script>


    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
            
