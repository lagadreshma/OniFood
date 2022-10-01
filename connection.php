<?php


$server = "localhost";
$user = "root";
$password = "";
$db = "project";


$conn = mysqli_connect($server, $user , $password, $db);

if($conn){

    ?>

      <!-- <script>
          alert("Connection Successful.");
      </script> -->

    <?php

}
else{

    die("no connection." . $mysqli_connect_error());

}






?>