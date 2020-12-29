<?php
  // 1. Create a database connection
  /
  $dbhost = "localhost";

  $dbuser = "PRIVATE";
  $dbpass = "PRIVATE";
  $dbname = "PRIVATE";
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  // set the text echoed for Vietnamese coding.
  mysqli_set_charset($connection, "utf8");
  // Test if connection succeeded
  if(mysqli_connect_error()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_error() . ")"
    );
  }



?>
