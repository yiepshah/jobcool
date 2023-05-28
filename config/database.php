<?php 
   
   define('DB_HOST', 'localhost');
   define('DB_USER', 'shahir');
   define('DB_PASS', '123456');
   define('DB_Name', 'jobcool');

   $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_Name);

   if($conn->connect_error){
    die('Connection Failed' . $conn->connect_error);
   }

//    echo 'CONNECTED!';