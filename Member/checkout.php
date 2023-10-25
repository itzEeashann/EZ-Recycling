<?php
session_start();
include('db.php'); 

if (isset($_SESSION['username'])) {
  $result = mysqli_query($conn,"SELECT * from accounts where username='".$_SESSION['username']."'");
    $row = mysqli_fetch_array($result);
}
@include 'db.php';

   if(isset($_POST['order_btn'])){

      $username = $_POST['username'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      $payment_method = $_POST['payment_method'];
      $address = $_POST['address'];

      $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
      $price_total = 0;
      if(mysqli_num_rows($cart_query) > 0){
         while($product_item = mysqli_fetch_assoc($cart_query)){
            $product_name[] = $product_item['product_name'] .' ('. $product_item['quantity'] .') ';
            $product_price = number_format($product_item['product_price']) * number_format($product_item['quantity']);
            $price_total += $product_price;
         };
      };
      $total_product = implode(', ',$product_name);
      $detail_query = mysqli_query($conn, "INSERT INTO `orders`(username, phone, email, payment_method, address, total_product, price_total) VALUES('$username','$phone','$email','$payment_method','$address','$total_product','$price_total')") or die('query failed');
      
      $get_order_id_sql = "SELECT MAX(order_id) FROM orders";
      $order_id_result = mysqli_query($conn, $get_order_id_sql);
      $order_id_array = mysqli_fetch_array($order_id_result);
      $order_id = $order_id_array[0];
      
      $detail_query_1 = mysqli_query($conn, "INSERT INTO `delivery`(username, order_id, deliveryAddress, total_products) VALUES('$username', '$order_id', '$address','$total_product')") or die('query failed');

      if($cart_query && $detail_query && $detail_query_1){
         echo "
         <div class='order-message-container'>
         <div class='message-container'>
            <h3>thank you for shopping!</h3>
            <div class='order-detail'>
               <span>".$total_product."</span>
               <span class='total'> total : $".$price_total."/-  </span>
            </div>
            <div class='customer-details'>
               <p> your username : <span>".$username."</span> </p>
               <p> your phone number : <span>".$phone."</span> </p>
               <p> your email : <span>".$email."</span> </p>
               <p> your address : <span>".$address."</span> </p>
               <p> your payment mode : <span>".$payment_method."</span> </p>
               <p>(*pay when product arrives*)</p>
            </div>
               <a href='product.php' class='btn'>continue shopping</a>
            </div>
         </div>
         ";
      }

   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout Page</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'header.php'; ?>
<div class="container">
<section class="checkout-form">
   <h1 class="heading">complete your order</h1>
   <form action="" method="post">
   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['product_price']) * number_format($fetch_cart['quantity']);
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['product_name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : $<?= $grand_total; ?>/- </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>Name</span>
            <input type="text" placeholder="Enter your Name" name="username" value='<?php echo $_SESSION['username']; ?>'>
         </div>
         <div class="inputBox">
            <span>Phone Number</span>
            <input type="number" placeholder="Enter your Phone Number" name="phone" required>
         </div>
         <div class="inputBox">
            <span>Email</span>
            <input type="email" placeholder="Enter your Email" name="email" required>
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="payment_method">
               <option value="cash on delivery" selected>cash on delivery</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Address</span>
            <input type="text" placeholder="Enter your Address." name="address" required>
         </div>
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>
</section>
</div>
<script src="js/script.js"></script>
   
</body>
</html>