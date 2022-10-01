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

<!------------  My Profile Section  ------------->

   <section class="myprofile">

   <h1 class="heading"> My Profile </h1>

   <div class="profile-section">

     <form action="" method="post">

     
    <?php

$user_id = $_SESSION['id'];


$sql = "select * from users where id = {$user_id} ";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);

if(isset($_POST["submit"])){

  $updateid = $_SESSION['id'];

  $username = mysqli_real_escape_string($conn, $_POST['name']);
  $firstname =mysqli_real_escape_string($conn,  $_POST['first_name']);
  $lastname = mysqli_real_escape_string($conn, $_POST['last_name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $contact = mysqli_real_escape_string($conn, $_POST['contact']);
  $pass = mysqli_real_escape_string($conn, $_POST['password']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);

 // $password = password_hash($pass, PASSWORD_BCRYPT);

  $updateQuery = "update users set id=$updateid, username='$username', first_name='$firstname', last_name='$lastname', email='$email', contact='$contact', password='$pass', address='$address' where id =$updateid ";

  $result = mysqli_query($conn, $updateQuery);

  if($result){
    

    echo "<script> alert('Data Upadated Properly.'); </script>";
    echo "<script> window.location.href='my_profile.php'; </script>";

    
  }
  else{

      echo "<script> alert('Data Not Upadated.'); </script>";
      die();
   
  }


}


?>

      <div class="two-col">
       <div>
       <label for="name">Username</label> <br>
       <input type="text" name="name" value="<?php echo $result['username']; ?>" autocomplete="off" placeholder="Username" required>
       </div>

       <div>
       <label for="first_name">First Name</label> <br>
       <input type="text" name="first_name" value="<?php echo $result['first_name']; ?>" autocomplete="off"placeholder="First Name" required>
       </div>

      </div>            

     <div class="two-col">
       
       <div>
       <label for="last_name">Last Name</label> <br>
       <input type="text" name="last_name" value="<?php echo $result['last_name']; ?>" autocomplete="off" placeholder="Last Name" required>
       </div>

       <div>
       <label for="email">Email</label> <br>
       <input type="text" name="email" value="<?php echo $result['email']; ?>" autocomplete="off" placeholder="Email" required>
       </div>

     </div>


     <div class="two-col">

      <div>
      <label for="password">Password</label> <br>
      <input type="text" name="password" value="<?php echo $result['password']; ?>" autocomplete="off" placeholder="Password" required>
      </div>

      <div>
      <label for="contact">Mobile No.</label> <br>
      <input type="text" name="contact" value="<?php echo $result['contact']; ?>" autocomplte="off" placeholder="Mobile No." required>
      </div>

     </div>


     <div class="desc">
      <div>
      <label for="address">Address</label> <br>
       <input type="text" name="address" value="<?php echo $result['address']; ?>" cols="20" rows="4" placeholder="Address" required>
      </div>
     </div>

     <input type="submit" name="submit" class="Update" value="Update">


     </form>
    </div>

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