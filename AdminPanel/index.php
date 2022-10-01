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

<?php require_once("header.php");  ?>

<!-- --------------- Admin Dashboard -------------------- -->

<div class="dashboard">

  <div class="row">

    <div class="dashboard_div user">
    <?php

     $select_rows = mysqli_query($conn, "select * from users");
     $user_count = mysqli_num_rows($select_rows);

    ?>

    <h3> Users <br><br> <span><?php echo $user_count; ?></span></h3>
    </div>
    <div class="dashboard_div dish">
    <?php

     $select_rows = mysqli_query($conn, "select * from dishes");
     $dish_count = mysqli_num_rows($select_rows);

    ?>
      <h3> Dishes <br><br> <span><?php echo $dish_count; ?></span></h3>
    </div>
    <div class="dashboard_div delivery_boy">
    <?php

     $select_rows = mysqli_query($conn, "select * from delivery_boys");
     $delivery_boy_count = mysqli_num_rows($select_rows);

     ?>
      <h3> Delivery Boys <br> <br> <span><?php echo $delivery_boy_count; ?></span></h3>
    </div>
    <div class="dashboard_div review">
    <?php

     $select_rows = mysqli_query($conn, "select * from customers_feedback");
     $review_count = mysqli_num_rows($select_rows);

     ?>
      <h3> Reviews <br><br> <span><?php echo $review_count; ?></span></h3>
    </div>

  </div>

  <div class="row">

  <div class="dashboard_div received">
    <?php

     $select_rows = mysqli_query($conn, "select * from orders");
     $order_count = mysqli_num_rows($select_rows);

    ?>

    <h3> Received Orders <br><br> <span><?php echo $order_count; ?></span></h3>
    </div>
    <div class="dashboard_div processing">
    <?php

     $select_rows = mysqli_query($conn, "select * from orders where order_status='in progress'");
     $process_count = mysqli_num_rows($select_rows);

    ?>
      <h3> Processing Orders<br> <br> <span><?php echo $process_count; ?></span></h3>
    </div>
    <div class="dashboard_div complete">
    <?php

     $select_rows = mysqli_query($conn, "select * from orders where order_status='complete'");
     $complete_count = mysqli_num_rows($select_rows);

     ?>
      <h3> Complete Orders<br> <br> <span><?php echo $complete_count; ?></span></h3>
    </div>
    <div class="dashboard_div cancelled">
    <?php

     $select_rows = mysqli_query($conn, "select * from orders where order_status='cancel'");
     $cancelled_count = mysqli_num_rows($select_rows);

     ?>
      <h3> Cancelled Orders <br><br> <span><?php echo $cancelled_count; ?></span></h3>
    </div>

  </div>

</div>

   
<div class="footer">
  <hr>
  <p class = "copyright"> &copy;Copyright 2022 - Computer Science </p>
</div>




<!-- --------------- JavaScript File ---------------- -->
  <script src="main.js"></script>

</body>
</html>