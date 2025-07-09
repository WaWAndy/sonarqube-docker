<?php include('partials/menu.php'); ?>


<div class="main_content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br></br>

        <?php
            if(isset($_SESSION['add'])) // Checking whether the Session is set or not
            {
                echo $_SESSION['add']; // Display the session Message if set
                unset($_SESSION['add']); // Remove Session Message
            }
        ?>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                        <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan=2>
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">

                    </td>
                </tr>

            </table>

        </form>
    </div>

</div>

<?php include('partials/footer.php'); ?>


<?php


    // Processs the value from a Form and save it in database
    // check wheter the button is clicked or not

    if(isset($_POST['submit']))
    {
        // buttun clicked

        // 1. Get the date from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); // Encypted Password with md5


        // 2. SQL Query to save the date into DB 
        $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";

        // 3. executing Query and save data into database      
        $res= mysqli_query($conn, $sql) or die(mysqli_error());

    
        // Check wheteher the (query is exectuted) data is inserted or not ans display appropriate message
        if($res==TRUE)
        {
            // data Inserted
            // echo "Data Inserted";
            // Create a Session Variable to Display Message
            $_SESSION['add'] = "Admin Added Successfully";
            // Redirect Page to manage admin
            header("location:".SITEURL.'/admin/manage-admin.php');
        }
        else
        {
            // Failed to insert
            //echo "Failed to Insert Data";
            // Create a Session Variable to Display Message
            $_SESSION['add'] = "Failed to Add Admin";
            // Redirect Page to Add Admin
            header("location:".SITEURL.'/admin/add-admin.php');

        }
    
    
    
    }



?>