<?php
include('protected.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <meta charset="UTF-8">
    <title>View Recyclable Item Details</title>
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
            width: 60%;
            display: flex; 
            border: black;
            justify-content: space-between;
            margin-left: 100px;
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
            width: 400px;
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
    <?php include_once('adminheader.php');?>
    <div id="main-content">
    <div>
        <div>View Recyclable Item Details</div> 
    </div><br>
    
        <?php 
            $link = $_GET['Recycle_stockID'];
            include('conn.php');
            $sql = "SELECT * FROM recyclable_items_stock WHERE Recycle_stockID = '$link'";
            $result = mysqli_query($con, $sql);
            if ($row = mysqli_fetch_array($result)) 
            {
        ?>
        <div class="info">
            <div class="title">Recyclable Item Details</div>
            <ul>
                <div class="box">
                    <div style="width: 1000px;">
                        <li>Recycle Item ID</li>
                        <li class="data"><?php echo $row['Recycle_stockID']?></li><br>
                        <li>Username</li>
                        <li class="data"><?php echo $row['username']?></li><br>
                        <li>Recycle Date</li>
                        <li class="data"><?php echo $row['date']?></li><br>
                    </div>
                    <div style="width: 500px;">
                        <li>Material Type</li>
                        <li class="data"><?php echo $row['material_type']?></li><br>
                        <li>Total Recycle Item</li>
                        <li class="data"><?php echo $row['amount']?></li><br>
                        <li>Description</li>
                        <li class="data"><?php echo $row['description']?></li><br>
                    </div>
                </div>
            </ul>
        </div>
        
        <?php 
        }
        ?>
        <div>
		    <button class="but" onclick="document.location='recyclable_item_list.php'">Back</button><br><br>
      	</div>        
    </div>
</body>
</html>