<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>

        <br><br>

        <?php
        
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            
        
        
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the food">
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description"  cols="30" rows="5" placeholder="Description of the food"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>  
                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">

                            <?php
                                // Create PHP to display cotegories fron DB
                                // 1 create SQL query to get all active categories form DB
                                $sql ="SELECT * FROM tbl_category WHERE active='Yes'";

                                // Executing query
                                $res = mysqli_query($conn, $sql);

                                // Count rows to check whether we have categories or not 
                                $count = mysqli_num_rows($res);

                                // If count is grater than zero we have categories else we do not have categories 
                                if($count>0)
                                {
                                    // We have some categories
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        // Get the details of categories
                                        $id = $row['id'];
                                        $title = $row['title'];
                                        
                                        ?>

                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                        <?php
                                    }
                                }
                                else
                                {
                                    // We do have categories
                                    ?>
                                    <option value="0">No categories Found</option>
                                    <?php
                                }

                                //2. Display on drop down
                            

                            ?>

                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspawn="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>

                </tr>
            </table>

        </form>

        <?php 

        // Check whether the button is clicked or not 
        if(isset($_POST['submit']))
        {
            //Add the food in database

            // 1. get the data from form 
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];

            // Check wheteher radion button for featured and active is checked or not 
            if(isset($_POST['featured']))
            {
                $featured = $_POST['featured'];
            }
            else
            {
                $featured = "No"; // Setting the default value 
            }

            if(isset($_POST['active']))
            {
                $active = $_POST['active'];
            }
            else
            {
                $active = "No"; // Setting default value 
            }

            // 2. Upload the image if selected
            // Check whether the selected image is clicked or not and upload the image 
            // Only if the image is selected 
            if(isset($_FILES['image']['name']))
            {
                // Get the details of the selected image 
                $image_name = $_FILES['image']['name'];
                

                // Check whether the image is Selected or not and upload image if selected
                if($image_name!="")
                {
                    // Image is selected

                    // A. Reneame the image
                    // Get the exetension of selected image(jpg, png, gif, etc. )
                    $ext = end(explode('.', $image_name));

                    //Create new name for image
                    $image_name = "Food-Name-".rand(0000,9999).".".$ext;


                    // B. Upload the image
                    // Get the source path and the destination path 

                    // Source path is the current location of the image 
                    $src = $_FILES['image']['tmp_name'];
                    print_r($_FILES);

                    // Destination path for the image to be uploaded
                    $dst = "../images/food/".$image_name;
                    error_log("src $src dst $dst");
                    // FinalyUpload the food image 
                    $upload = move_uploaded_file($src, $dst);

                    // Check wheteher rhe image is uploaded or not 
                    if($upload==false)
                    {
                        // Failed to upload the image
                        // Redirect to add food page with error message 
                        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image</div>";
                        header('location:'.SITEURL.'admin/add-food.php');
                        // Stop the process 
                        die();

                    }

                }

            }
            else
            {
                $image_name = ""; // Setting default value as blank
            }

            // 3. Insert into database

            // Create a SQL Query to save or add food 
            // For numericals value we dont need to pass value into quotes '' but for strin value.
            // It is composary to add quotes

            $sql2 = "INSERT INTO tbl_food SET
                title = '$title',
                description = '$description',
                price = $price,
                image_name = '$image_name',
                category_id = '$category',
                featured = '$featured',
                active = '$active'
            ";

            // Execute the query 
            $res2 = mysqli_query($conn, $sql2);
            // Check wheteher data inserted or not
             // 5. Redirect with the masssage to manage food
            if($res2 == true)
            {
                // Data inserted successfully
                $_SESSION['add'] = "<div class='success'>Food Added Successfully.</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
            }
            else
            {
                $_SESSION['add'] = "<div class='error'>Failed to add food.</div>";
                header('lcoation:'.SITEURL.'admin/manage-food.php');
            }
            // 4. Upload the image if selected 
            
        }

        ?>





    </div>
</div>


<?php include('partials/footer.php'); ?>