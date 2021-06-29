<?php
    $isLoggedIn = false;
    session_start();
    if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']==true){
      $isLoggedIn = true;
    }

require "db_connect.php";


$sql = 'select * from item where category = "women";';
$result = mysqli_query($conn,$sql);
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

    <link rel="stylesheet" href="css/cat.css" />
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


  </head>

  <body>
    <section class="header">
      <nav
        class="navbar fixed-top navbar-expand-lg navbar-light scrolling-navbar"
      >
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"
            ><span class="navbar-brand-head">FASHION</span></a
          >
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link navLink" href="index.php"
                  ><span class="nav-link-white">Home</span></a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link navLink" href="./index.php#categories"
                  ><span class="nav-link-white">Shop</span></a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link navLink" href="./index.php#foot"
                  ><span class="nav-link-white">Contact Us</span></a
                >
              </li>
              <?php
              if(!$isLoggedIn){
                echo '<li class="nav-item">
                  <a class="nav-link" href="loginhtml.php"><button type="button" class="loginbtn btn btn-light">Login</button></a>
                </li>';
              }
              else{
                echo '<li class="nav-item">
                  <a class="nav-link navLink" href="cart.php"><span class="cart nav-link-white"><i class="fas fa-shopping-cart"></i> Cart</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php"><button type="button" class="loginbtn btn btn-light">Logout</button></a>
                </li>' ;
              }
            ?>
            </ul>
          </div>
        </div>
      </nav>
      
      <div class="heading pb-2 pt-5 border-bottom">
          <h1 class="big text-center">Women's Fashion</h1>
          <h2 class="mb-4 text-center">WOMEN'S FASHION</h2>
      </div>

        <div class="container mb-5">
            <div class="row row-cols-3">

                <?php
                while($row = mysqli_fetch_assoc($result)) {
                    echo ' <div class="col card Card my-3 ">
                    <img src="images/'.$row["image"].'" class="p-2 card-img-top" alt="...">
                    <div class="row card-body pt-0 p-2">
                        <div class="col-6">
                            <h6>'.$row["item_name"].'</h6>
                            <p class="desc m-0">'.$row["description"].'</p>
                            <h6>&#8377; '.$row["price"].'</h6>
                        </div>
                        <div class="btN col-6 pt-2 pe-3">' ;
                            if($isLoggedIn) echo '<a href="storeCart.php?id='.$row["item_id"].'"><button class="btn btn-danger" type="button" id="add">Add to Cart</button></a>';
                            else echo '<a href="loginhtml.php"><button class="btn btn-danger" type="button" id="add">Add to Cart</button></a>';
                        echo '</div>
                    </div>
                </div>';
                }
                ?>



            </div>

        </div>
        <?php require("footer.php"); ?>
  </body>
  </html>

