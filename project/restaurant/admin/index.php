
<?php include('partials/menu.php');  ?>

        <!---Menu Content Section Starts-->
        <div class="main-content">
            <div class="wrapper">
                <h1>Dashboard</h1>
                <br><br>
                <?php
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <br><br>

                <div class="col-4 text-center">

                    <?php
                        // SQL query
                        $sql = "SELECT * FROM tbl_category";
                        // Execute query
                        $res = mysqli_query($conn, $sql);
                        // Count rows
                        $count = mysqli_num_rows($res);

                    ?>
                    <h1><?php echo $count; ?></h1>
                    <br />
                    Categories
                </div>
                <div class="col-4 text-center">

                    <?php
                        // SQL query
                        $sql2 = "SELECT * FROM tbl_food";
                        // Execute query
                        $res2 = mysqli_query($conn, $sql2);
                        // Count rows
                        $count2 = mysqli_num_rows($res2);

                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br />
                    Foods
                </div>
                <div class="col-4 text-center">

                    <?php
                        // SQL query
                        $sql3 = "SELECT * FROM tbl_order";
                        // Execute query
                        $res3 = mysqli_query($conn, $sql3);
                        // Count rows
                        $count3 = mysqli_num_rows($res3);

                    ?>

                    <h1><?php echo $count3; ?></h1>
                    <br />
                    Total Orders
                </div>
                <div class="col-4 text-center">

                    <?php 
                    
                        // Cretate sql query to get total revenue generated 
                        // Aggregate function in sql
                        $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'"; // Calcule les revenus de tous les plats DELIVREES

                        // Execute the query 
                        $res4 = mysqli_query($conn, $sql4);

                        // Get the value 
                        $row4 = mysqli_fetch_assoc($res4);

                        // Get the total revenue
                        $total_revenue = $row4['Total'];


                    
                    ?>

                    <h1>$<?php echo $total_revenue; ?></h1>
                    <br />
                    Revenue Generated
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!---Menu Content Section Ends-->

<?php include('partials/footer.php');  ?>       





<!-- la fonction update food dans l'admin panel ne fonctione pas toujours  -->
<!-- l'ajout de nouveaux plats ne renvoie pas vers la page manage food lorsque l'ajout a ete fait. En plus il affiche les resultats.'  -->
<!-- a ameliorer: les images montres dans catégories sont bizarrement affiches   -->
<!-- a ameliorer: les images montres dans foods sont bizarrement affiches   -->



<!--- Je suis obligé d'inserer des backslash dans les textes de description des palts afin qu'ils puissent entrer dans la bd->
<
<!-- a ameliorer: personnaliser le site avec des menus plats differents  -->
<!-- a ameliorer: augmenter la quantite de contenu (nbr de menus, plats, commandes etc) -->
<!-- a ameliorer: personnaliser le site avec des menus plats differents  -->
<!-- a ameliorer: changer de md 5 ou le modifier (ajouter une cle unique) -->
<!-- workaround: dans la page order, j'ai modifier le fomat de l'heure et la date pour qu'elle puisse s'inserer dans la db -->

 