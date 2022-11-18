<?php

session_start();
include "connection.php";
include "function.php";

if(!isset($_SESSION['IS_LOGIN'])){
    redirect("admin_login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Online Food Delivery Admin-Panel">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP , MySQL">
    <meta name="author" content="Reshma Lagad">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit= no">

    <title> Admin Panel </title>

    <!-- Matrial Icons -->
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- CSS File Link -->
    <link rel="stylesheet" href="style.css">

    <!-- Font awesome icon link -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      rel="stylesheet">
      
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">

</head>
<body>

<?php require_once("header.php"); ?>

<!-- Main Section -->

<div class="dashboard-form">

   <form class="form" action="" method="post">

    <h1 class="heading"> Update Order Status </h1>

    
    <?php

$order_id = $_GET['id'];


$sql = "select * from orders where order_id = {$order_id} ";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);

if(isset($_POST["submit"])){

  $updateid = $_GET['id'];

  $username = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $contact = mysqli_real_escape_string($conn, $_POST['mobile']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $total_products =mysqli_real_escape_string($conn,  $_POST['total_products']);
  $total_price = mysqli_real_escape_string($conn, $_POST['total_price']);
  $payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']);
  $payment_status = mysqli_real_escape_string($conn, $_POST['payment_status']);
  $order_status = mysqli_real_escape_string($conn, $_POST['order_status']);
  $order_placed = mysqli_real_escape_string($conn, $_POST['order_placed']);  
  

  $updateQuery = "update orders set order_id=$updateid, username='$username', email='$email', mobile='$contact', address='$address',total_products='$total_products', total_price='$total_price',payment_mode='$payment_mode',payment_status='$payment_status',order_status='$order_status',order_placed='$order_placed' where order_id =$updateid ";

  $res = mysqli_query($conn, $updateQuery);

  if($res){
    

    echo "<script> alert('Data Upadated Properly.'); </script>";
    echo "<script> window.location.href='manage_order.php'; </script>";

    
  }
  else{

      echo "<script> alert('Data Not Upadated.'); </script>";
      die();
   
  }


}

?>

    <div class="col-2">

      <div>
        <label for="username"> Username : </label>
        <input type="text" name="name" id="username" value="<?php echo $result['username']; ?>" autocomplete="off" placeholder="Enter Username" required>
      </div>

      <div>
        <label for="email"> Email : </label>
        <input type="text" name="email" id="email" value="<?php echo $result['email']; ?>" autocomplete="off" required>
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="contact"> Contact Number : </label>
        <input type="text" name="mobile" id="contact" value="<?php echo $result['mobile']; ?>" autocomplete="off" required>
      </div>
      
      <div>
        <label for="address"> Address : </label>
        <input type="text" name="address" id="address"  value="<?php echo $result['address']; ?>" cols="30" rows="5">
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="total_products"> Total Products : </label>
        <input type="text" name="total_products" id="total_products" value="<?php echo $result['total_products']; ?>" autocomplete="off" required>
      </div>

      <div>
        <label for="total_price"> Total Price : </label>
        <input type="text" name="total_price" id="total_price" value="<?php echo $result['total_price']; ?>" autocomplete="off" required>
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="payment_mode"> Payment Mode : </label>
        <input type="text" name="payment_mode" id="payment_mode" value="<?php echo $result['payment_mode']; ?>" autocomplete="off" required>
      </div>

      <div>
        <label for="payment_status"> Payment Status : </label>
        <input type="text" name="payment_status" id="payment_status" value="<?php echo $result['payment_status']; ?>" autocomplete="off" required>
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="order_status"> Order Status : </label>
        <input type="text" name="order_status" id="order_status" value="<?php echo $result['order_status']; ?>" autocomplete="off" required>
      </div>

      <div>
        <label for="order_placed"> Order Placed : </label>
        <input type="text" name="order_placed" id="order_placed" value="<?php echo $result['order_placed']; ?>" autocomplete="off" required>
      </div>

    </div>


    <div class="buttons">
      
      <div class="col-2">

      <div>
        <input type="submit" name="submit" class="btn" value="Update">
      </div>
    
      
      </div>

    </div>

   </form>
   
</div>
   




<!-- --------------- JavaScript File ---------------- -->
  <script src="main.js"></script>

</body>
</html>