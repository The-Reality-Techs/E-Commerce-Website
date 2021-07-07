<?php

    //development connnection
    //$server = "localhost:3307";
    //$username = "root";
    //$password="";
    //$database="e-commerce";

   $server = "remotemysql.com";
    $username = "mjwMDeVcd7";
    $password="hghfoE8chq";
    $database="mjwMDeVcd7";

    $conn = mysqli_connect($server,$username,$password,$database);
    
    if(!$conn){
        die("Sorry, we failed to connect ". mysqli_connect_error); 
    }
?>
