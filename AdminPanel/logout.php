<?php

include "function.php";

session_start();
unset($_SESSION['IS_LOGIN']);
redirect('admin_login.php');

?>