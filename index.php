<?php

session_start();

require_once("connection.php");


if(isset($_POST['add-to-cart'])){

    if(!isset($_SESSION['IS_LOGIN'])){

        echo"<script> alert('Please Login To your account'); </script>";  
        echo"<script> window.location.href = 'login.php'; </script>";
  
        die();

    }else{

        ?>
  
        <script> 
          window.location.href = 'home.php';
        </script>
    
        <?php
  
        die();

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit= no">

    <title> Online Food Delivery </title>

    <!-- Matrial Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- CSS File Link -->
    <link rel="stylesheet" href="style.css">

    <!-- Font awesome icon link -->      
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">

    <!-- Swipper JavaScript - swipperjs.com -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

  </head>

  <body>

    <!-- Navigation Bar -->

      <section class="header">

        <nav>

          <div class="logo">
              <a href="index.php"> <img src="upload/logo2.png" width="70px;" height="60px"> </a>
              <h2>Oni<span>Food</span></h2>
          </div>

          <div class="navbar" id = "navlinks">
          
             <i class = "fa fa-times" onclick= "show();"></i>

               <ul id = "MenuItems">
                 <li><a href="index.php"> Home </a></li>
                 <li><a href="#dishes"> Dishes </a></li>
                 <li><a href=""> Blogs </a></li>
                 <li><a href="about.php"> About Us </a></li>
                 <li><a href="contact.php"> Contact Us </a></li>
                 <li><a href="login.php"> Login </a></li>
               </ul>

          </div>

            <a href="" id="cart">
              <i class="fas fa-shopping-cart"></i>Cart<span id='cart_count'>0</span>
            </a>

             <i class = "fa fa-bars" onclick= "hide();"></i>

        </nav>

        
    </section>

    <!-- Advertisement  -->

    <section class="advertise">
        <!------ Swiper   Swiperjs for advertisements -------->

        <div class="adds">

        <div class="swiper mySwiper">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="offer add-1">

              <div class="small-container">
                <!-- add1 Start -->

                <div class="row">

                  <div class="col-8">

                    <div class="box1">

                      <img src="upload/add11.jpg">

                    </div>

                    <div class="box2">

                      <h1> Order Fresh Food For <br> You | Your Family </h1>
                      <div class="big-offer">

                        <div class="one">
                          <h2> 50% <br> OFF* </h2>
                        </div>
                        <div class="two">
                          <h2> + </h2>
                        </div>
                        <div class="three">
                          <h2> &#x20B9 200 <br> CASHBACK* </h2>
                          <p> On the First Order </p>
                        </div>

                      </div>

                    </div>

                  </div>

                  <div class="col-4">

                    <img src="upload/add1.jpg"> <br>

                    <a href="restaurant.php" class="btn"> Order Now </a>

                  </div>

                </div>

              </div>

            </div>
          </div>

          <div class="swiper-slide">
            <!-- add 2 Start -->

            <div class="offer offer-1">

              <div class="small-container">

                <div class="row">

                  <div class="col-6">

                    <h1> <span> Hungry? </span>
                      <br> 
                      Order Food From <br> Favourite Restaurants Near You
                    </h1>

                    <a href="restaurant.php" class="btn"> Order Now </a>

                  </div>

                  <div class="col-6">

                    <div class="first">
                      <img src="upload/add22.jpg">
                      <img src="upload/add21.jpg">
                    </div>

                  </div>

                </div>

              </div>

            </div>

          </div>

          <div class="swiper-slide">

            <!-- add 3 Start  -->

            <div class="offer offer-2">

              <div class="small-container">

                <div class="row">

                  <div class="col-6">

                    <h1> <span> Free Delivery </span>
                      <br>
                      On Your First Order
                    </h1>

                    <a href="restaurant.php" class="btn"> Order Now </a>

                  </div>

                  <div class="col-6">

                    <div class="images">
                      <img src="upload/add3.jpg" width="200px;">

                      <img src="upload/add32.jpg" width="100px;">
                    </div>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>
        <div class="swiper-pagination"></div>
      </div>

        </div>

    </section>

    <!-- Popular dishes section -->

    <section class="popular-dishes" id="dishes">

<div class="container">

<h1 class="heading"> Our Popular Dishes </h1>

 <div class="row">

 <?php

     $select = "select * from dishes where class = 'popular' ";

     $query = mysqli_query($conn, $select);
     
     $rows = mysqli_num_rows($query);

     while($result = mysqli_fetch_assoc($query)){

 ?>

    <div class="col grid3">
      <form action="" method="post">

        <div class="card shadow">

           <img src="<?php echo $result['dish_image']; ?>" alt="image">

           <div class="card-body">
             <h3 class="card-title"><?php echo $result['dish_name']; ?></h3>
             <h4 class="category"><?php echo $result['category']; ?></h4>

             <div class="rate-price">

               <h4 class="rate">
                <span class="material-icons-sharp">star_rate</span>
                 <?php echo $result['rate']; ?> 
               </h4>

               <h4 class="price"><span>&#x20B9</span><?php echo $result['price']; ?></h4>

             </div>

             <button type="submit" name="add-to-cart" class="add">Add To Cart <i class="fas fa-shopping-cart"></i></button>
             <input type="hidden" name="dish_id" value="<?php echo $result['dish_id']; ?>">

           </div>

        </div>

      </form>
    </div>

    <?php

     }

    ?>

 </div>
</div>

</section>


<!-- Menu section -->

<section class="menu-dishes">

<div class="container">

<h1 class="heading"> Our Menu </h1>

 <div class="row">

 <?php

     require_once("connection.php");

     $select = "select * from dishes where class = 'menu' ";

     $query = mysqli_query($conn, $select);
     
     $rows = mysqli_num_rows($query);

     while($result = mysqli_fetch_assoc($query)){

 ?>

    <div class="col grid3">
      <form action=" " method="post">

        <div class="card shadow">

           <img src="<?php echo $result['dish_image']; ?>" alt="image">

           <div class="card-body">
             <h3 class="card-title"><?php echo $result['dish_name']; ?></h3>
             <h4 class="category"><?php echo $result['category']; ?></h4>

             <div class="rate-price">

               <h4 class="rate">
                <span class="material-icons-sharp">star_rate</span>
                 <?php echo $result['rate']; ?> 
               </h4>

               <h4 class="price"><span>&#x20B9</span><?php echo $result['price']; ?></h4>

             </div>

             <button type="submit" name="add-to-cart" class="add">Add To Cart <i class="fas fa-shopping-cart"></i></button>
             <input type="hidden" name="dish_id" value="<?php echo $result['dish_id']; ?>">

           </div>

        </div>

      </form>
    </div>

    <?php

     }

    ?>

 </div>
</div>

</section>


   <!-- Customers Reviews or Testimonials -->

   <section class="Testimonials">

<h1 class="heading"> Customer Says </h1>

      <div class="row">

        <div class="col-2">

          <div class="customer-review">

            <img src="upload/user-1.png" alt="">
            <p class="name"> Sean Parker </p>
            <div class="Rating">
              <span class="material-icons-sharp">grade</span>
              <span class="material-icons-sharp">grade</span>
              <span class="material-icons-sharp">grade</span>
              <span class="material-icons-sharp">grade</span>
              <span class="material-icons-sharp">star_half</span>
            </div>
            <div class="message">
              <p> <i class="fa fa-quote-left"></i> 
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis commodi id officia itaque magnam quis atque? Enim veritatis illum est.
              <i class="fa fa-quote-right"></i> </p>
            </div>

          </div>

          <div class="customer-review">

            <img src="upload/user-2.png" alt="">
            <p class="name"> Mike Smith </p>
            <div class="Rating">
              <span class="material-icons-sharp">grade</span>
              <span class="material-icons-sharp">grade</span>
              <span class="material-icons-sharp">grade</span>
              <span class="material-icons-sharp">grade</span>
              <span class="material-icons-sharp">star_half</span>
            </div>
            <div class="message">
              <p> <i class="fa fa-quote-left"></i> 
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis commodi id officia itaque magnam quis atque? Enim veritatis illum est.
                <i class="fa fa-quote-right"></i> </p>
            </div>

          </div>

          <div class="customer-review">

            <img src="upload/user-3.png" alt="">
            <p class="name"> Model Joe </p>
            <div class="Rating">
              <span class="material-icons-sharp">grade</span>
              <span class="material-icons-sharp">grade</span>
              <span class="material-icons-sharp">grade</span>
              <span class="material-icons-sharp">grade</span>
              <span class="material-icons-sharp">star_half</span>
            </div>
            <div class="message">
              <p> <i class="fa fa-quote-left"></i> 
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis commodi id officia itaque magnam quis atque? Enim veritatis illum est.
                <i class="fa fa-quote-right"></i> </p>
            </div>

          </div>

        </div>

    </div>


<a href="review.php"> Review </a>

</section>

  <!-- Footer Section --> 


    <section class="footer-section">

      <div class="footer">

         <div class="footer-1">

           <div class="footer-one">

            <h3> Download Our App </h3>
            <p> Download App for Android and ios mobile phone. </p>

            <div class="app-logo">
              <img src="upload/play-store.png">
              <img src="upload/app-store.png">
            </div>

           </div>

           <div class="footer-two">

            <div class="logo">
              <a href="index.php"> <img src="upload/logo2.png" width="70px;"
                  height="60px"> </a>
              <h2>Oni<span>Food</span></h2> 
            </div>
            <p> Our Purpose is To Sustainably Make the Pleasure and Benefits of Food Accessible to the Many.</p>

           </div>

           <div class="footer-three">

            <h3> Useful Links </h3>
            <ul>
              <a href="index.php"><li> Home </li></a>
              <a href="blogs.php"><li> Blogs </li></a>
              <a href=""><li> Popular Dishes </li></a>
              <a href="contact.php"><li> Contact Us </li></a>
            </ul>

           </div>

           <div class="footer-four">

            <h3> Follow Us </h3>
            <div class="social-links">
              <a href=""><i class="fa-brands fa-facebook-f"></i></a>
              <a href="https://www.linkedin.com/in/reshma-lagad-735501227/" target="blank"><i class="fa-brands fa-linkedin-in"></i></a>
              <a href="https://github.com/lagadreshma" target="blank"><i class="fa-brands fa-github"></i> </a>
              <a href=""><i class="fa-brands fa-youtube"></i></a>
            </div>

           </div>

         </div>

         <div class="footer-2">

           <hr>
           <p class = "copyright"> &copy;Copyright 2022 - Computer Science </p>

         </div>

      </div>

    </section>   






    <!-- Swipper js -->
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

    <!-- Including JavaScript file link -->
    <script src="main.js"> </script>


  </body>
</html>