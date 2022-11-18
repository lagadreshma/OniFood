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
    <link rel="stylesheet" href="./style.css">

    <!-- Font awesome icon link -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    rel="stylesheet">
      
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">

</head>
<body>

<!-- ---------------- Navigation Bar --------------- -->

<?php  include "header.php"  ?>
    

<!-- Main Section -->

<div class="dashboard-form">

   <div class="display">

     <div class="col-2">
        <h1> Orders </h1>
        <div>
        <form class="form" action="" method="get">
            <input type="text" name="search" value="" autocomplete="off" placeholder="Search...">
            <button type="submit" name="search" class="search"> Search </button> 
        </form>
        </div>
     </div>

     <div class="table">

       <table>

        <thead>

          <tr>
            <th>Order Id</th>
            <th>Username</th>
            <th>Mobile</th>
            <th>Address</th>
            <th>Total Products</th>
            <th>Total Price</th>
            <th>Payment Mode</th>
            <th>Payment Status</th>
            <th>Order Status</th>
            <th>Order Placed</th>
            <th>Action</th>
          </tr>

        </thead>

        <tbody>

        <?php

           $selectQuery = "select * from orders";

           $query = mysqli_query($conn,$selectQuery);

           $rows = mysqli_num_rows($query);

           $i = 1;

           while($res=mysqli_fetch_array($query)){


            ?>

            <tr>
                <td><?php echo $res['order_id']; ?></td>
                <td><?php echo $res['username']; ?></td>
                <td><?php echo $res['mobile']; ?></td>
                <td><?php echo $res['address']; ?></td>
                <td><?php echo $res['total_products']; ?></td>
                <td><?php echo $res['total_price']; ?></td>
                <td><?php echo $res['payment_mode']; ?></td>
                <td><?php echo $res['payment_status']; ?></td>
                <td><?php echo $res['order_status']; ?></td>
                <td><?php echo $res['order_placed']; ?></td>
                <td>
                  <button class="update"><a href="update_order.php?id=<?php echo $res['order_id']; ?>">Update</a></button>
                </td>
            </tr>

            <?php

           }


        ?>


        </tbody>

       </table>

     </div>

   </div>
   
</div>
   




<!-- --------------- JavaScript File ---------------- -->
  <script src="main.js"></script>

</body>
</html>
