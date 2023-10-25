<?php
    include("conn.php");
    $link = ($_GET['order_id']);
    mysqli_query($con, "DELETE FROM order_product WHERE order_id='$link'");
    mysqli_close($con); 
    echo "<script>alert('Order Deleted.');window.location.href='order_list.php';</script>"; 
?>