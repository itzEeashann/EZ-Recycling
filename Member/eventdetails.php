<?php
session_start();
include('db.php'); 

	if (isset($_SESSION['username'])) {
		$sql = mysqli_query($conn,"select * from accounts where username='".$_SESSION['username']."'");
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
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/navbar.css">
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
        <div class="mainbox animate-in">
            <div  class="content">
    <?php
    include("dbcon.php");
    $Event_ID = $_GET['GetID'];
    $sql = "SELECT * FROM events WHERE Event_ID='".$Event_ID ."'";
    $que = mysqli_query($conn,$sql);
    $result = mysqli_fetch_assoc($que)           
    ?>
    <div class="product content-wrapper">
        <img src="../uploads/<?=$result['event_pic']?>" width="500" height="500" alt="<?=$result['Event_Name']?>">
        <div>
            <h1 class="name"><?$result['Event_Name']?></h1>
            <form id='#joinevent' method="post" enctype="multipart/form-data">
                <div class="description">
                    <h10>Venue: </h10><?=$result['Venue'];?>
                </div>
                <br>
                <br>
                <div class="description">
                    <h10>Date: </h10><?=$result['Date']?>
                </div>
                <br>
                <br>
                <div class="description">
                    <h10>Time: </h10><?=$result['Time']?>
                </div>
                <br>
                <br>
                <div class="description">
                    <h10>Capacity: </h10><?=$result['capacity']?>
                </div>
                <br>
                <br>
                <div class="description">
                    <h10>Descriptions : </h10><?=$result['descriptions']?>
                    
                </div>
                <br>
                    <input type="hidden" name="Event_Name2" value="<?=$result['Event_Name'];?>"> 
                    <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                    <input type="hidden" name="email" value="<?=$row['email'];?>"> 
                    <input type="hidden" name="contact" value="<?=$row['contact'];?>"> 

                    <input type="submit" class="btn btn-success" style="border-radius:0%;" name = 'joinevent'value="Join">
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
      $run = mysqli_query($conn,$sql);
      if($run == true)
          {
        echo "<script> alert('Event Joined');
              
              window.open('Event.php','_self');</script>";
      }else{
        echo "<script> 
        alert('Event Already Joined');
        </script>";
      }
    }
?>