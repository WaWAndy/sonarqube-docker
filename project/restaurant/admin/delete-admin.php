<?php


    // include constant.php file here
    include('../config/constants.php');


    // 1. get the id of Admin to be deleted
    $id = $_GET['id'];

    // 2. create sql query to delete Admin
    $sql ="DELETE FROM tbl_admin WHERE id=$id";

    // Execute the Query
    $res = mysqli_query($conn, $sql);

    // check whether the query exectuted successfuly or not
    if($res==TRUE)
    {
        // Query Executed successfuly and admin deleted
        // echo "Admin Deleted";

        // Create a Session Variable to Display Message
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";

        // redirect to manage Admin page
        header('location:' .SITEURL. 'admin/manage-admin.php');
    }
    else
    {
        // Failed to delete admin
        // echo "Failded to Delete Admin";
        $_SESSION['delete'] = "<div class='error'>Failed to delete Admin. Try Again Later.</div>";

        // redirect to manage Admin page
        header('location:' .SITEURL. 'admin/manage-admin.php');
    }

    // 3. Redirect to Manage page with message (succes/error)


?>