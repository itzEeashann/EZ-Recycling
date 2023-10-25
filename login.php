

<head>
    <script src="https://kit.fontawesome.com/8557daf5de.js" crossorigin="anonymous"></script>
    <link href="css/login.css" rel="stylesheet">
</head>
<body>
    <div class=container style='border:solid black;'>
    <a href="index.php"><i class="fas fa-arrow-left"
            style="font-size: 36px"></i></a>
        <form action="function.php" method = "post" class = "login">
            <p class = "logintxt" style = "font-size: 2rem; font-weight: 800;"> Login </p>
            <div class="input-box">
                <input type="username" placeholder="username" name= "username" value="" required>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name= "password" value="" required>
            </div>
            <div class="input-box">
                <button class="btn" name= "submit">Login</button>
            </div>
            <br>
            
                <p class="newlogin">Don't Have An Account? <a href="register.php"> Register Here </a></p>
                <br>
                <center><p  style='font-size:1rem; border:solid black; padding:1px;background-color:yellow; border-radius:5px; text-decorations:none; width:100px;'>
                    <a href="Admin/admin_login.php" type='button'><i style ='color:black;font-size:1rem;'class="fa-solid fa-user-doctor"></i> &nbsp;Admin</a>
                </p></center>
          
        </form>
        
        
    </div>
    <div class="backtohomepage">
    
      </div>
</body>
</html>