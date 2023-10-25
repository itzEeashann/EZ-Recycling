<?php
    include("conn.php");
    $link = ($_GET['Recycle_stockID']);
    mysqli_query($con, "DELETE FROM recyclable_items_stock WHERE Recycle_stockID='$link'");
    mysqli_close($con); 
    echo "<script>alert('Recyclable Item Deleted.');window.location.href='recyclable_item_list.php';</script>"; 
?>