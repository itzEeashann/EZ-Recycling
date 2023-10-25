<?php
include("protected.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <meta charset="UTF-8">
    <title>Edit Account</title>
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
            width: 80%;
            display: flex;
            justify-content: space-between;
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
            border: 1.5px solid black;
        }

        ul{
            padding-top: 18px;          
        }

        li{
            color: #96968F;
            font-size: 20px;
            list-style: none;
        }

        .data{
            color: black;
            font-size: 30px;
            margin-top: 5px;
            padding-right: 30px;
            font-family: system-ui;
        }
        
        .but{
            padding: 10px 12px;
            border: 1px solid;
            border-radius: 5px;
            cursor: pointer;
            width: 130px;
            border-color: #808080;
            background-color: #808080;
            color: white;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <?php include_once('adminheader.php');?>
    <?php 
        $query = "SELECT username FROM accounts WHERE Role='Environmentalist'";
        $result1 =  mysqli_query($con,$query);
    ?>
    <div id="main-content">
        <div>
            <p>Edit Delivery</p> 
        </div><br>
        <?php 
            $link = $_GET['delivery_id'];
            include('conn.php');
            $sql = "SELECT * FROM delivery WHERE delivery_id='$link'";
            $result = mysqli_query($con, $sql);
            if ($row = mysqli_fetch_array($result)) 
            {
        ?>

        
        
        <form action="update_delivery.php" method="post" ENCTYPE="multipart/form-data">
            <input type="hidden" name="delivery_id" value="<?php echo $link?>">
            <div class="info">
                <div class="title">Delivery Details</div>
                <ul>
                    <div class="box">
                        <div style="width: 450px;">
                            <li>Delivery ID</li>
                            <li class="data"><?php echo $row['delivery_id']?></li><br>
                            <li>Order ID</li>
                            <li class="data"><?php echo $row['order_id']?></li><br>
                            <li>Total Product</li>
                            <li class="data"><?php echo $row['total_products']?></li><br>
                            <li>Delivery Address</li>
                            <li class="data"><?php echo $row['deliveryAddress']?></li><br>
                        </div>
                        <div>
                            <li>Delivery Description</li>
                            <li class="data"><?php echo $row['description']?></li><br>
                            <li>Delivery Status</li>
                            <li class="data"><?php echo $row['status']?></li><br>
                            <li>Username</li>
                            <li>
                                <select name="username">
                                    <?php 
                                    while($data = mysqli_fetch_array($result1)){
                                    $displayData = $data['username'];
                                    ?>
                                    <option value="<?php echo $displayData;?>"><?php echo $displayData;?></option>
                                    <?php } ?>
                                </select>
                            </li>
                        </div>
                    </div>
                </ul>
            </div>
            <div style="justify-content:flex; margin-left: 400px;">
                <button class="but" name="edit_delivery">Edit</button>
            </div>
            </form>
            <div style="justify-content:flex; margin-left: 400px;">
                <button class="but" onclick="window.location.href='delivery_list.php'">Back</button><br><br>
            </div>
        <?php
        }
        mysqli_close($con);
        ?>
    </div>
</body>
</html>