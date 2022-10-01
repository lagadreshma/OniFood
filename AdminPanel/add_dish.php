<?php

include "connection.php";
include "function.php";

if(isset($_POST['submit'])){

    $dish_name = $_POST['name'];
    $category = $_POST['category'];
    $rate = $_POST['rate'];
    $price = $_POST['price'];
    $image = $_FILES['image'];
    $dish_class = $_POST['class'];

    $image_name = $image['name'];
    $image_tmp = $image['tmp_name'];
  

    $fileext = explode('.',$image_name);
    $filecheck = strtolower(end($fileext));

    $fileextsarray = array('png','jpg','jpeg');

    if(in_array($filecheck,$fileextsarray)){

      $destinationfile = 'Upload/' . $image_name;
      move_uploaded_file($image_tmp,$destinationfile);

      $insertQuery = "insert into dishes(dish_name,category,rate,price,dish_image,class)values('$dish_name','$category','$rate','$price','$destinationfile','$dish_class')";
    
      $result = mysqli_query($conn, $insertQuery);

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

<!-- ---------------- Navigation Bar --------------- -->

<?php  include "header.php"  ?>

<!-- Main Section -->

<div class="dashboard-form">

   <form class="form" action="" method="post" enctype="multipart/form-data">

    <h1 class="heading"> Add New Dish Details </h1>

    <div class="col-2">

      <div>
        <label for="dish_name"> Enter Dish Name : </label>
        <input type="text" name="name" id="dish_name" value="" autocomplete="off" placeholder="Enter Dish Name" required>
      </div>

      <div>
        <label for="rate"> Enter Dish Rate : </label>
        <input type="text" name="rate" id="rate" value="" autocomplete="off" placeholder="Enter Dish Rate" required>
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="category"> Enter Dish Category : </label>
        <input type="text" name="category" id="category" value="" autocomplete="off" placeholder="Enter Dish Category" required>
      </div>

      <div>
        <label for="price"> Enter Dish Price : </label>
        <input type="text" name="price" id="price" value="" autocomplete="off" placeholder="Enter Dish Price" required>
      </div>      

    </div>

   <div class="col-2">
    <div>
      <label for="class"> Enter Dish Class : </label>
      <input type="text" name="class" id="class" value="" autocomplete="off" placeholder="Enter Dish Class" required>
    </div>
   </div> 

    <div>
      <input type="file" name="image" value="" required>
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