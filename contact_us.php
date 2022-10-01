<?php

session_start();

require_once("connection.php");

if(!isset($_SESSION['IS_LOGIN'])){

    echo "<script> window.location.href = 'index.php'; </script>";
    
}


$username = $_SESSION['name'];
$user_id = $_SESSION['id'];

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

      <section class="header home">

        <nav>

          <div class="logo">
              <a href="home.php"> <img src="upload/logo2.png" width="70px;" height="60px"> </a>
              <h2>Oni<span>Food</span></h2>
          </div>

          <div class="navbar" id = "navlinks">
          
             <i class = "fa fa-times" onclick= "show();"></i>

               <ul id = "MenuItems">
                 <li><a href="home.php"> Home </a></li>
                 <li><a href="#dishes"> Dishes </a></li>
                 <li><a href="contact_us.php"> Contact Us </a></li>
                 <li><a href=""><?php echo $username; ?><i class="fa-solid fa-caret-down"></i></a>
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

$select_rows = mysqli_query($conn, "select * from cart where user_id='$user_id' ");
$row_count = mysqli_num_rows($select_rows);

?>

<a href="cart.php" id="cart"><i class="fas fa-shopping-cart"></i>Cart
<span id='cart_count'><?php echo $row_count; ?></span></a>

             <i class = "fa fa-bars" onclick= "hide();"></i>

        </nav>

        
    </section>

<!-- ---------- Contact Us Section ------------ -->
<section class="contact">

<h1 class="heading"> Contact Us </h1>

<div class="row">

  <div class="contact-one">

    <h3> Get in Touch </h3>
    <p class="Thank-you"> Thank you for viewing my website. <br> I
      really hope you've enjoyed looking at my work. </p>

    <div class="contact-box">
    <div class="box">
      <span class="material-icons-sharp">person</span>
      <div class="desc">
        <p> Name </p>
        <p> Reshma Lagad </p>
      </div>
    </div>

    <div class="box">
      <span class="material-icons-sharp">location_on</span>
      <div class="desc">
        <p> Address </p>
        <p> Ahemdnagar, Maharastra </p>
      </div>
    </div>

    <div class="box">
      <span class="material-icons-sharp">email</span>
      <div class="desc">
        <p> Email </p>
        <p> bestcoder2022@gmail.com </p>
      </div>
    </div>
    </div>

  </div>

  <div class="contact-two">

    <h3> Message Me </h3>

    <form action="contact.php" method="POST">

      <div class="two-col">

        <input type="text" name="name" autocomplete="off"
          placeholder="Username" required>
        <input type="text" name="email" autocomplete="off"
          placeholder="Email" required>

      </div>

      <div>
        <input type="text" name="subject" placeholder="Subject"
          required>
      </div>

      <div>
        <textarea type="text" name="message" id="message"
          placeholder="Message" cols="30" rows="3" required></textarea>
      </div>

      <input type="submit" name="submit" class="btn" value="Submit">
    </form>

  </div>

</div>

</section>

<div class="map">

<iframe
src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3992025.715832655!2d74.79033602624062!3d20.369773425308757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bdcb05d46788921%3A0x6677e92c1a5181b6!2sAhmednagar%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1651906967592!5m2!1sen!2sin"
width="100%" height="450" style="border:0;" allowfullscreen=""
loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

         




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
              <a href="home.php"><li> Home </li></a>
              <a href=""><li> Blogs </li></a>
              <a href=""><li> Popular Dishes </li></a>
              <a href="contact_us.php"><li> Contact Us </li></a>
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