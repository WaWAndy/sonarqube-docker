<?php
    // Include Constants file
    include('../config/constants.php');

    // Check if the id and image_name value is set or not 
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        // Get the value and delete
        // echo "get value and delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        // Remove the physical image faile is available
        if($image_name != "")
        {
            //Image is availible
            $path = "../images/category/".$image_name;
            // Remove the image
            $remove = unlink($path);

            // If failed to remove image the add an error message and stop the process
            if($remove==false)
            {
                $_SESSION['remove'] = "<div class= 'error'> Failed to remove category image. </div>";
                // Redirect to manage category page
                header('location:'.SITEURL.'admin/manage-category.php');
                // Stop the proccess
                die();
            }
        }

        // Dekete data from DB
        // Sql query to delete date from DB
        $sql = "DELETE FROM tbl_category WHERE id=$id";
        
        // Execute the query 
        $res = mysqli_query($conn, $sql);

        // Check whether the data is deleted from DB or not 
        if($res==ture)
        {
            // Set success message and redirect 
            $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
            // Redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            // Set failed message and redirect 
            $_SESSION['delete'] = "<div class='error'>Failed to delete categoryy.</div>";
            // Redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php');
        }




    }
    else
    {
        // Redirect to Manage Category page
        header('location:'.SITEURL.'admin/manage-category.php');
    }
?>