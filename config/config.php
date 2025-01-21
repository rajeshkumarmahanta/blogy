<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "blogy";

   $conn =  mysqli_connect($servername,$username,$password,$database);
   if(!$conn){
    echo "couldn't connect to db";
   }
?>