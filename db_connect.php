<?php

    $server = "localhost:3307";
    $username = "root";
    $password="";
    $database="e-commerce";

    $conn = mysqli_connect($server,$username,$password,$database);
    
    if(!$conn){
        die("Sorry, we failed to connect ". mysqli_connect_error); 
    }
?>