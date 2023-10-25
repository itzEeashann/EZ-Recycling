<?php
include_once 'conn.php';
if(isset($_POST['edit_product']))
{
    $product_id=$_POST['product_id'];
    $productname=$_POST['product_name'];
    $productdesc=$_POST['description'];
    $price=$_POST['product_price'];
    $image=$_FILES['pic']['name'];
    $image_tmp=$_FILES['pic']['tmp_name'];
    move_uploaded_file($image_tmp,"product_uploads/$image");

    $query="UPDATE product SET product_name='$productname', description='$productdesc', product_price='$price', product_image='$image' WHERE product_id='$product_id'";

    $result=mysqli_query($con,$query);
    if($result)
    {
        echo "<script>alert('Product Updated Sucessfully')</script>";
        echo "<script>window.location.href='add_product.php'</script>";
    }
    else
    {
        echo "<script>alert('Product Update Unsucessfull!')</script>";
    }
}
?>