<?php
    include("conn.php");
    $link = ($_GET['delivery_id']);
    mysqli_query($con, "DELETE FROM delivery WHERE delivery_id='$link'");
    mysqli_close($con); 
    echo "<script>alert('Product Deleted.');window.location.href='delivery_list.php';</script>"; 
?>