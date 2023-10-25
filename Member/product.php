<?php
session_start();
@include 'db.php';
if (isset($_SESSION['username'])) {
  $result = mysqli_query($conn,"SELECT * from accounts where username='".$_SESSION['username']."'");
    $row = mysqli_fetch_array($result);
}

@include 'db.php';
   if(isset($_POST['add_to_cart'])){

      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];
      $product_image = $_POST['product_image'];
      $product_quantity = 1;

      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE product_name = '$product_name'");

      if(mysqli_num_rows($select_cart) > 0){
         echo'<script type="text/javascript">alert("Product already in cart!")</script>';
      }else{
         $insert_product = mysqli_query($conn, "INSERT INTO `cart`(product_name, product_price, product_image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
         echo'<script type="text/javascript">alert("Product Successfully added to cart")</script>';
      }
   }
?>


<head>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="text/javascript" href="js/button.js">
   <link rel="text/javascript" href="js/script.js">
</head>


<body>
<?php include 'header.php'; ?>
   <div class="container">
      <section class="products">
         <h1 class="heading">Welcome to Our Product</h1>
         <div class="box-container">
            <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `product`");
            if(mysqli_num_rows($select_products) > 0){
               while($fetch_product = mysqli_fetch_assoc($select_products)){
            ?>
            <form action="" method="post">
               <div class="box">
                  <img src="img/<?php echo $fetch_product['product_image']; ?>" alt="">
                  <h3><?php echo $fetch_product['product_name']; ?></h3>
                  <br>
                  <div class="price">$<?php echo $fetch_product['product_price']; ?>/-</div>
                  <br>
                  <div class="price"><?php echo $fetch_product['description']; ?></div>
                  <input type="hidden" name="product_id" >
                  <input type="hidden" name="product_name" value="<?php echo $fetch_product['product_name']; ?>">
                  <input type="hidden" name="product_price" value="<?php echo $fetch_product['product_price']; ?>">
                  <input type="hidden" name="product_image" value="<?php echo $fetch_product['product_image']; ?>">
                  <input type="submit" class="btn" value="add to cart" name="add_to_cart" />
               </div>
            </form>
            <?php
               };
            };
            ?>
         </div>
      </section>
   </div>
</body>
