<?php
    include("conn.php");
    $link = ($_GET['username']);
    mysqli_query($con, "DELETE FROM accounts WHERE username='$link'");
    mysqli_close($con); 
    echo "<script>alert('Account Deleted.');window.location.href='account_list.php';</script>"; 
?>