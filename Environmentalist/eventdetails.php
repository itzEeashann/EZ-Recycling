<?php
include('dbcon.php'); 
	include('../inc/session.php'); 

	if (isset($_SESSION['username'])) {
		$sql = mysqli_query($con,"select * from accounts where username='".$_SESSION['username']."'");
        $row = mysqli_fetch_array($sql);
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Event Details</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="navbar.css">
    <script src="https://kit.fontawesome.com/8557daf5de.js" crossorigin="anonymous"></script>


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
                <li class="list_active ">
                    <a href="Event.php">
                        <span class="icon"><i class="fa-solid fa-calendar-check"></i></span>
                        <span class="title">Events</span>
                    </a>
                </li>
                <li class="list">
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
                <?php
                include("dbcon.php");
                $Event_ID = $_GET['GetID'];
                $sql = "SELECT * FROM events WHERE Event_ID='".$Event_ID ."'";
                $que = mysqli_query($con,$sql);
                $result = mysqli_fetch_assoc($que)           
                ?>
                <div class="card " style='padding:20px;text-align:center; background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%);font-weight:bold; border-radius:20px; border-style: solid;' >
                    <h3 class="card-title " style='Text-align:center;font-weight:bold;'>Event Details</h3><hr class="mt-0 mb-4">
                        <div class="row g-0">
                            
                            <div class="col-md-4" >
                             <img style='border-radius:20px border:solid black;'src="../uploads/<?=$result['event_pic']?>" width="500" height="500" alt="<?=$result['Event_Name']?>">
                            </div>
                            <div class="col-md-8" style='padding-top:30px;padding-left:200px; text-align:left;font-size:2rem'>
                                
                                <form id='#joinevent' method="post" enctype="multipart/form-data">


                                    <div class="card-body" style='font-size:1.5rem'>
                                        <!-- Event name -->
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-4">
                                            <h10>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <h10>
                                        </div>
                                        <div class="col-md-8">
                                            <?=$result['Event_Name'];?><h10>
                                        </div>
                                    </div>
                                    <!-- Event Venue -->
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-4">
                                        <h10>Venue&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                        </div>
                                        <div class="col-md-8">
                                            <?=$result['Venue'];?><h10>
                                        </div>
                                    </div>
                                    <!-- Event Date -->
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-4">
                                            <h10>Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <h10>
                                        </div>
                                        <div class="col-md-8">
                                            <?=$result['Date'];?><h10>
                                        </div>
                                    </div>
                                    <!-- Event Time -->
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-4">
                                            <h10>Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <h10>
                                        </div>
                                        <div class="col-md-8">
                                            <?=$result['Time'];?><h10>
                                        </div>
                                    </div>
                                    <!-- Event Capacity -->
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-4">
                                            <h10>Capacity&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <h10>
                                        </div>
                                        <div class="col-md-8">
                                            <?=$result['capacity'];?><h10>
                                        </div>
                                    </div>
                                    <!-- Event Descriptions -->
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-4">
                                            <h10>Descriptions&nbsp;: <h10>
                                        </div>
                                        
                                    
                                        <div class="col-md-8">
                                            <h11 style='font-size:1.3rem'><?=$result['descriptions'];?></h11>
                                        </div><br><br><br>
                                    </div>
                                        <input type="hidden" name="Event_Name" value="<?=$result['Event_Name'];?>"> 
                                        <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                                        <input type="hidden" name="email" value="<?=$row['email'];?>"> 
                                        <input type="hidden" name="contact" value="<?=$row['contact'];?>"> 

                                        <center><input type="submit" class="btn btn-success" style="border-radius:10%; font-size:2rem; font-weight:700;border:solid black;width:200px;" name = 'joinevent'value="Join"></center>
                                </form>
                                
        </div>
    </div>
</body>

</html>

<?php 
    include('dbcon.php');
    

    if (isset($_POST['joinevent']))
      { 
      $Event_Name = $_POST['Event_Name'];
      $username = $_POST['username'];
      $email = $_POST['email'];
      $contact = $_POST['contact'];
      $sql = "INSERT INTO participant (Event_Name,username,email,contact)
          VALUES 
          ('$Event_Name','$username','$email', '$contact')";
      $run = mysqli_query($con,$sql);
      if($run == true)
          {
        echo "<script> alert('Event Joined');
              
              window.open('Event.php','_self');</script>";
      }else{
        echo "<script> 
        alert('Event Already Joined');
        window.open('Event.php','_self');
        </script>";
      }
    }
?>