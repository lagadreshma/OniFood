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
        <h1> Reviews </h1>
        <div>
        <form action="" method="get">
            <input type="text" name="search" value="" autocomplete="off" placeholder="Search...">
            <button type="submit" name="search" class="search"> Search </button> 
        </form>
        </div>
     </div>

     <div class="table">

       <table>

        <thead>

          <tr>
            <th>id</th>
            <th>UserName</th>
            <th>Rate</th>
            <th>Opinion</th>
            <th>Profile Image</th>
          </tr>

        </thead>

        <tbody>

        <?php

           require_once('connection.php');

           $selectQuery = "select * from customers_feedback";

           $query = mysqli_query($conn,$selectQuery);

           $rows = mysqli_num_rows($query);

           $i = 1;

           while($res=mysqli_fetch_array($query)){


            ?>

            <tr>
                <form action="" method="post">
                <td><?php echo $res['id']; ?></td>
                <td><?php echo $res['username']; ?></td>
                <td><?php echo $res['rate']; ?></td>
                <td><?php echo $res['opinion']; ?></td>
                <td><img src="<?php echo $res['profile_image']; ?>" width="150px" height="120px"></td>
                </form>
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
