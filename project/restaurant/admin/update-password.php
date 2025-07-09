<?php include ('partials/menu.php');?>


<div class="main-content"> 
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>


        <?php
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        
        
        ?> 






        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Current Password: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>
                <tr>
                    <td>New Password: </td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>

                <tr>
                    <td colspawn="2">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">

                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>

<?php


        // Check whether the submit button is pressed or not 
        if (isset($_POST['submit']))
        {
            // echo "clicked";

            // 1 Get the Data form Form
            $id =$_POST['id'];
            $current_password = md5($_POST['current_password']);
            $new_password = md5($_POST['new_password']);
            $confirm_password = md5($_POST['confirm_password']);

            // 2 Check whether tge user with current id and urrent password exist or not
            $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";
            

            // Execute the query
            $res = mysqli_query($conn, $sql);

            if ($res==true)
            {
                // Ckeck whether data is availible or not
                $count=mysqli_num_rows($res);

                if($count==1)
                {
                    // User Exist and Password Can Be Changed
                    // echo "User Found";
                    // Check whether the new password and canfirm password match or not 
                    if($new_password==$confirm_password)
                    {
                        // Update the Password
                        // echo "password match";
                        $sql2 = "UPDATE tbl_admin SET
                            password='$new_password'
                            WHERE id=$id
                            ";
                        
                        // Execute the query
                        $res2 = mysqli_query($conn, $sql2);

                        // Check whether the query is exectuted or not 
                        if($res2==true)
                        {
                            //Display succes image
                            // Redirect to manage Admin Page with succes Message
                            $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully. </div>";
                            // redirect the user
                            header('location:'.SITEURL.'admin/manage-admin.php');
                        }
                        else
                        {
                            // DIspay error message
                            // Redirect to manage Admin Page with error Message
                            $_SESSION['change-pwd'] = "<div class='error'>Failed to change Password. </div>";
                            // redirect the user
                            header('location:'.SITEURL.'admin/manage-admin.php');
                            
                        }
                    }
                    else
                    {
                        // Redirect to manage Admin Page with Error Message
                        $_SESSION['pwd-not-match'] = "<div class='error'>Password Did Not Match. </div>";
                        // redirect the user
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }
                else
                {
                    // User does not exist set Message and Redirect
                    $_SESSION['user-not-found'] = "<div class='error'>User not Found. </div>";
                    // redirect the user
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }

            }


            //3 check whether the new password and control password match or not

            //4 uptade password if all abouve is true


            



        }
        
        

?>


<?php include ('partials/footer.php');?>