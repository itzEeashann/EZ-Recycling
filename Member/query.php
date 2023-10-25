<?php 
session_start();
include('db.php'); 

if (isset($_SESSION['username'])) {
    $result = mysqli_query($conn,"select * from accounts where username='".$_SESSION['username']."'");
    $row = mysqli_fetch_array($result);
}
if(isset($_POST['myBtn']))
{	 
    $username = $_POST['username'];
    $query_type = $_POST['query_type'];
    $description = $_POST['description'];
        $sql = "INSERT INTO queries (username,query_type,description)
        VALUES ('$username','$query_type','$description')";
        if (mysqli_query($conn, $sql)) {
        echo ("<script LANGUAGE='JavaScript'> window.alert('Message Sent Successfully!'); window.location.href='query.php';</script>");
        } else {
        echo ("<script LANGUAGE='JavaScript'> window.alert('Message was unable to send!'); window.location.href='query.php';</script>");
        }
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
        body {font-family: Arial, Helvetica, sans-serif;}

        /* The Modal (background) */
        .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 200px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 40%;
        }

        /* The Close Button */
        .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        }

        .close:hover,
        .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
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
                <li class="list">
                    <a href="Profile.php">
                        <span class="icon"><i class="fa-solid fa-user"></i></span>
                        <span class="title">Profile</span>
                    </a>
                </li>
                <li class="list ">
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
                <li class="list_active ">
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
    <?php
      include_once('db.php');
      $query="SELECT * FROM queries WHERE username='".$_SESSION['username']."';";
      $result= mysqli_query($conn, $query);
    ?>
    <div class="official">
        <div class="mainbox animate-in" >
            <div class="content">
                <center><h1 style='font-size:3rem; font-weight:bolder;'>Query Page</h1></center>
                <br><hr><br>
                <div class="container">
                <form method="post">
        <h3>Drop Us a Message</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="query_type" class="form-control" placeholder="Enter either Suggestion, Report, Question *" value="" />
                </div>
                <div class="form-group">
                    <input type="hidden" name="username" class="form-control" placeholder="Enter your username*" value="<?php echo $_SESSION['username'];?>" />
                </div>
                <div class="form-group">
                    <input type="button" class="btn btn-success" id="myBtn" value="View Feedback"/>
                </div>
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <p>
                            <?php
                                while($row=mysqli_fetch_assoc($result))
                                {
                                ?>
                                        <td><?php echo $row['feedback'] ?></td>
                                <?php  
                                }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <textarea name="description" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="myBtn" class="btn btn-success" value="Send Message" />
                </div>
            </div>
        </div>
    </form>
    <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
    </script>
</body>
<!-- ############################################################################################3 -->

       





