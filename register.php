<?php

include ('testconfig.php');
error_reporting(0);
session_start();

if (isset($_SESSION['username'])){
    header("Location: login.php");
}

if (isset ($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = ($_POST['password']);
    $cpassword = ($_POST['cpassword']);
    $Role = $_POST['Role'];
    $picture = $_POST['picture'];

    if($password == $cpassword){
        $sql = "SELECT * FROM accounts WHERE username='$username'";
        $result = mysqli_query($conn,$sql);

        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO accounts (firstname,lastname,username,email,password,Role,picture)
                    VALUES ('$firstname','$lastname','$username', '$email', '$password','$Role','$picture')";
            $result = mysqli_query($conn,$sql);
            
            if ($result){
                echo "<script>alert('Registration Successful')</script>";
                $firstname = "";
                $lastname = "";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
                $Role = "";
                $picture = "";
                header(
                    "<script>
                        window.alert('Register Sucessfull');
                        window.location.href='login.php';
                    </script>"
                );
            } else{
                echo "<script>alert('Something Went Wrong')</script>";
            }
        } else {
            echo "<script>alert('Username Exists')</script>";
        }
    } else {
        echo "<script>alert('Password Not Matched')</script>";
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css"
     integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
    <link href="css/register.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/8557daf5de.js" crossorigin="anonymous"></script>

</head>
<body style='background-image: ../images/efg.jpg;'>
    <div class=container style='margin:30px; border:solid black;'>
    <a href="login.php"><i class="fas fa-arrow-left"
            style="font-size: 36px"></i></a>
        <form action="" method="POST" class = "login">
            <p class = "logintxt" style = "font-size: 2rem; font-weight: 800;"> Sign Up </p>
            <div class="input-box">
                <input type="text" placeholder="First Name" name="firstname"  required>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Last Name" name="lastname"  required>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Username" name="username"  required>
            </div>
            <div class="input-box">
                <input type="email" placeholder="Email" name="email"  required>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="password"  required>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Confirm Password" name="cpassword"  required>
            </div>
            <div class="selectWrapper"> 
                
                <select class="selectBox" input type="text" placeholder="User Type" name="Role" required> 
                    <option value="" disabled selected hidden = 'disabled'>Type of user</option>
                    <option>Member</option>
                    <option>Environmentalist</option>
                </select>
                <input type="hidden" value="1.jpg" name='picture'>
            </div>
            <div class="input-box">
                <button class="btn" name="submit">Register</button>
            </div>
            <p class="newlogin">   Have An Account? <a href="login.php"> Sign In Here </a></p>
        </form>
    </div>
</body>
</html>
