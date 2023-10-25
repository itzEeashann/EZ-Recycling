<?php
include('protected.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body {
            height: 900px;
            background-color: #303952;
        }
        
        main{
            height: 50px;
            margin: 0 0 4% 24%;
            padding-top: 2%; 
            font-family: system-ui;
            color: white;
            width: 60%;
            font-size: 40px;
        }

        section{
            margin-left: 48px;
        }

        .container{
            height: 570px;
            width: 1000px;
            margin: 1% 0 0 20%;
        }
        
        .box {
            height: 160px;
            width: 250px;
            float: left;
            margin: 0 1% 5% 5%;
            background-color: #010e24;
            border-radius: 15px;
            text-align: center;
            padding: 50px 0 0 0;
        }

        .link {
            font-family: system-ui;
            font-size: 30px;
            font-weight: bold;
        }

        a.link:hover {
            color: white;
        }
    </style>
</head>

<body>
    <?php include_once("adminheader.php");?>
    <section>
        <main>
            <svg xmlns="http://www.w3.org/2000/svg" color="white" width="30px" height="30px" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
            </svg>
            <span>Dashboard</span>
        </main>
        <nav class="container"> 
            
            <div class="box">
                <a href="recyclable_item_list.php" class="link">Recyclable Item</a>
            </div>

            <div class="box">
                <a href="product_list.php" class="link">End Product</a>
            </div>
            
            <div class="box">
                <a href="order_list.php" class="link">Order Info</a>
            </div>

            <div class="box">
                <a href="delivery_list.php" class="link">Delivery</a>
            </div>

            <div class="box">
                <a href="event_list.php" class="link">Event</a>
            </div>

            <div class="box">
                <a href="participant_list.php" class="link">Event Participant</a>
            </div>

            <div class="box">
                <a href="account_list.php" class="link">Account</a>
            </div>

            <div class="box">
                <a href="report.php" class="link">Report</a>
            </div>
        </nav>
	</section>
</body>
</html>