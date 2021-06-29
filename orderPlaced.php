<?php
$isLoggedIn = false;
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: loginhtml.php");
    }
    $isLoggedIn = true;
    $user = $_SESSION['username'];
    require("db_connect.php");

if(isset($_POST['placeOrder'])) {
    $total = $_POST['placeOrder'];

    $sql = 'select email from users where user_name = "'.$_SESSION['username'].'";';
    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_assoc($result);
    $to_email = $row['email'];


    $order = "";
    $sql = "SELECT * FROM `cart` WHERE user_name='".$user."'";

    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)) {
        $sql1 = "SELECT item_name from item where item_id = '".$row['item_id']."'; ";
        $result1 = mysqli_query($conn,$sql1);
        $row1 = mysqli_fetch_assoc($result1);
        $order = $order.''.$row1['item_name'].'
';
    }

    $body ='Hi '.$_SESSION['username'].'

'.'This is your order summary you have purchased: 

'.$order.'
Your Total including shipping charges is : '.$total.' rs
' ;

    $subject = "Order Summary";
    $headers = "From: photoshopcourse21@gmail.com";






    if (mail($to_email, $subject, $body, $headers)) {
        $sql = "delete from cart where user_name = '".$_SESSION['username']."';";
        $result = mysqli_query($conn,$sql);
    } else {
        echo "Email sending failed...";
    }

}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Online Shopping Website</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
      crossorigin="anonymous"
    />

    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
      integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
      integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
      crossorigin="anonymous"
    ></script>

    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  </head>

  <body>


    <?php
          echo '<div class="fixed-top alert alert-success alert-dismissible fade show" role="alert">
  <h4 class="alert-heading">Order Confirmation!</h4>
  <p>'.$user.', thank you for your order!</p>
  <hr>
  <p class="mb-0">We have received your order and will contact you as soon as your package is shipped. You can find your purchase information on your Registered Email ID.</p>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    ?>



    <div class="text-center" style="padding-top: 15rem  ">
        Click here to <br>
        <a href="index.php"><button class="btn btn-danger btn-lg">Continue Shopping</button></a>
    </div>
 
 </body>
</html>