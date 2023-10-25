<?php
include('protected.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <meta charset="UTF-8">
    <title>View Event Participant Details</title>
    <style>
        body {
			height: 100%;
			margin: 0;
			background-color: #303952
		}

        #main-content {
			width: 70%;
			display: inline-block;
			margin-left: 24%;
            height: 50px;
            padding-top: 2%; 
            font-family: system-ui;
            color: white;
            font-size: 40px;
		}
       
        .box {
            width: 100%;
            display: flex; 
            border: black;
        }

        .profile-image {
            width: 60%;
            height: 360px;
            background-color: white;
            margin-right: 25px;
            border-radius: 30px;
            border: 1.5px solid black;
        }

        .title {
            margin: 5px 20px;
            width: 500px;
            font-weight: bold;
            font-size: 29px;
            color: black;
        }

        .img{
            width: 80%;
            height: 260px;
            margin: 5px 0 0 40px;
            display: block;
        }
       
        .info {
            width: 100%;
            height: auto;
            background-color: white;
            border-radius: 30px;
            border: 1.5px solid #8ec7b7;
			margin-left: 25px;
        }
        
        ul {
            padding-top: 40px;            
        }

        li {
            color: #96968F;
            font-size: 20px;
            list-style: none;
        }

        .data {
            color: black;
            font-size: 30px;
            margin-top: 5px;
            padding-right: 30px;
            font-family: system-ui;
        }
        
        .but{
            margin-left:450px;
            border-radius: 5px;
            width: 100px;
            height: 50px;
            border-color: #808080;
            background-color: #808080;
            color: white;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div><?php include_once('adminheader.php');?></div>
    <div id="main-content">
        <div>
            <div>View Event Participant Details</div> 
        </div><br>
        <?php 
            $link = $_GET['username'];
            $link1 = $_GET['Event_Name'];
            include('conn.php');
            $sql = "SELECT * FROM participant WHERE username = '$link' and Event_Name = '$link1'";
            $result = mysqli_query($con, $sql);
            if ($row = mysqli_fetch_array($result)) 
            {
        ?>

        <div class="info">
            <div class="title">Event Participant Details</div>
            <ul>
                <div class="box">
                    <div style="width: 500px;">
                        <li>Event Name</li>
                        <li class="data"><?php echo $row['Event_Name']?></li><br>
                        <li>Participant Name</li>
                        <li class="data"><?php echo $row['username']?></li><br>
                    </div>
                    <div>
                        <li>Email Address</li>
                        <li class="data"><?php echo $row['email']?></li><br>
                        <li>Contact Number</li>
                        <li class="data"><?php echo $row['contact']?></li><br>
                    </div>
                </div>                
            </ul>
        </div>
        <?php 
        }
        ?>
        <div>
            <button class="but" onclick="document.location='participant_list.php'">Back</button><br><br>
        </div>        
    </div>
</body>
</html>