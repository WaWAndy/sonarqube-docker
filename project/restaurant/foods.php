<?php error_log ('running' . $_SERVER['PHP_SELF']);?>

<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php

                // Display food that are active
                $sql = "SELECT * FROM tbl_food WHERE active='Yes'";
                error_log("$sql");

                // Execute the query
                $res = mysqli_query($conn, $sql);

                // Count rows 
                $count = mysqli_num_rows($res);
                error_log("$count");

                // Check whether the foods are available or not 
                if($count>0)
                {
                    // Foods available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        // Get the values
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        error_log("id $id title $title description $description price $price image_name $image_name");

                        ?>
                        <div class="food-menu-box">
                            <div class="food-menu-img">

                                <?php
                                    // Check whether image is available or not 
                                    if($image_name=="")
                                    {
                                        // Image not available
                                        echo "<div class='error'>Iamge not available</div>";
                                    }
                                    else
                                    {
                                        // Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price">$<?php echo $price; ?></p>
                                <p class="food-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    // Food not available
                    echo "<div class='error'>Food Not Found. </div>";
                }

            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>