<?php
include("protected.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <product_id rel="stylesheet" href="css/bootstrap.css">
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
            border: 1.5px solid black;
        }

        input[type=text]{
			border-radius: 5px;
            width: 250px;
            height: 30px;
            font-size: 12px;
		}

        textarea{
			border-radius: 5px;
            width: 250px;
            height: 100px;
            font-size: 12px;
		}

        ul{
            padding-top: 18px;          
        }

        li{
            color: #96968F;
            font-size: 20px;
            list-style: none;
        }

        .box {
            color: black;
            font-size: 15px;
            margin-top: 5px;
            padding-right: 30px;
            font-family: system-ui;
        }
        
        .data{
            color: black;
            font-size: 15px;
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
<div><?php include('adminheader.php');?></div>
    <div id="main-content">
        <div>
            <p>Edit Product</p> 
        </div><br>
        <?php 
            $product_id = intval($_GET['product_id']);
            include('conn.php');
            $sql = "SELECT * FROM product WHERE product_id='$product_id'";
            $result = mysqli_query($con, $sql);
            if ($row = mysqli_fetch_array($result)) 
            {
        ?>
        <form action="update_product.php" method="post" ENCTYPE="multipart/form-data">
        <input type="hidden" name="product_id" value="<?php echo $product_id?>">
        <div>
            <div class="box">
                <div class="profile-image">
                    <div class="title">Product Picture</div>              
                    <div class="image">
                    <ul>
                        <li>Upload Image</li>
                            <input type="file" class="data" name="pic"><br>
                    </ul>
                </div>
                </div>
                <div class="info">
                <div class="title">Product Details</div>
                    <ul>
                        <li>Product ID</li>
                        <input type="text" class="data" name="product_id" value="<?php echo $row['product_id']?>" disabled><br><br><br>
                        <li>Product Name</li>
                        <input type="text" name="product_name" value="<?php echo $row["product_name"] ?>" placeholder="Enter Product Name" required><br><br>
                        <li>Product Descriptions</li>
                        <textarea type="text" name="description" placeholder="Enter Product Descriptions" required><?php echo $row["description"] ?></textarea><br><br>
                        <li>Price</li>
                        RM&nbsp<input type="text" name="product_price" value="<?php echo $row["product_price"] ?>" placeholder="Enter Price" required><br><br>
                    </ul>
                </div>
            </div>
        </div>

        <div style="justify-content:flex; margin-left: 350px;">
            <button class="but" name="edit_product">Edit</button></form>
        </div>  
        
        <div style="justify-content:flex; margin-left: 350px;">
            <button class="but" onclick="window.location.href='product_list.php'">Back</button><br><br>
        </div> 
        <?php
        }
        mysqli_close($con);
        ?>
        
    </div>
</body>
</html>