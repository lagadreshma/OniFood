<?php

  session_start();

  require_once("connection.php");

  if(!isset($_SESSION['IS_LOGIN'])){

  echo "<script> window.location.href = 'index.php'; </script>";

}


$username = $_SESSION['name'];
$user_id = $_SESSION['id'];


if(isset($_POST['cash_on_delivery'])){

  $username = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['contact'];
  $address = $_POST['address'];
  $payment_mode = "cash on delivery";
  $payment_status = "pending";
  $order_status = "in progress";

  $cart_query=mysqli_query($conn, "Select * from cart where user_id={$user_id}") or die("select cart failed.");
  $total_price = 0;
  if(mysqli_num_rows($cart_query) > 0){
    while($result = mysqli_fetch_assoc($cart_query)){
      $product_name[] = $result['dish_name']. '('. $result['dish_quantity'] .')';
      $product_price = number_format($result['dish_price'] * $result['dish_quantity']);
      $total_price += $product_price;
    }
  }
  
  $total_products = implode("," , $product_name);

  $order_query = mysqli_query($conn, "insert into orders(username, email, mobile, address, total_products, total_price, payment_mode, payment_status, order_status)values('$username','$email','$mobile','$address','$total_products','$total_price','$payment_mode','$payment_status','$order_status')") or die("order insert failed.");

  if($order_query){

    echo "<script> 
           alert('Your Order is Successfully Placed.
                  <br>
                  <h2> Thank You!!! </h2>');
          </script>";

    echo "<script> window.location.href = 'my_orders.php'; </script>";


  }


}


?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Online Food Delivery Website">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP , MySQL">
    <meta name="author" content="Reshma Lagad">
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0,shrink-to-fit= no">

    <title> Online Food Delivery </title>

    <!-- Matrial Icons -->
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- CSS File Link -->
    <link rel="stylesheet" href="style.css">

    <!-- Font awesome icon link -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      rel="stylesheet">

    <!-- Swipper JavaScript - swipperjs.com -->
    <link rel="stylesheet"
      href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

  </head>

  <body>

    <!-- Navigation Bar -->

    <section class="header home">

      <nav>

        <div class="logo">
          <a href="home.php"> <img src="upload/logo2.png" width="70px;"
              height="60px"> </a>
          <h2>Oni<span>Food</span></h2>
        </div>

        <div class="navbar" id="navlinks">

          <i class="fa fa-times" onclick="show();"></i>

          <ul id="MenuItems">
            <li><a href="home.php"> Home </a></li>
            <li><a href="#dishes"> Dishes </a></li>
            <li><a href="contact_us.php"> Contact Us </a></li>
            <li><a href=""><?php echo $username; ?><i class="fa-solid
                    fa-caret-down"></i></a>
                <div class="dropdown">
                  <ul>
                    <li><a href="my_profile.php">My Profile</a></li>
                    <li><a href="my_orders.php">My Orders</a></li>
                    <li><a href="logout.php">Logout</a></li>
                  </ul>
                </div>
              </li>
            </ul>

          </div>
          <?php

            $select_rows= mysqli_query($conn, "select * from cart where
            user_id='$user_id' ");
            $row_count= mysqli_num_rows($select_rows);

            ?>

            <a href="cart.php" id="cart"><i class="fas fa-shopping-cart"></i>Cart
              <span id='cart_count'><?php echo $row_count; ?></span></a>
              <i class="fa fa-bars" onclick="hide();"></i>

            </nav>

          </section>

          <!-- CheckOut section -->

          <section class="checkout">

            <div class="row">

              <form action="" method="post">

                <div class="basic-info">

                  <h1> Basic <span> Information </span> </h1>

                  <div class="basic">

                    <?php

                      $user_id= $_SESSION['id'];


                      $sql="select * from users where id= {$user_id} ";
                      $query= mysqli_query($conn, $sql);
                      $result= mysqli_fetch_assoc($query);


                      ?>

                      <div class="user-info">
                        <div>
                          <label> Username </label> <br>
                          <input type="text" name="name" value="<?php echo $result['username']; ?>" autocomplete="off" placeholder="Username" required>

                        </div>

                        <div>
                          <label> Email </label> <br>
                          <input type="text" name="email" value="<?php echo $result['email']; ?>" autocomplete="off" placeholder="Email" required>

                        </div>


                        <div>
                          <label> Mobile No. </label> <br>
                          <input type="text" name="contact" value="<?php echo $result['contact']; ?>" autocomplte="off" placeholder="Mobile No." required>

                        </div>


                        <div class="desc">

                          <label> Address </label> <br>
                          <input type="text" name="address" value="<?php echo $result['address']; ?>" cols="20" rows="4" placeholder="Address" required>

                        </div>
                      </div>

                    </div>

                  </div>
      
                  <div class="checkout_order-details">

                    <h1> Order <span> Details </span> </h1>

                    <div class="checkout_order">
                      <table class="order-table">

                        <thead>
                          <tr>
                            <th>Sr.No</th>
                            <th>Dish Image</th>
                            <th>Dish Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                          </tr>
                        </thead>

                        <tbody>

                          <?php

                            $i= 1;

                            $grand_total= 0;

                            if(isset($_SESSION['cart'])){

                            $user_id= $_SESSION['id'];

                            $cart_query= mysqli_query($conn, "select * from cart
                            where
                            user_id= {$user_id}")or die(" cart query failed.");
                            if(mysqli_num_rows($cart_query)> 0){

                            while($result = mysqli_fetch_assoc($cart_query)){

                            ?>

                            <tr>

                              <td><?php echo $i++; ?></td>
                              <td><img src="<?php echo $result['dish_image'];?>"width="100px" height="80px">
                              </td>
                              <td><?php echo $result['dish_name'];?></td>
                              <td><span>&#x20B9</span><?php echo $result['dish_price'];?></td>
                              <td><?php echo $result['dish_quantity'];?></td>
                              <td></span>&#x20B9</span><?php echo $sub_total=number_format($result['dish_price'] * $result['dish_quantity']); ?></td>

                            <tr>

                                      <?php

                                        $grand_total += $sub_total;


                                        }

                                        }

                                        ?>
                                        <tr>
                                          
                                          <td class="checkout-grand"><h2>Grand Total : </h2></td>

                                          <td colspan="5" class="grandtotal" style="color: green;"><h2></span>&#x20B9</span>
                                          <?php echo $grand_total; ?></h2>
                                          </td>
                                          
                                        </tr>

                                        <tr>
                                          <td colspan="3" class="buttons">
                                            <input type="submit" value="Proceed with COD" name="cash_on_delivery" class="cash">
                                          <br>
                                            <input type="submit" value="Proceed with Rezorpay" name="pay" class="pay">
                                          </td>
                                        </tr>


                                        

                                        <?php

                                        }else{
                                        ?>

                                        <tr>
                                          <td colspan="7"> <?php echo "<h6> Cart
                                              Empty
                                            </h6>"; ?> </td>
                                        </tr>

                                        <?php

                                          }

                                          ?>

                                        </tbody>

                                      </table>


                                      

                                    </div>

                                  </div>

                                </div>
                              </form>
                            </div>

                          </section>




                          <!-- Footer Section -->


                          <section class="footer-section">

                            <div class="footer">

                              <div class="footer-1">

                                <div class="footer-one">

                                  <h3> Download Our App </h3>
                                  <p> Download App for Android and ios mobile
                                    phone.
                                  </p>

                                  <div class="app-logo">
                                    <img src="upload/play-store.png">
                                    <img src="upload/app-store.png">
                                  </div>

                                </div>

                                <div class="footer-two">

                                  <div class="logo">
                                    <a href="index.php"> <img
                                        src="upload/logo2.png"
                                        width="70px;"
                                        height="60px"> </a>
                                    <h2>Oni<span>Food</span></h2>
                                  </div>
                                  <p> Our Purpose is To Sustainably Make the
                                    Pleasure and Benefits of Food Accessible to
                                    the
                                    Many.</p>

                                </div>

                                <div class="footer-three">

                                  <h3> Useful Links </h3>
                                  <ul>
                                    <a href="home.php"><li> Home </li></a>
                                    <a href=""><li> Blogs </li></a>
                                    <a href=""><li> Popular Dishes </li></a>
                                    <a href="contact.php"><li> Contact Us </li></a>
                                  </ul>

                                </div>

                                <div class="footer-four">

                                  <h3> Follow Us </h3>
                                  <div class="social-links">
                                    <a href=""><i class="fa-brands
                                        fa-facebook-f"></i></a>
                                    <a
                                      href="https://www.linkedin.com/in/reshma-lagad-735501227/"
                                      target="blank"><i class="fa-brands
                                        fa-linkedin-in"></i></a>
                                    <a href="https://github.com/lagadreshma"
                                      target="blank"><i class="fa-brands
                                        fa-github"></i>
                                    </a>
                                    <a href=""><i class="fa-brands fa-youtube"></i></a>
                                  </div>

                                </div>

                              </div>

                              <div class="footer-2">

                                <hr>
                                <p class="copyright"> &copy;Copyright 2022 -
                                  Computer Science </p>

                              </div>

                            </div>

                          </section>


                          <!-- Swipper js -->
                          <script
                            src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
                          <!-- Including JavaScript file link -->
                          <script src="main.js"> </script>


                        </body>
                      </html>