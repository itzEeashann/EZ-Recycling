<?php
include('protected.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <meta charset="UTF-8">
    <title>View Product Details</title>
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

        .box .data {
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
<div><?php include_once('adminheader.php');?></div>
    <div id="main-content">
    <div>
        <div>View Product Details</div> 
    </div><br>
    
    <div>
        <?php 
            $link = $_GET['product_id'];
            include('conn.php');
            $sql = "SELECT * FROM product WHERE product_id = '$link'";
            $result = mysqli_query($con, $sql);
            if ($row = mysqli_fetch_array($result)) 
            {
        ?>
        <div class="box">
            <div class="profile-image">
            <div class="title">Product Picture</div>              
                <div class="image">
                <?php echo  "<img class='img' src=product_uploads/".$row['product_image'].' width=100px height="100px">'  ; ?> 
                </div>
            </div>
            <div class="info">
            <div class="title">Product Details</div>
                <ul>
                    <li>Product ID</li>
                    <li class="data"><?php echo $row['product_id']?></li><br>
                    <li>Product Name</li>
                    <li class="data"><?php echo $row['product_name']?></li><br>
                    <li>Product Description</li>
                    <li class="data"><?php echo $row['description']?></li><br>
                    <li>Price</li>
                    <li class="data">RM<?php echo $row['product_price']?></li><br>
                </ul>
            </div>
        </div>
        <?php 
        }
        ?>
    </div><br>
        <div>
		    <button class="but" onclick="document.location='product_list.php'">Back</button><br><br>
      	</div>        
    </div>
</body>
</html>