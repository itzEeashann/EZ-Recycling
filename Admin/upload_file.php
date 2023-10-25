<?php
include_once 'conn.php';
if(isset($_POST['submit']))
{
    $productname=$_POST['product_name'];
    $productdesc=$_POST['description'];
    $price=$_POST['product_price'];
    $image=$_FILES['pic']['name'];
    $image_tmp=$_FILES['pic']['tmp_name'];
    move_uploaded_file($image_tmp,"product_uploads/$image");
    $query="insert into product(product_name,description,product_price,product_image) values('$productname','$productdesc','$price','$image')";
    $result=mysqli_query($con,$query);
    if($result)
    {
        echo "<script>alert('Product Created Successfully')</script>";
        echo "<script>window.location.href='add_product.php'</script>";
    }
    else
    {
        echo "<script>alert('Product Not Created')</script>";
    }
}
?>

