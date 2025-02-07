<?php
session_start();
unset($_SESSION['ROLE']);
unset($_SESSION['IS_LOGGEDIN']);

header('location:login.php');
die();



?>