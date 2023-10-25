<?php
include("protected.php");
?>

<?php
include("conn.php");
if (isset($_POST['edit_account'])) {
    $link = $_POST['username'];
	$check = "SELECT * from accounts where username='$link'";
	$result = mysqli_query($con,$check);	
	{
		$sql= "UPDATE accounts SET 
        Role='$_POST[post]'
        where username = '$link'";

    if(!mysqli_query($con,$sql)) {
        die("Error:" .mysqli_error($con));
    }
    else{
        echo '<script>alert("Record saved!");
        window.location.href ="account_list.php";
        </script>';
    }   
    mysqli_close($con);
    }
}
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

        .box .data{
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
            <p>Edit Account</p> 
        </div><br>
        <?php 
            $link = $_GET['username'];
            include('conn.php');
            $sql = "SELECT * FROM accounts WHERE username='$link'";
            $result = mysqli_query($con, $sql);
            if ($row = mysqli_fetch_array($result)) 
            {
        ?>
        <form action="edit_account.php" method="post" ENCTYPE="multipart/form-data">
        <input type="hidden" name="username" value="<?php echo $link?>">
        <div>
            <div class="box">
                <div class="profile-image">
                    <div class="title">Profile Picture</div>              
                    <div class="image">
                        <?php echo  "<img class='img' src=EZ-Recycling/Environmentalist/uploads/".$row['picture'].' width=100px height="100px">'  ; ?>
                    </div>
                </div>
                <?php
                    if($row['Role'] == 'Member'){
                        $member = "selected";
                        $environmentalist = "";
                        $event_master = "";
                    }

                    else if($row['Role'] == 'Environmentalist'){
                        $member = "";
                        $environmentalist = "selected";
                        $event_master = "";
                    }

                    else{
                        $member = "";
                        $environmentalist = "";
                        $event_master = "selected";
                    }
                ?>
                <div class="info">
                <div class="title">Account Details</div>
                    <ul>
                        <li>First Name</li>
                        <li class="data"><?php echo $row['firstname']?></li><br>
                        <li>Last Name</li>
                        <li class="data"><?php echo $row['lastname']?></li><br>
                        <li>Email Address</li>
                        <li class="data"><?php echo $row['email']?></li><br>
                        <li>Contact Number</li>
                        <li class="data"><?php echo $row['contact']?></li><br>
                        <li>Home Address</li>
                        <li class="data"><?php echo $row['address']?></li><br>
                        <li>Role</li>
                        <select class="data" name="post" required>
                            <option value="Member" <?php echo $member; ?>>Member</option>
                            <option value="Environmmentalist" <?php echo $environmentalist; ?>>Environmmentalist</option>
                            <option value="Event_Master" <?php echo $event_master; ?>>Event Master</option>
                        </select>
                    </ul>
                </div>
            </div>
        </div>

        <div style="justify-content:flex; margin-left: 350px;">
            <button class="but" name="edit_account">Edit</button>
        </div>
        </form>
        <div style="justify-content:flex; margin-left: 350px;">
            <button class="but" onclick="window.location.href='account_list.php'">Back</button><br><br>
        </div> 
        
        <?php
        }
        mysqli_close($con);
        ?>
        
    </div>
</body>
</html>