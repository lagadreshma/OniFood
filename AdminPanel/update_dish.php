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


    <?php

include "connection.php";
include "function.php";


$id = $_GET['id'];


$sql = "select * from dishes where dish_id = {$id} ";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);

if(isset($_POST["submit"])){

  $updateid = $_GET['id'];

  $dish_name = mysqli_real_escape_string($conn, $_POST['name']);
  $rate =mysqli_real_escape_string($conn,  $_POST['rate']);
  $dish_image = mysqli_real_escape_string($conn, $_POST['image']);
  $category = mysqli_real_escape_string($conn, $_POST['category']);
  $price = mysqli_real_escape_string($conn, $_POST['price']);
  $class = mysqli_real_escape_string($conn, $_POST['class']);

 // $password = password_hash($pass, PASSWORD_BCRYPT);

  $updateQuery = "update dishes set dish_id=$updateid, dish_name='$dish_name', dish_image='$dish_image', category='$category', price='$price', rate='$rate', class='$class' where id =$updateid ";

  $result = mysqli_query($conn, $updateQuery);

  if($result){
    

    echo "<script> alert('Data Upadated Properly.'); </script>";
    echo "<script> window.location.href='manage_dish.php'; </script>";

    
  }
  else{

      echo "<script> alert('Data Not Upadated.'); </script>";

   
  }


}


?>



      <div>
        <label for="dish_name"> Enter Dish Name : </label>
        <input type="text" name="name" id="dish_name" value="<?php echo $result['dish_name']; ?>" autocomplete="off" placeholder="Enter Dish Name" required>
      </div>

      <div>
        <label for="rate"> Enter Dish Rate : </label>
        <input type="text" name="rate" id="rate" value="<?php echo $result['rate']; ?>" autocomplete="off" placeholder="Enter Dish Rate" required>
      </div>

    </div>

    <div class="col-2">

      <div>
        <label for="category"> Enter Dish Category : </label>
        <input type="text" name="category" id="category" value="<?php echo $result['category']; ?>" autocomplete="off" placeholder="Enter Dish Category" required>
      </div>

      <div>
        <label for="price"> Enter Dish Price : </label>
        <input type="text" name="price" id="price" value="<?php echo $result['price']; ?>" autocomplete="off" placeholder="Enter Dish Price" required>
      </div>      

    </div>

   <div class="col-2">
    <div>
      <label for="class"> Enter Dish Class : </label>
      <input type="text" name="class" id="class" value="<?php echo $result['class']; ?>" autocomplete="off" placeholder="Enter Dish Class" required>
    </div>
   </div> 

   <div>
      <input type="text" name="image" value="<?php echo $result['dish_image']; ?>" required>
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