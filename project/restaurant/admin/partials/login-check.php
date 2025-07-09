<?php


    // Authorisation - Access Control

    // Check Whether the user is logged in or not

    if(!isset($_SESSION['user'])) // If user session IS NOT SET!!!
    {
        // User is not logged in 
        // redirect to login with message
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access Adim panel.</div>";
        // Redirect to login page
        header('location:'.SITEURL.'admin/login.php');
    }


?>


