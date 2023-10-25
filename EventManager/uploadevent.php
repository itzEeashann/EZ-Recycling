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
    $target_file = $target_dir . basename($_FILES["event_pic"]["name"]);

    move_uploaded_file($_FILES["event_pic"]["tmp_name"], $target_file);
    $file_name = basename($_FILES["event_pic"]["name"]);


    $insert_sql = "INSERT INTO events(Event_Name,Venue,Date,Time,capacity,descriptions,event_pic,username)

    VALUES
    
    ('$_POST[Event_Name]','$_POST[Venue]','$_POST[Date]',
    '$_POST[Time]','$_POST[capacity]','$_POST[descriptions]',
    '$file_name','$_POST[username]')";

    if (mysqli_query($con, $insert_sql)) {
        echo
        '<script>
            alert("Event Requested, Please wait for Approval");
            window.location.href = "ReqEvent.php";
        </script>';
        die();
    }
    else {
        echo
        '<script>
            alert("Failed To Request Event.");
            window.location.href = "ReqEvent.php";
        </script>';
    }

    //close database connection
    mysqli_close($con);
?>