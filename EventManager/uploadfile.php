<?php
    session_start();

    include("dbcon.php");
    
    $username = $_POST['username'];

    $sql = 
    "SELECT * 
    FROM accounts
    WHERE username = '$username'";

    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["pic"]["name"]);

    if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
        $file_name = basename($_FILES["pic"]["name"]);

        $update_sql="UPDATE accounts SET 
        picture='$file_name'
        WHERE username='$row[username]';";

        $profile_picture_sql = mysqli_query($con, 
        "SELECT picture
        FROM accounts
        WHERE picture = '$file_name' AND username != '$row[username]'");

        if (mysqli_num_rows($profile_picture_sql) > 0) {
            echo
            '<script>
                alert("Profile Picture File Name Exists, Please Change The File Name and Upload Again.");
                history.go(-1);
            </script>';
            die();
        }
        else {
            mysqli_query($con,$update_sql);
            echo
            '<script>
                alert("Profile Picture Saved!");
                window.location.href = "profile.php";
            </script>';
        }
    }
    else {
        echo
        '<script>
            window.location.href = "profile.php";
        </script>';
    }

    //close database connection
    mysqli_close($con);
?>