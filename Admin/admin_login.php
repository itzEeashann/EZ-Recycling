<?php
include("conn.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$username = mysqli_real_escape_string($con,$_POST['username']);  
	$password = mysqli_real_escape_string($con,$_POST['password']); 
	$check = "SELECT * FROM accounts WHERE username='$username' and password='$password' and Role='Admin'";
	if ($result = mysqli_query($con,$check)){
	  $rowcount = mysqli_num_rows($result);	  
	}
		if($rowcount == 1)  {
            session_start();
			$_SESSION['mySession'] = $username;
			header("location: admin_dashboard.php");
		} 
		
	else  {
		echo "<script>alert('Your Username or Password is invalid. Please re-login');</script>";
	}
	mysqli_close($con);
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Login</title>
    <style>
        body {
            font-family: "system-ui";
        }

        .box {
            margin-left: 35%;
        }

        form {
            border: 3px solid #f1f1f1;
            width: 45%;
            height: 570px;
            border-radius: 25px;
        }

        .topic {
            font-size: 30px;
            font-weight: 900;
            text-align: center;
        }

        section {
            font-size: 18px;
            font-weight: 400;
            font-style: oblique;
            text-align: center;
        }

        .input{
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 25px;
        }

        button {
            background-color: #010e24;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 25px;
        }

        button:hover {
            opacity: 0.8;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.logo {
            width: 50%;
        }

        #loginbtn {
            width: 250px;
            margin-left: 20%;
        }

        .container {
            padding: 15px;
            border-radius: 20%;
        }

        .input-container {
            display: -ms-flexbox;
            display: flex;
            width: 100%;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="box">
	
        <br>
        <form action="admin_login.php" method="post">
            <div class="imgcontainer">
                <img src="media/EZ logo.jpg" alt="Logo" class="logo">
            </div>

            <div class="topic">
                <p>Admin Login</p>
            </div>

            

            <div class="container">
                <i class="fa fa-user icon"></i>
                <label for="uname"><b>Username</b></label> 
                <input class="input" type="text" placeholder="Enter Username" name="username" required> 

                <br><br>

                <i class="fa fa-key icon"></i>
                <label for="psw"><b>Password</b></label>
                <input class="input" type="password" placeholder="Enter Password" name="password" required>
				
                <div id="loginbtn">
                    <button type="submit" name="login" value="login">Login</button>
                    <button style="background-color:#c0c0c0; color:black;" class="button" name="cancel" onclick="document.location='../index.php'">Cancel</button><br><br>
                </div>
                
            </div>
        </form>
        <br><br>
    </div>
</body>
</html>