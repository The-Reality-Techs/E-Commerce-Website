<?php
$isLoggedIn = false;
session_start();
if (isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
  $isLoggedIn = true;
}

require "db_connect.php";
$sql1 = 'select * from item where category = "women" order by Rating desc limit 5;';
$result1 = mysqli_query($conn, $sql1);

$sql2 = 'select * from item where category = "men" order by Rating desc limit 5;';
$result2 = mysqli_query($conn, $sql2);

$sql3 = 'select * from item where category = "kids" order by Rating desc limit 5;';
$result3 = mysqli_query($conn, $sql3);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <title>Online Shopping Website</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />

  <link rel="stylesheet" href="css/style.css" />
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <section class="header">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light scrolling-navbar">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><span class="navbar-brand-head">FASHION</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link navLink" href="#"><span class="nav-link-white">Home</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link navLink" href="#categories"><span class="nav-link-white">Shop</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link navLink" href="#foot"><span class="nav-link-white">Contact Us</span></a>
            </li>
            <?php
            if (!$isLoggedIn) {
              echo '<li class="nav-item">
                  <a class="nav-link" href="loginhtml.php"><button type="button" class="loginbtn btn btn-light">Login</button></a>
                </li>';
            } else {
              echo '<li class="nav-item">
                  <a class="nav-link navLink" href="cart.php"><span class=" cart nav-link-white"><i class="fas fa-shopping-cart"></i> Cart</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php"><button type="button" class="loginbtn btn btn-light">Logout</button></a>
                </li>';
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>

    <div id="carouselExampleCaptions" class="carousel slide pt-2" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/red2.jpg" class="d-block w-100 carousel-image" alt="...">

        </div>
        <div class="carousel-item">
          <img src="images/girl.jpg" class="d-block w-100 " alt="...">

        </div>
        <div class="carousel-item">
          <img src="images/yellow1.jpg" class="d-block w-100" alt="...">

        </div>
        <div class="carousel-item">
          <img src="images/woman.jpg" class="d-block w-100" alt="...">

        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

  </section>

  <section class="main">
    <div class="container py-5" id="custom-cards">
      <div class="heading pb-2 pt-5 border-bottom">
        <h1 class="big text-center" id="categories">Categories</h1>
        <h2 class="mb-4 text-center">CATEGORIES</h2>
      </div>

      <div class="row row-cols-3 align-items-stretch py-5">
        <div class="col col-lg-4 col-md-6 col-sm-12" style="height: 30rem;">
          <a href="men.php">
            <div class="
                card card-cover
                h-100
                overflow-hidden
                text-white
                bg-dark
                rounded-5
                shadow-lg
              " style="
                background-image: url('images/cat1.jpg');
                background-position: center;
              ">
              <div class="
                  d-flex
                  flex-column
                  h-100
                  p-5
                  pb-3
                  text-white text-shadow-1
                ">
                <h2 class="card-text pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">
                  Short title, long jacket
                </h2>
                <ul class="d-flex list-unstyled mt-auto">
                  <li class="me-auto">
                    <img src="images/cat1.jpg" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white" />
                  </li>
                  <li class="d-flex align-items-center me-3">
                    <svg class="bi me-2" width="1em" height="1em">
                      <use xlink:href="#geo-fill"></use>
                    </svg>
                    <small>Earth</small>
                  </li>
                  <li class="d-flex align-items-center">
                    <svg class="bi me-2" width="1em" height="1em">
                      <use xlink:href="#calendar3"></use>
                    </svg>
                    <small>3d</small>
                  </li>
                </ul>
              </div>
            </div>
          </a>
        </div>

        <div class="col col-lg-4 col-md-6 col-sm-12" style="height: 30rem;">
          <a href="women.php">
            <div class="
                card card-cover
                h-100
                overflow-hidden
                text-white
                bg-dark
                rounded-5
                shadow-lg
              " style="
                background-image: url('images/cat2.jpg');
                background-position: center;
              ">
              <div class="
                  d-flex
                  flex-column
                  h-100
                  p-5
                  pb-3
                  text-white text-shadow-1
                ">
                <h2 class="card-text pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">
                  Much longer title that wraps to lines
                </h2>
                <ul class="d-flex list-unstyled mt-auto">
                  <li class="me-auto">
                    <img src="images/cat2.jpg" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white" />
                  </li>
                  <li class="d-flex align-items-center me-3">
                    <svg class="bi me-2" width="1em" height="1em">
                      <use xlink:href="#geo-fill"></use>
                    </svg>
                    <small>Pakistan</small>
                  </li>
                  <li class="d-flex align-items-center">
                    <svg class="bi me-2" width="1em" height="1em">
                      <use xlink:href="#calendar3"></use>
                    </svg>
                    <small>4d</small>
                  </li>
                </ul>
              </div>
            </div>
          </a>
        </div>

        <div class="col" style="height: 30rem;">
          <a href="kids.php">
            <div class="
                card card-cover
                h-100
                overflow-hidden
                text-white
                bg-dark
                rounded-5
                shadow-lg
              " style="
                background-image: url('images/cat3.jpg');
                background-position: center;
              ">
              <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">
                  Another longer title belongs here
                </h2>
                <ul class="d-flex list-unstyled mt-auto">
                  <li class="me-auto">
                    <img src="images/cat3.jpg" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white" />
                  </li>
                  <li class="d-flex align-items-center me-3">
                    <svg class="bi me-2" width="1em" height="1em">
                      <use xlink:href="#geo-fill"></use>
                    </svg>
                    <small>California</small>
                  </li>
                  <li class="d-flex align-items-center">
                    <svg class="bi me-2" width="1em" height="1em">
                      <use xlink:href="#calendar3"></use>
                    </svg>
                    <small>5d</small>
                  </li>
                </ul>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div>
      <div class="heading pb-2 pt-5 border-bottom">
        <h1 class="big text-center">Season Sale</h1>
        <h2 class="mb-4 text-center">SEASON SALE</h2>
      </div>

      <!-- Season sale carousel -->
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/1.jpg" height="500px" class="d-block w-100 carousel-image" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/2.jpg" height="500px" class="d-block w-100 " alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/3.jpg" height="500px" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>


    </div>


    <div>
      <div class="heading pb-2 pt-5 border-bottom">
        <h1 class="big text-center">Women's Fashion</h1>
        <h2 class="mb-4 text-center">WOMEN'S FASHION</h2>
      </div>
      <div class="container px-0 py-5">
        <div class="row">

          <?PHP
          while ($row1 = mysqli_fetch_assoc($result1)) {
            echo ' <div class="col ps-0 pe-2">
                <div class="card" style="width: 13.5rem;">
                  <a href="women.php"><img src="images/' . $row1["image"] . '" class="p-2 card-img-top" alt="..." style="height: 17.5rem"></a>
                  <div class="card-body p-2 pt-0">
                  <h6 class="mb-0">' . $row1["item_name"] . '</h6>
                  <p class="mb-0">' . $row1['description'] . '</p>
                  <p class="card-text">&#8377; ' . $row1["price"] . '</p>
                </div>
              </div>
            </div> ';
          }
          ?>

        </div>
      </div>
      <div>

        <div>
          <div class="heading pb-2 pt-5 border-bottom">
            <h1 class="big text-center">Men's Fashion</h1>
            <h2 class="mb-4 text-center">MEN'S FASHION</h2>
          </div>
          <div class="container px-0 py-5">
            <div class="row">

              <?PHP
              while ($row2 = mysqli_fetch_assoc($result2)) {
                echo ' <div class="col ps-0 pe-2">
                <div class="card" style="width: 13.5rem;">
                  <a href="men.php"><img src="images/' . $row2["image"] . '" class="p-2 card-img-top" alt="..." style="height: 17.5rem"></a>
                  <div class="card-body p-2 pt-0">
                  <h6 class="mb-0">' . $row2["item_name"] . '</h6>
                  <p class="mb-0">' . $row2['description'] . '</p>
                  <p class="card-text">&#8377; ' . $row2["price"] . '</p>
                </div>
              </div>
            </div> ';
              }
              ?>

            </div>
          </div>
          <div>

            <div>
              <div class="heading pb-2 pt-5 border-bottom">
                <h1 class="big text-center">Kid's Fashion</h1>
                <h2 class="mb-4 text-center">KID'S FASHION</h2>
              </div>
              <div class="container px-0 py-5 mb-5">
                <div class="row">


                  <?PHP
                  while ($row3 = mysqli_fetch_assoc($result3)) {
                    echo ' <div class="col ps-0 pe-2">
                <div class="card" style="width: 13.5rem;">
                  <a href="kids.php"><img src="images/' . $row3["image"] . '" class="p-2 card-img-top" alt="..." style="height: 17.5rem"></a>
                  <div class="card-body p-2 pt-0">
                  <h6 class="mb-0">' . $row3["item_name"] . '</h5>
                  <p class="mb-0">' . $row3['description'] . '</p>
                  <p class="card-text">&#8377; ' . $row3["price"] . '</p>
                </div>
              </div>
            </div> ';
                  }
                  ?>

                </div>
              </div>

  </section>
  <?php require("footer.php"); ?>
</body>

</html>