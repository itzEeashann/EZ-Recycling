<?php
session_start();
    include('db.php'); 

	if (isset($_SESSION['username'])) {
		$result = mysqli_query($conn,"SELECT * from accounts where username='".$_SESSION['username']."'");
        $row = mysqli_fetch_array($result);
	}


    if(isset($_POST["updateBtn"])){
	include("db.php");
    $username = $_POST['username'];
	$sql= "UPDATE accounts SET 
	username='$_POST[username]', 
	firstname='$_POST[firstname]',
	lastname='$_POST[lastname]',
	email='$_POST[email]', 
	contact='$_POST[contact]', 
	address='$_POST[address]',
	password='$_POST[password]'
	WHERE username= '$username'";
	if (mysqli_query($con, $sql)) {
	mysqli_close($con);
	echo "<script>alert('Record updated!'); window.location.href='profile.php';</script>";
	}
	else {echo "<script>alert('Record Failed!'); </script>";}
	}
?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width,
    initial-scale=1.0">
    <title>Edit-Profile</title>
    <script src="https://kit.fontawesome.com/8557daf5de.js" crossorigin="anonymous"></script>



    
</head>
    <link rel="stylesheet" href="css/navbar.css">


    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>


    <style type="text/css">
        /* navbar css */
        body{
            background: rgb(174, 151, 205);
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

        /* content css */
        .img-account-profile {
            height: 10rem;
            width:10rem;
        }
        .rounded-circle {
            border-radius: 50% !important;
        }

        .card .card-header {
            font-weight: 500;
            align-items: center;
        }
        .card-header:first-child {
            border-radius: 0.35rem 0.35rem 0 0;
        }
        .card-header {
            padding: 1rem 1.35rem;
            margin-bottom: 0;
            background-color: rgb(232, 141, 139);
            border-bottom: 1px solid rgba(33, 40, 50, 0.125);
            text-align: center;
            font-size:1.5rem;
        }

        .card-body{
            background:
        }

        .form-control, .dataTable-input {
            display: grid;
            width: 100%;
            padding: 0.875rem 1.125rem;
            margin:0;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1;
            color: #000000;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #c5ccd6;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.35rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            margin:5px;
            width:250px;
        }

        .nav-borders .nav-link.active {
            color: #0061f2;
            border-bottom-color: #0061f2;
        }
        .nav-borders .nav-link {
            color: #69707a;
            border-bottom-width: 0.125rem;
            border-bottom-style: solid;
            border-bottom-color: transparent;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            padding-left: 0;
            padding-right: 0;
            margin-left: 1rem;
            margin-right: 1rem;
        }
        .btn-primary{color:#fff;background-color:#465ae5;border-color:#000000; width:250px; margin:5px;}
        .btn-primary:hover{color:#fff;background-color:#953ce0;border-color:#000000}

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
                <li class="list_active ">
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
        <div class="mainbox">
            <div class="content">
                <?php
                    include("dbcon.php");
                    $username = $_POST['username'];
                    $result = mysqli_query($conn,
                    "SELECT * FROM accounts WHERE username='$username'");
                    $row = mysqli_fetch_array($result);
                ?>
                <div class="animate-in">
                <div class="container-xl px-4 mt-4">
                    <hr class="mt-0 mb-4">
                    <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <div class="card mb-4 mb-xl-0">
                                <div class="card-header">Profile Picture</div>
                                <form class="card-body text-center" action="uploadfile.php" method="post" enctype="multipart/form-data">
                                    <!-- Profile picture image-->
                                    <img class="img-account-profile rounded-circle mb-2" src="../uploads/<?php echo $row['picture']; ?>">
                                    <!-- Profile picture help block-->
                                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                    <!-- Profile picture upload button-->
                                    <input class="btn btn-primary" type="file" value="Upload new image" name="pic">
                                    <input type="hidden" name="username" value="<?php echo $username; ?>">
                                    <input class="btn btn-primary" type="submit" value="Save">
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                    <div class="card-header">Account Details</div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (username)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="username1">Username</label>
                                                    <input class="form-control" username="username" name='username1' placeholder="Enter your Username" value="<?php echo $row["username"] ?>" disabled ='disabled' >
                                                    <input type="hidden" name="username" value="<?php echo $username;?>">
                                                </div>
                                                <!-- Form Group (password)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="password">Password</label>
                                                    <input class="form-control" username="password" name='password' placeholder="Enter your Password" value="<?php echo $row["password"] ?>" required>
                                                </div>          
                                            </div>
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (first name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="firstname">First name</label>
                                                    <input class="form-control" username="firstname" name='firstname' placeholder="Enter your First Name" value="<?php echo $row["firstname"] ?>" required>
                                                </div>
                                                <!-- Form Group (last name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="lastname">Last name</label>
                                                    <input class="form-control" username="lastname" name='lastname' placeholder="Enter your Last Name" value="<?php echo $row["lastname"] ?>" required>
                                                </div>
                                            </div>
                                                <!-- Form Group (address)-->
                                                <div class="col-6    ">
                                                    <label class="small mb-1 col-6" for="address">Address</label>
                                                    <input class="form-control" username="address" name='address' placeholder="Enter your Address" value="<?php echo $row["address"] ?>" required>
                                                </div>
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (phone number)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="contact">Phone number</label>
                                                    <input class="form-control" username="contact" name='contact' type='integer' placeholder="Enter your phone number" value="<?php echo $row["contact"] ?>" required>
                                                </div>
                                                <!-- Form Group (Email)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="email">Email</label>
                                                    <input class="form-control" username="email" name='email' type='email' placeholder="Enter your Email" value="<?php echo $row["email"] ?>" required>
                                                </div>
                                            </div>
                                                                     
                                            <!-- Save changes button-->
                                            <input type="submit"name="updateBtn" class="btn btn-primary" value="Update">
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

                
                



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