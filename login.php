<?php

session_start();
include "connection.php";

$msg = "";

if(isset($_POST['login'])){

  $username = $_POST['name'];
  $pass = $_POST['password'];

 // $password = password_hash($pass, PASSWORD_BCRYPT);

    $sql = "select * from users where username='$username' and password='$pass'";
    $query = mysqli_query($conn,$sql);


    if(mysqli_num_rows($query) == 1){

        $row = mysqli_fetch_assoc($query);
        $_SESSION['IS_LOGIN'] = 'Yes';
        
        echo" <script> window.location.href = 'home.php'; </script>";
        $_SESSION['name'] = $username;
        $_SESSION['id'] = $row['id'];

       die();

    }else{
        $msg = "<pre>   **Please enter valid login details.  </pre>";
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

    <section class="header">

      <nav>

        <div class="logo">
          <a href="index.php"> <img src="upload/logo2.png" width="70px;"
              height="60px"> </a>
          <h2>Oni<span>Food</span></h2>
        </div>

        <div class="navbar" id="navlinks">

          <i class="fa fa-times" onclick="show();"></i>

          <ul id="MenuItems">
            <li><a href="index.php"> Home </a></li>
            <li><a href="#dishes"> Dishes </a></li>
            <li><a href="blogs.php"> Blogs </a></li>
            <li><a href="about.php"> About Us </a></li>
            <li><a href="contact.php"> Contact Us </a></li>
            <li><a href="login.php"> Login </a></li>
          </ul>

        </div>

        <a href="" id="cart">
          <i class="fas fa-shopping-cart"></i>Cart<span id='cart_count'>0</span>
        </a>

        <i class="fa fa-bars" onclick="hide();"></i>

      </nav>

</section>

      <!-- Login Form  -->

      <section class="login">

          <h1 class="heading"> Login To Your Account </h1>

          <div class="row">

            <div class="box-1">

              <img src="upload/login1.jpg">

            </div>

            <div class="box-2">

              <form action="" method="post">

                <p> If not registered ? <a href="register.php" class="link">
                    Register Now </a> </p>

                <div>
                  <input type="text" name="name" autocomplete="off"
                    placeholder="Username" required>
                </div>

                <div>
                  <input type="password" name="password" autocomplete="off"
                    placeholder="Password" required>
                </div>

                <input type="submit" name="login" class="btn" value="Login">

                <p class="terms"> By Clicking on Login, I accept the Terms and
                  Conditions and Privacy Policy. </p>

                <!-- if login info is wrong show this msg -->
                <div class="answer"> <?php echo $msg ?> </div>

                </form>

              </div>

            </div>

          </div>

          <section>





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
                      <a href="index.php"> <img src="upload/logo2.png"
                          width="70px;"
                          height="60px"> </a>
                      <h2>Oni<span>Food</span></h2>
                    </div>
                    <p> Our Purpose is To Sustainably Make the Pleasure and
                      Benefits of Food Accessible to the Many.</p>

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
                      <a
                        href="https://www.linkedin.com/in/reshma-lagad-735501227/"
                        target="blank"><i class="fa-brands fa-linkedin-in"></i></a>
                      <a href="https://github.com/lagadreshma" target="blank"><i
                          class="fa-brands fa-github"></i> </a>
                      <a href=""><i class="fa-brands fa-youtube"></i></a>
                    </div>

                  </div>

                </div>

                <div class="footer-2">

                  <hr>
                  <p class="copyright"> &copy;Copyright 2022 - Computer Science
                  </p>

                </div>

            </section>






            <!-- Swipper js -->
            <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
            <!-- Including JavaScript file link -->
            <script src="main.js"> </script>


          </body>
        </html>