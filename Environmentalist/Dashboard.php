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
        background: linear-gradient(115deg, #c17afc 10%, #f42e78 90%);
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
        background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%);
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
        
        .badge{
            color:black;
            padding:10px;
            font-size:1rem;
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
                <h3>Environmentalist</h3>
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
                <div class="welcome" style="background: url('../uploads/welcome.png') no-repeat; border-radius:20px; height:200px; border:solid black; padding:20px;">
                    <hr class="mt-0 mb-4"> 
                    <h1 style='Text-align:center;font-weight:bold; color:#000000;'>Welcome Back  </h1>
                    <h1 style='Text-align:center;font-weight:bold; color:#000000;'><?php echo $row['firstname']; ?>  <?php echo $row['lastname']; ?></h1>

                   
                </div>
                <br><br>
                <div class="row">
        
                    <!-- Cards  -->
                    <div class="col-xl-3 col-md-6 mb-4 ">
                        <div class="card border-left-dark shadow h-100 py-2 card bg-primary" style='padding:10px;'>
                            <div class="card-body ">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold  text-uppercase mb-1">
                                            Plastic</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                $sql = "SELECT * FROM recyclable_items_stock WHERE material_type = 'Plastic' &&  username='".$_SESSION['username']."'";
                                                $que = mysqli_query($con,$sql);
                                                $total = 0;
                                                while ($result = mysqli_fetch_assoc($que)) {
                                                    $amount = $result['amount'];
                                                    $total = $total + $amount;
                                                }
                                                echo $total;
                                            ?>  KG
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-bottle-water fa-4x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4 ">
                        <div class="card border-left-primary shadow h-100 py-2 card bg-info" style='padding:10px;'>
                            <div class="card-body ">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold  text-uppercase mb-1">
                                           Glass</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                $sql = "SELECT * FROM recyclable_items_stock WHERE material_type = 'Glass' &&  username='".$_SESSION['username']."'";
                                                $que = mysqli_query($con,$sql);
                                                $total = 0;
                                                while ($result = mysqli_fetch_assoc($que)) {
                                                    $amount = $result['amount'];
                                                    $total = $total + $amount;
                                                }
                                                echo $total ;
                                            ?>  KG
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-wine-glass fa-4x text-gray-300"></i>                                   
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4 ">
                        <div class="card border-left-primary shadow h-100 py-2 card bg-warning" style='padding:10px;'>
                            <div class="card-body ">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold  text-uppercase mb-1">
                                            Paper</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                $sql = "SELECT * FROM recyclable_items_stock WHERE material_type = 'Paper' &&  username='".$_SESSION['username']."'";
                                                $que = mysqli_query($con,$sql);
                                                $total = 0;
                                                while ($result = mysqli_fetch_assoc($que)) {
                                                    $amount = $result['amount'];
                                                    $total = $total + $amount;
                                                }
                                                echo $total;
                                            ?>  KG
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-sheet-plastic fa-4x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4 ">
                        <div class="card border-left-primary shadow h-100 py-2 card bg-secondary" style='padding:10px;'>
                            <div class="card-body ">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold  text-uppercase mb-1">
                                            Cardboard</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                $sql = "SELECT * FROM recyclable_items_stock WHERE material_type = 'Cardboard' &&  username='".$_SESSION['username']."'";
                                                $que = mysqli_query($con,$sql);
                                                $total = 0;
                                                while ($result = mysqli_fetch_assoc($que)) {
                                                    $amount = $result['amount'];
                                                    $total = $total + $amount;
                                                }
                                                echo $total;
                                            ?>  KG
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-box-archive fa-4x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-6'>
                        <div class="card border-left-primary shadow h-100 py-2 card bg-danger" style='padding:10px;'>
                            <div class="card-body ">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold  text-uppercase mb-1">
                                            Requested Events</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                $sql = "SELECT * FROM events WHERE  username='".$_SESSION['username']."'";
                                                $que = mysqli_query($con,$sql);
                                                $total = 0;
                                                while ($result = mysqli_fetch_assoc($que)) {
                                                    $total = $total + 1;
                                                }
                                                echo $total;
                                            ?>  
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-calendar fa-4x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-6' >
                        <div class="card border-left-primary shadow h-100 py-2 card bg-success" style='padding:10px;'>
                            <div class="card-body ">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold  text-uppercase mb-1">
                                            Approved Events</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                $sql = "SELECT * FROM events WHERE status = 1 && username='".$_SESSION['username']."'";
                                                $que = mysqli_query($con,$sql);
                                                $total = 0;
                                                while ($result = mysqli_fetch_assoc($que)) {
                                                    $total = $total + 1;
                                                }
                                                echo $total;
                                            ?>  
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-calendar-check fa-4x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br><br><br><hr class="mt-2 mb-4"> <br><br><br>

<!-- ################################################################################################################### -->

                    <!-- Profile Card -->
                    <div class="card " style='padding:20px;text-align:center; background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%);font-weight:bold; border-radius:20px; border-style: solid;' >
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

                    <div class="row" style='padding-left:15px;' >
                        <div class="col">
                            <!-- Collapsable Card Example -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collection" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collection">
                                    <center>
                                        <h6 class="m-0 font-weight-bold text" style='font-size:1.5rem;'>Collection Overview</h6>
                                    </center>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collection">
                                    <div class="card-body">
                                        <?php

                                            $con = mysqli_connect("localhost","root","","ez_recycling");

                                            $sql = "SELECT * FROM recyclable_items_stock WHERE username='".$_SESSION['username']."'";
                                            $query_run = mysqli_query($con,$sql);

                                        ?>            
                                        <table id='datatableid' style='border-color:black;'class="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Type of Material</th>
                                                    <th scope="col">Amount (Kg)</th>
                                                    <th scope="col">Description</th>
                                                </tr>
                                            </thead>
                                            <?php
                                                if($query_run)
                                                {
                                                    foreach($query_run as $row)
                                                    {
                                            ?>
                                                <tbody>
                                                    <tr>
                                                    <td><?php echo $row['Recycle_stockID']; ?></td>
                                                    <td><?php echo $row['date']; ?></td>
                                                    <td><?php echo $row['material_type']; ?></td>
                                                    <td><?php echo $row['amount']; ?> Kg</td>
                                                    <td><?php echo $row['description']; ?></td>
                                                    </tr>
                                                </tbody>
                                            <?php    
                                                    }
                                                } 
                                                else
                                                {
                                                    echo "No Record Found";
                                                }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <br>

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
                                <h6 class="m-0 font-weight-bold text" style='font-size:1.5rem;'>Request Events Overview</h6>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              <br>
              
             
<!-- ################################################################################################################### -->

                    <!-- Delivery -->
           
            <div class="row" >
                <div class="col">
                    <!-- Collapsable Card Example -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#Delivery" class="d-block card-header py-3" data-toggle="collapse"
                            role="button" aria-expanded="true" aria-controls="Event">
                            <center>
                                <h6 class="m-0 font-weight-bold text" style='font-size:1.5rem;'>Delivery Overview</h6>
                            </center>                                
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="Delivery">
                            <div class="card-body">
                                <section id="post" style='border-radius:10px; border:solid black;background: linear-gradient(125deg, #04A5E2 30%, #00FC08 70%); font-weight:bolder;'>      
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

                                                    $sql = "SELECT * FROM delivery WHERE  username='".$_SESSION['username']."'";
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
                                                    <td  >
                                                        <?php  
                                                            if ($row['status'] == 'Pending') {
                                                                echo "<span style='border:solid black; color:black; padding:5px; font-size:1rem;' class='badge badge-danger'>Pending</span>";
                                                            }
                                                            else{
                                                                echo "<span style='border:solid black; color:black; padding:5px; font-size:1rem;' class='badge badge-success'>Delivered</span>";
                                                            } ?>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              <br>
             
<!-- ################################################################################################################### -->

                    <!-- Events Joined -->
           
            <div class="row" >
                <div class="col">
                    <!-- Collapsable Card Example -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#Events" class="d-block card-header py-3" data-toggle="collapse"
                            role="button" aria-expanded="true" aria-controls="Event">
                            <center>
                                <h6 class="m-0 font-weight-bold text" style='font-size:1.5rem;'>Events Joined</h6>
                            </center>                                
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="Events">
                            <div class="card-body">
                                <div class="container">
                                    <!-- Table -->
                                    <div class="container" style='background: linear-gradient(115deg, #c17afc 10%, #f42e78 90%); font-weight:bolder;       border-radius:10px; border:solid black;'>
                                        
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
                                                            include("dbcon.php");
                                                            
                                                            $sql = "SELECT * FROM events, participant WHERE participant.username = '".$_SESSION['username']."' AND events.Event_Name = participant.Event_Name";
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              <br>














            
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
            
