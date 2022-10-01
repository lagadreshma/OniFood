<?php

session_start();
include "connection.php";
include "function.php";
$msg = "";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select * from admin where username='$username' and password='$password'";
    $query = mysqli_query($conn,$sql);

    if(mysqli_num_rows($query) == 1){
        $row = mysqli_fetch_assoc($query);
        $_SESSION['IS_LOGIN'] = 'Yes';
        redirect('index.php');
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Login </title>

    <!-- Matrial Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .two-col{
            display: flex;
            gap: 10px;
            padding-bottom: 30px;
        }
        .admin{
            max-width:1200px;
            margin-top: 50px;
            margin-left: 400px;
        }
        .admin h2{
            color: #7380ec;
            font-size: 30px;
            margin-bottom: 50px;
        }
        .admin form{
            padding: 30px 50px;
            background: #f6f6f9;
            width: 500px;
            height: 400px;
        }
        .admin .form input{
           padding: 10px 20px;
           outline: none;
           width: 100%;
           border: 1px solid #7380ec;
           border-radius: 5px;
        }
        .admin .two-col span{
           font-size: 18px;
           margin-top: 10px;
        }
        .admin .form .btn{
            background: #7380ec;
            font-size: 16px;
            color: #fff;
            margin-bottom: 30px;
            width: 25%;
            cursor: pointer;
            transition: all 0.5s ease-in-out;
        }
        .admin .btn:hover{
            background: rgb(73, 73, 219);
        }
        .admin .answer{
            margin-top: 15px;
            color: red;
            background:rgb(255, 193, 193);
        }

        /* media Query for login form */

        @media only screen and (max-width: 1110px){

        .admin{
            margin: 50px;
        }

        }

        @media only screen and (max-width: 990px){

        .admin{
            margin: 20px;
        }
        .admin h2{
            font-size: 25px;
            margin-bottom: 40px;
        }
        .admin form{
            width: 450px;
            height: 400px;
        }
        .admin .form input{
           padding: 10px 20px;
           width: 100%;
        }
        .admin .form .btn{
            font-size: 18px;
        }
        .admin .answer{
            margin-top: 8px;
        }


        }

        @media only screen and (max-width: 800px){

        .admin{
            margin: 20px;
        }
        .admin form{
            padding: 30px 20px;
            width: 400px;
            height: 400px;
        }
        .admin h2{
            font-size: 25px;
            margin-bottom: 40px;
        }
        .admin .form input{
           padding: 10px 15px;
           width: 80%;
        }
        .admin .form .btn{
            font-size: 14px;
        }
        .admin .answer{
            margin-top: 5px;
        }

        }

        @media only screen and (max-width: 600px){

         .admin{
            margin: 10px;
         }
         .admin form{
            padding: 20px 10px;
            width: 300px;
            height: 300px;
        }
        .admin h2{
            font-size: 20px;
            margin-bottom: 40px;
        }
        .admin .form input{
           padding: 10px 10px;
           font-size: 12px;
        }
        .admin .form .btn{
            font-size: 12px;
        }
        .admin .answer{
            margin-top: 6px;
        }

        }

        @media only screen and (max-width: 600px){
          
        .admin form{
            width: 250px;
            height: 300px;
        }
        .admin .form input{
           padding: 10px 10px;
        }
        .admin .answer{
            margin-top: 3px;
            font-size: 12px;
        }

        }



    </style>

</head>
<body>
    
<div class="admin">
<form action="" method="post">

    <h2> Admin Login </h2>

    <div class="form">

        <div class="two-col">
          <span class="material-icons-sharp">perm_identity</span>
          <input type="text" name="username" placeholder="Username" autocomplete="off" required> 
        </div>

        <div class="two-col">
          <span class="material-icons-sharp">lock_open</span>
          <input type="password" name="password" placeholder="Password" required>
        </div>

        <div>
          <input type="submit" name="login" class="btn" value="Login">
        </div>
    </div>
    <div class="answer"> <?php echo $msg ?> </div>
</form>

</div>

</body>
</html>