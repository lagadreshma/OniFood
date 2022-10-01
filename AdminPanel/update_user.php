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

    <h1 class="heading"> Update User's Information </h1>

    
    <?php

include "connection.php";
include "function.php";


$user_id = $_GET['id'];


$sql = "select * from users where id = {$user_id} ";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);

if(isset($_POST["submit"])){

  $updateid = $_GET['id'];

  $username = mysqli_real_escape_string($conn, $_POST['name']);
  $firstname =mysqli_real_escape_string($conn,  $_POST['first']);
  $lastname = mysqli_real_escape_string($conn, $_POST['last']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $contact = mysqli_real_escape_string($conn, $_POST['contact']);
  $pass = mysqli_real_escape_string($conn, $_POST['password']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);

 // $password = password_hash($pass, PASSWORD_BCRYPT);

  $updateQuery = "update users set id=$updateid, username='$username', first_name='$firstname', last_name='$lastname', email='$email', contact='$contact', password='$pass', address='$address' where id =$updateid ";

  $result = mysqli_query($conn, $updateQuery);

  if($result){
    

    echo "<script> alert('Data Upadated Properly.'); </script>";
    echo "<script> window.location.href='manage_user.php'; </script>";

    
  }
  else{

      echo "<script> alert('Data Not Upadated.'); </script>";
      die();
   
  }


}


?>

    <div class="col-2">

      <div>
        <label for="username"> Enter Username : </label>
        <input type="text" name="name" id="username" value="<?php echo $result['username']; ?>" autocomplete="off" placeholder="Enter User Name" required>
      </div>

      <div>
        <label for="email"> Enter Email : </label>
        <input type="text" name="email" id="email" value="<?php echo $result['email']; ?>" autocomplete="off" placeholder="Enter User Email" required>
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="first"> Enter First Name : </label>
        <input type="text" name="first" id="first" value="<?php echo $result['first_name']; ?>" autocomplete="off" placeholder="Enter First Name " required>
      </div>

      <div>
        <label for="contact"> Enter Contact Number : </label>
        <input type="text" name="contact" id="contact" value="<?php echo $result['contact']; ?>" autocomplete="off" placeholder="Enter Contact No. " required>
      </div>      

    </div>

    <div class="col-2">

      <div>
        <label for="last"> Enter Last Name : </label>
        <input type="text" name="last" id="last" value="<?php echo $result['last_name']; ?>" autocomplete="off" placeholder="Enter Last Name " required>
      </div>

      <div>
        <label for="password"> Password : </label>
        <input type="password" name="password" id="password" value="<?php echo $result['password']; ?>" autocomplete="off" placeholder="Enter Password " required>
      </div>

    </div>

    <div>
      <label for="address"> Address : </label>
      <input type="text" name="address" id="address"  value="<?php echo $result['address']; ?>" cols="30" rows="5" placeholder="Address" >
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