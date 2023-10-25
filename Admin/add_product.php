<?php
include('protected.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <meta charset="UTF-8">
    <title>Create New Product</title>
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
            height: 180px;
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

        .box{
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
<div><?php include_once('adminheader.php');?></div>
    <div id="main-content">
        <div>
            <p>Create New Product</p> 
        </div><br>
        <form action="addproductdetails.php" method="post" ENCTYPE="multipart/form-data">
            <div>
                <div class="box">
                    <div class="profile-image">
                    <div class="title">Product Picture</div>              
                        <div class="image">
                            <ul>
                                <li>Upload Image</li>
                                <input type="file" name="pic"><br>
                            </ul>
                        </div>
                    </div>
                    <div class="info">
                    <div class="title">Product Details</div>
                        <ul>
                            <li>Product Name</li>
                            <input type="text" name="product_name" placeholder="Enter Product Name" required><br><br>
                            <li>Product Decription</li>
                            <textarea name="description" placeholder="Enter Product Description" required></textarea><br><br>
                            <li>Price</li>
                            RM&nbsp<input type="text" name="product_price" placeholder="Enter Price" required><br><br>
                        </ul>
                    </div>
                </div>
            </div>
            <div style="justify-content:flex; margin-left: 350px;">
                <button class="but" type="submit" name="submit">Create</button>
                <button class="but" onclick="document.location='product_list.php'">Cancel</button><br><br>
            </div>
        </form>        
    </div>
</body>
</html>