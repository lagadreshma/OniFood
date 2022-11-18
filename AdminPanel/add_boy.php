<?php

session_start();
include "connection.php";
include "function.php";

if(!isset($_SESSION['IS_LOGIN'])){
    redirect("admin_login.php");
}


if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    $insertQuery = "insert into delivery_boys(name, contact, password, address)values('$name','$contact','$password','$address')";

    $result = mysqli_query($conn , $insertQuery);

    if($result){
      ?>
  
        <script> alert("Data Inserted Properly."); </script>
  
      <?php
    }
    else{
  
      ?>
  
        <script> alert("Data Not Inserted."); </script>
  
      <?php
     
    }

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
<?php include "header.php" ?>

<!-- Main Section -->

<div class="dashboard-form">

   <form class="form" action="" method="post">

    <h1 class="heading"> Add New Delivery_Boy Details </h1>

    <div class="col-2">

      <div>
        <label for="name"> Enter Delivery Boy Name : </label>
        <input type="text" name="name" id="name" value="" autocomplete="off" placeholder="Enter Delivery Boy Name" required>
      </div>

      <div>
        <label for="password"> Enter Password : </label>
        <input type="password" name="password" id="password" value="" autocomplete="off" placeholder="Enter Password" required>
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="contact"> Enter Contact Number : </label>
        <input type="text" name="contact" id="contact" value="" autocomplete="off" placeholder="Enter Contact Number " required>
      </div>     

    </div>

    <div>
      <label for="address"> Address : </label>
      <textarea type="text" name="address" id="address" value="" cols="30" rows="5" placeholder="Address" ></textarea>
    </div>

    <div class="buttons">
      
      <div class="col-2">

      <div>
        <input type="submit" name="submit" class="btn" value="Submit">
      </div>
      
      <div>
        <input type="submit" name="back" class="btn-1" value="Back">
      </div>
      
      </div>

    </div>

   </form>
   
</div>
   




<!-- --------------- JavaScript File ---------------- -->
  <script src="main.js"></script>

</body>
</html>