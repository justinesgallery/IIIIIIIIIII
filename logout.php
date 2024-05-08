<?php  
session_start();

session_unset();
session_destroy();

header("Location: non-student-admin-login-screen.php");