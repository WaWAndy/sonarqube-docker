<?php include('../config/constants.php'); ?>





<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        
    <div class="login">
        <h1 class="text-center">login</h1>
        <br><br>

        <?php
        
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

            if(isset($_SESSION['no-login-message']))
            {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
        
        ?>
        <br><br>


        <!-- Login Form Starts Here-->

        <form action="" method="POST" class="text-center">
        
        Username: <br>
        <input type="text" name="username" placeholder="Enter Username"><br><br>

        Password: <br>
        <input type="password" name="password" placeholder="Enter Password"><br><br>

        <input type="submit" name="submit" value="login" class="btn-primary">
        <br><br>
        </form>


        <!-- Login Form Ends Here-->

        <p class="text-center">Created By <a href=""> Andy Seifarth</a></p>

    </div>

    </body>



</html>

<?php

    // Check whether the submit button is pressed or not 
    if(isset($_POST['username']))
    {
        // Proccess for Login
        //1. Get the data from Login form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        
        // 2 . SQL to ckeck whether the user with username and password exist or not 

        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
        //3. Execute the query  
        $res = mysqli_query($conn, $sql); 

        // 4. count rows to check the user exisSt or not 
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            // user available and login success
            $_SESSION['login'] = "<div class='success'>Login Successfull.</div>";
            $_SESSION['user']= $username; // To check if the user is logged or not and then logout will unset this variable



            // Redirect to home page/Dashboard
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            // User not available and login fail
            $_SESSION['login'] = "<div class='error text-center'> Username or password not match</div>";
            // Redirect to home page/Dashboard
            header('location:'.SITEURL.'admin/login.php');
        }

    }


?>