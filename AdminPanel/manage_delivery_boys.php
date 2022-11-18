<?php

session_start();
include "connection.php";
include "function.php";

if(!isset($_SESSION['IS_LOGIN'])){
    redirect("admin_login.php");
}

if(isset($_POST['delete'])){

    $dBoy_id = $_POST['id'];
    
    $sql = "delete from delivery_boys where id = '$dBoy_id' ";
    $query = mysqli_query($conn, $sql);

    if($query){

        echo "<script> alert('Deleted Successfully.'); </script>";
        echo "<script> window.location.href = 'manage_delivery_boys.php'; </script>";

    }
    else{

        die(mysqli_error($conn));

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

<?php  include "header.php"  ?>
    

<!-- Main Section -->

<div class="dashboard-form">

   <div class="display">

     <div class="col-2">
        <h1> Delivery Boys </h1>
        <div>
        <form class="form" action="" method="get">
            <input type="text" name="search" value="" autocomplete="off" placeholder="Search...">
            <button type="submit" name="search" class="search"> Search </button> 
        </form>
        </div>
     </div>

     <a href="add_boy.php"> Add+</a>

     <div class="table">

       <table>

        <thead>

          <tr>
            <th>id</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Password</th>
            <th>Address</th>
            <th>Added On</th>
            <th colspan="2">Action</th>
          </tr>

        </thead>

        <tbody>

        <?php

           $selectQuery = "select * from delivery_boys";

           $query = mysqli_query($conn,$selectQuery);

           $rows = mysqli_num_rows($query);

           $i = 1;

           while($res=mysqli_fetch_array($query)){


            ?>

            <tr>
                
                <td><?php echo $res['id']; ?></td>
                <td><?php echo $res['name']; ?></td>
                <td><?php echo $res['contact']; ?></td>
                <td><?php echo $res['password']; ?></td>
                <td><?php echo $res['address']; ?></td>
                <td><?php echo $res['added_on']; ?></td>
                <td>
                  <button class="update"><a href="update_boy.php?id=<?php echo $res['id']; ?>">Update</a></button>
                </td>
                <td>
                <form action="" method="post">
                  <button class="delete" name="delete">Delete</button>
                  <input type="hidden" name="id" value="<?php echo $res['id']; ?>"> 
                </td>
                
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
