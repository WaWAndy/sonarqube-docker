<?php include('../config/constants.php');?> 


<?php

    // 1. Destroy the session
    session_destroy(); // Unset $_SESSION['user']

    // 2. Redirect to the login page
    header('location:'.SITEURL.'admin/login.php');






?> 