<?php
session_start();

session_destroy();

session_unset();

unset($_SESSION);

echo "<script>window.open('login.php?logged_out=You have logged out, come back soon!','_self')</script>";




?>
