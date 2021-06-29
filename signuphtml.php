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

    <nav class="navbar navbar-expand-lg navbar-light scrolling-navbar">
        <div class="p-0 container-fluid container">
          <a class="navbar-brand" href="index.php"><span class="navbar-brand-head">FASHION</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php"><span class="nav-link-white">Home</span></a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="./index.php#categories"><span class="nav-link-white">Shop</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./index.php#foot"><span class="nav-link-white">Contact Us</span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <section class="Form mx-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-6 p-0 img-container">
                    <img src="images/loginImg.jpg" class="lgnimg img-fluid" alt="Login Image">
                </div>
                <div class="col-lg-6 p-0 logindetails text-center">
                    <form action="signup.php" method="post">
                        <img src="images/Contact-icon.png" class="Contact-icon text-center" alt="Contact-icon">
                        <h1 class="pb-3 heading">WELCOME</h1>
                        <div class="form-row">
                            <div class="col-lg-9 m-auto pb-2">
                                <input type="text" name="username" placeholder="Enter Username" class="form-control">
                            </div>            
                        </div>
                        <div class="form-row">
                            <div class="col-lg-9 m-auto pb-2">
                                <input type="email" name="email" placeholder="Enter Email" class="form-control">
                            </div>            
                        </div>
                        <div class="form-row">
                            <div class="col-lg-9 m-auto pb-2">
                                <input type="password" name="password" placeholder="Enter Password" class="form-control">
                            </div>            
                        </div>
                        <div class="form-row">
                            <div class="col-lg-9 m-auto pb-3">
                                <input type="password" name="repassword" placeholder="Re-Enter Password" class="form-control">
                            </div>            
                        </div>
                        <div class="form-row">
                            <div class="col-lg-9 m-auto">
                                <div class="pb-2 d-grid">
                                    <button type="submit" class="btn btn-secondary btn-lg">Sign Up</button>
                                </div>
                            </div>            
                        </div>
                        <p>Existing User? <a href="loginhtml.php" class="signup">Log in</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>