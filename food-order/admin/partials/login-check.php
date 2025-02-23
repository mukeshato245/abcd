<?php

// to check whether the admin is logged or not
if(!isset($_SESSION['user']))  // if user session is not set
{
    // user is not login
    // redirect to login page with message
    $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access login panel</div>";
    // redirect to login page
    header('location:'.SITEURL.'admin/login.php');
}
?>
