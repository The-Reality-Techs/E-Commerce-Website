<?php
    echo $_SESSION['loggedin'];
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: loginhtml.php");
    }

    require("db_connect.php");
    $user = $_SESSION['username'];

    $id = $_GET['id'];
    $sql = "SELECT * FROM `cart` WHERE item_id='".$id."' AND user_name='".$user."'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
   
    if($num==0){
        $sql = "INSERT INTO `cart`(`user_name`,`item_id`) VALUES ('".$user."','".$id."');";
        $result = mysqli_query($conn,$sql);
       
    }

    $sql = "SELECT * FROM `item` WHERE item_id='".$id."';";
    $result = mysqli_query($conn,$sql);
            
    while($row = mysqli_fetch_assoc($result)){
        $cat = $row['category']; 
    }
    header("location: ".$cat.".php");
?>