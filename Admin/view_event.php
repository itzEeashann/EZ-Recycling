<?php
include('protected.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <meta charset="UTF-8">
    <title>View Event Details</title>
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
            width: 105%;
            display: flex; 
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
            width: 250px;
            font-weight: bold;
            font-size: 29px;
            color: black;
        }

        .img{
            width: 270px;
            height: 200px;
            margin: 40px 0 0 40px;
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

        .box .data {
            color: black;
            font-size: 15px;
            margin-top: 5px;
            padding-right: 30px;
            font-family: system-ui;
        }
        
        .but{
            margin-left: 450px;
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
        <div>View Event Details</div> 
    </div><br>
    
    <div>
        <?php 
            $link = $_GET['Event_ID'];
            include('conn.php');
            $sql = "SELECT * FROM events WHERE Event_ID = '$link'";
            $result = mysqli_query($con, $sql);
            if ($row = mysqli_fetch_array($result)) 
            {
        ?>

        <?php
            if ($row['status'] == 0) {
                $status = "Pending";
            }
            elseif ($row['status'] == 1){
                $status = "Approved";
            }
            elseif ($row['status'] == 2){
                $status = "Rejected";
            }
            else{
                $status = "Done";
            }
        ?>
        <div class="box">
            <div class="profile-image">
            <div class="title">Profile Picture</div>              
                <div class="image">
                <?php echo "<img class='img' src=EZ-Recycling/Environmentalist/uploads/".$row['event_pic'].' width=100px height="100px">'  ; ?>
                </div>
            </div>
            <div class="info">
            <div class="title">Event Details</div>
                <ul>
                    <li>Event ID</li>
                    <li class="data"><?php echo $row['Event_ID']?></li><br>
                    <li>Event Name</li>
                    <li class="data"><?php echo $row['Event_Name']?></li><br>
                    <li>Venue</li>
                    <li class="data"><?php echo $row['Venue']?></li><br>
                    <li>Event Date</li>
                    <li class="data"><?php echo $row['Date']?></li><br>
                    <li>Event Time</li>
                    <li class="data"><?php echo $row['Time']?></li><br>
                    <li>Estimated Participant</li>
                    <li class="data"><?php echo $row['capacity']?></li><br>
                    <li>Event Description</li>
                    <li class="data"><?php echo $row['descriptions']?></li><br>
                    <li>Event PIC</li>
                    <li class="data"><?php echo $row['Username']?></li><br>
                    <li>Event Status</li>
                    <li class="data"><?php echo $status; ?></li><br>
                </ul>
            </div>
        </div>
        <?php 
    }
    ?>
    </div><br>
        <div>
		    <button class="but" onclick="document.location='event_list.php'">Back</button><br><br>
      	</div>        
    </div>
</body>
</html>