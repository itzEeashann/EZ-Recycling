<?php
    include("conn.php");
    $link = ($_GET['product_id']);
    mysqli_query($con, "DELETE FROM product WHERE product_id='$link'");
    mysqli_close($con); 
    echo "<script>alert('Product Deleted.');window.location.href='product_list.php';</script>"; 
?>