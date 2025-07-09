<?php include('partials/menu.php');?>


        <!---Menu Content Section Starts-->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>
                <br />

                <?php
                
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; // Displaying Seesion Message
                        unset($_SESSION['add']); // Removing session message
                    }
                    
                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }
                    if(isset($_SESSION['pwd-not-match']))
                    {
                        echo $_SESSION['pwd-not-match'];
                        unset($_SESSION['pwd-not-match']);
                    }
                    if(isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd'];
                        unset($_SESSION['change-pwd']);
                    }

                ?>
                <br><br><br>
                <!-- button to Add Admin-->
                <a href="add-admin.php" class="btn-primary">Add Admin</a>

                <br /><br /><br />

                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        // Query to Get all admin
                        $sql = "SELECT * FROM tbl_admin"; 
                        // Execute Query
                        $res= mysqli_query($conn, $sql);

                        // Ckeck wheter the Query is Executed or not
                        if($res==TRUE)
                        {
                            // Count rows to Check we have date in our DB or not
                            $count = mysqli_num_rows($res); //Fuction to get all the rows in DB
                            
                            
                            $sn=1; // Create a variable and Assign the value 




                            //Chech the num of rows
                            if($count>0)
                            {
                                // we have Date in DB
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    //Using While loop to get all the data from database
                                    // And while loop will run as long we have data in DB

                                    // Get Individual Data
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];

                                    // display value in our table
                                    ?>
                                      
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a> 
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a> 
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }
                            else
                            {
                                //We do have not date in DB
                            }
                        }

                    ?>
                </table>

            </div>
        </div>
        <!---Menu Content Section Ends-->

<?php include('partials/footer.php');?>





<!---arrete a la video a 52:02 episode 1 -->


