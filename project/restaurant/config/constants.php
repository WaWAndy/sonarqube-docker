<?php
  // start Session
  session_start(); 

  // error log 
  // error_reporting(E_ERROR | E_WARNING | E_PARSE);
  error_reporting(E_ERROR | E_WARNING);



  // create Constant to store non repeating values 
  define('SITEURL', 'http://localhost/restaurant/');
  define('LOCALHOST', 'localhost');
  define('DB_USERNAME', 'username');
  define('DB_PASSWORD', 'password');
  define('DB_NAME', 'food_order');

  $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysql_error()); // DB connection
  $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); // selecting DB

?>
