<?php 
session_start();
	include('db.php');  
	if (isset($_SESSION['username'])) {
		$result = mysqli_query($conn,"select * from accounts where username='".$_SESSION['username']."'");
        $row = mysqli_fetch_array($result);
	}
                        
?>

<head>
    <meta name="viewport" content="width=device-width,
initial-scale=1.0">
    <title>Profile</title>
    <script src="https://kit.fontawesome.com/8557daf5de.js" crossorigin="anonymous"></script>



    
</head>
    <link rel="stylesheet" href="css/navbar.css">


    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>


    <style type="text/css">
        /* navbar css */
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
            /* background-clip: padding-box; */
            border: 1px solid #c5ccd6;
            /* -webkit-appearance: none;
            -moz-appearance: none; */
            /* appearance: none; */
            border-radius: 0.35rem;
            /* transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out; */
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
        .btn-primary{color:#fff;background-color:#539C56;border-color:#539C56}
        .btn-primary:hover{color:#fff;background-color:#217424;border-color:#217424}

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
               
                <div class="animate-in">
                    <div class="container-xl px-4 mt-4">
                        <hr class="mt-0 mb-4">
                        <div class="row">
                            <div class="col-xl-4" style='margin-bottom:50px;'>
                                <!-- Profile picture card-->
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header">Profile Picture</div>
                                    <div class="card-body text-center" >
                                        <!-- Profile picture image-->
                                        <img style='border-style: solid' class="img-account-profile rounded-circle mb-2" src="../uploads/<?php echo $row['picture']; ?>" username="picture">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card-header">Account Details</div>
                                    <div class="card-body">
                                        <form action="editprofile.php" method="post">
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (username)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="username1">Username</label>
                                                    <input class="form-control" name="username1" placeholder="Enter your Username" value="<?php echo $row['username'];?>" disabled="disabled">
                                                    <input type="hidden" name="username" value="<?php echo $row['username'];?>">
                                                </div>
                                                <!-- Form Group (Password)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="password">Password</label>
                                                    <input class="form-control" placeholder="Enter your Password" value="<?php echo $row['password'];?>" disabled="disabled" type="password">
                                                </div>
                                            </div>
                                            <!-- Form Row-->
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
                                            </div>
                                                <!-- Form Group (address)-->
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="address">Address</label>
                                                    <input class="form-control" name="address" placeholder="Enter your Address" value="<?php echo $row['address'];?>"disabled="disabled">
                                                </div>
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (phone number)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="contact">Phone number</label>
                                                    <input class="form-control" name="contact" placeholder="Enter your phone number" value="<?php echo $row['contact'];?>"disabled="disabled">
                                                </div>
                                                <!-- Form Group (Email)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="email">Email</label>
                                                    <input class="form-control" name="email" placeholder="Enter your Email" value="<?php echo $row['email'];?>"disabled="disabled">
                                                </div>
                                            </div>
                                            <!-- Go to edit profile button-->
                                            <input type="submit" class="btn btn-primary" value="Edit Profile">
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