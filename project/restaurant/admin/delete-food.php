<?php

    // Include Constant Page
    include('../config/constants.php');



    // First whether walue is passed on url or not
    if(isset($_GET['id']) && isset($_GET['image_name'])) // You can ider use '&&' or 'AND'
    {
        // Proccess to delete
        // echo "Process to delete";

        // 1. Get id and image name 
        $id= $_GET['id'];
        $image_name = $_GET['image_name'];

        // 2. Remove he image if available
        // Check whether the image is available or not And delete only if available
        if($image_name != "")
        {
            // IT has image and need to remove from folder
            // Get the image path
            $path = "../images/food/".$image_name;

            // Remove image file from folder
            $remove = unlink($path);

            // Check whether the image is removed or not
            if($remove==false)
            {
                // Failed to remove Image
                $_SESSION['upload'] = "<div class='error'>Failed to remove image File</div>";
                // Redirect to manage food
                header('location:'.SITEURL.'admin/manage-food.php');
                // Stop the process of deletin food
                die();
            }
        }
        // 3. Delete food from DB
        $sql = "DELETE FROM tbl_food WHERE id=$id";

        // Execute the query
        $res = mysqli_query($conn, $sql);

        // Check whether the query executed or not and set the session message respectively
        // 4. Redirect to manage food with session message 
        if($res==true)
        {
            // Food deleted
            $_SESSION['delete'] = "<div class='success'>Food deleted Successfully.</div>";\
            header('location:'.SITEURL. 'admin/manage-food.php');
        }
        else
        {
            // Failed to manage food with session message. 
            $_SESSION['delete'] = "<div class='error'>Failed to delete food.</div>";\
            header('location:'.SITEURL. 'admin/manage-food.php');
        }


        

    }
    else
    {
        // Redirect to Manage Food Page
        // echo "Redirect";
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access</div>";
        header('location:'.SITEURL.'admin/manage-food.php');


    }

?>
