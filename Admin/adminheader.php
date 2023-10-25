<?php 
    if (isset($_SESSION['mySession'])) {
        include('conn.php');
        $admin = $_SESSION['mySession'];
    } 
    else {
        header("location: admin_login.php");
    }

    if(isset($_POST["logout"])){
        session_destroy();
        header("location: admin_login.php");
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Header</title>
    <style>
        body {
            margin: 0;
            height: 110%;
        }
        #admin-header {
            height: 100%;
            width: 22%;
            background-color: #272635;
            text-align: center;
            color: #A6A6A8;
            position: fixed;
        }
        #admin-pic {
            width: 90%;
            height: auto;
            margin: 10% 0;
        }
        .admin-detail {
            height: 0px;
            line-height: 40px;
            font-size: 150%;
        }
        nav a,
        nav a:visited {
            display: block;
            width: 100%;
            height: 100%;
            color: #E8E9F3;
            text-decoration: none;
            line-height: 60px;
            font-size: 25px;
            font-family: "Lucida Console", "Courier New", monospace;
        }
        nav a:hover {
            color: #000000;
        }

        .main-content{
            width: 12%;
        }

        #logout-form {
            margin-top: 20%;
        }

        #logout-form button{
            display: inline-block;
            width: 50%;
            height: 30px;
            border-radius: 5px;
            border: 0;
            padding: 0;
            font-size: 18px;
            background-color: red;
            color: white;
            cursor: pointer;
            font-family: "Lucida Console", "Courier New", monospace;
        }
    </style>
</head>
<body>
    <div id="admin-header">
        <div>
        <img id="admin-pic" src="media/EZ logo.jpg">
        <!--<div class="admin-detail"><?php echo $admin?></div>-->
        <div class="admin-detail" style="padding-bottom: 150px; border-bottom: 1.5px solid #B1E5F2;">EZ Recycling System</div>
    </div>
    <div>
        <nav>
            <a href="admin_dashboard.php"><svg xmlns="http://www.w3.org/2000/svg"  width="20px" height="20px" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
            </svg><i class="bi-gear-fill"></i>&nbsp;Dashboard</a>     
                
            <a href="admin-query.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-right-dots" viewBox="0 0 16 16">
                <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1H2zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"/>
                <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
            </svg>&nbsp;Message</a>
        </nav>
    </div>
    <div>
        <form method="post" id="logout-form">
            <button name="logout">Logout</button>
        </form>
    </div>
    </div>
    </div>
</body>
</html>