<?php
    require('db_connect.php');
    
    $showError = false;
    $showAlert = false;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $repassword=$_POST['repassword'];

        $sql = "SELECT * FROM `users` WHERE user_name = '$username';";
        $result = mysqli_query($conn,$sql);

        if(!$result) {
            header("location: signuphtml.php");
        }
        $num = mysqli_num_rows($result);

        if($num>0){
            $showError = "Username Already Exists!";
        }
        else{

            if($password == $repassword) {
                $hash = password_hash($password,PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`user_name`, `email`, `password`) VALUES ('$username', '$email', '$hash');";
                $result = mysqli_query($conn,$sql);
                if($result) {
                    $showAlert = true;
                }
                else echo 'HII';
            }
            else{
                $showError = "Passwords do not match!";
            }

        } 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/loginstyle.css">
  
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
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
            require("signuphtml.php");
        }
        if($showAlert){
            echo
            '<div class="fixed-top alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i><strong> Success!</strong> Your account is now created and you can login
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            require("loginhtml.php"); 
        }    
    ?>
</body>