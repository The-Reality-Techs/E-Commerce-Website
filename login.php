<?php
    require('db_connect.php');
    
    $showError = false;
    $login = false;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username=$_POST['username'];
        $password=$_POST['password'];

        $sql = "SELECT * FROM `users` WHERE user_name = '$username';";
        $result = mysqli_query($conn,$sql);

        if(!$result) {
            header("location: loginhtml.php");
        }
        $num = mysqli_num_rows($result);

        if($num==1){
            while($row = mysqli_fetch_assoc($result)){
                if(password_verify($password,$row['password'])){
                    $login = true;
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    if($username == 'admin') {
                        header("location: adminDashboard.php");
                    }else {
                        header("location: index.php");
                    }

                }
                else{
                    $showError = "Invalid Credentials!";        
                }
            }
        }
        else {
            $showError = "Invalid Credentials!";
        } 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/loginstyle.css">
  
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  </head>
</head>
<body>
    <?php
        if($showError){
            echo 
            '<div class="fixed-top alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-exclamation-triangle"></i>  '
                .$showError.
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            require("loginhtml.php");
        }
    ?>
</body>