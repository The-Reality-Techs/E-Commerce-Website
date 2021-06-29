<?php
$isLoggedIn = false;
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: loginhtml.php");
    }
    $isLoggedIn = true;
    require("db_connect.php");
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

    <link rel="stylesheet" href="css/cartstyle.css" />
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
    <script src="script.js"></script>
  </head>

  <body>
    <section class="header">
      <nav class="navbar navbar-expand-lg navbar-light scrolling-navbar">
        <div class="p-0 container-fluid Container">
          <a class="navbar-brand" href="index.php"><span class="navbar-brand-head">FASHION</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item p-1">
                <a class="nav-link" href="index.php"><span class="nav-link-white">Home</span></a>
              </li>
            <li class="nav-item p-1">
              <a class="nav-link" href="./index.php#categories"><span class="nav-link-white">Shop</span></a>
            </li>
            <li class="nav-item p-1">
              <a class="nav-link" href="./index.php#foot"><span class="nav-link-white">Contact Us</span></a>
            </li>
            <?php
              if($isLoggedIn){
                echo '
                <li class="nav-item">
                  <a class="nav-link" href="logout.php"><button type="button" class="btn btn-light"><span style="color: rgb(230, 99, 99);">Logout</span></button></a>
                </li>' ;
              }
            ?>
          </ul>
        </div>
      </div>
    </nav>
     
    </section>

    <div class="container main">
        <div class="row">
            <div class="col-9 details">
                <div class="text-center">
                        <h2>Shopping Cart</h2>
                </div>
                <hr class=tbl>


      
                <table class="table table-borderless">
                    <thead class="table-light">
                        <tr>
                            <th>PRODUCT</th>
                            <th>PRICE</th>
                            <th>QUANTITY</th>
                            <th>TOTAL</th>
                        </tr>
                    </thead>
                    <tbody class="table-light">
                <?php
                  if($isLoggedIn){
                    $orderPlaced = false;
                    $user = $_SESSION['username'];
                    $sql = "SELECT * FROM `cart` WHERE user_name='".$user."'";
                    $result = mysqli_query($conn,$sql);
                    $num = mysqli_num_rows($result);

                    while($row = mysqli_fetch_assoc($result)){
                        
                        $itemID = $row['item_id'];
                        $sql = "SELECT * FROM `item` WHERE `item`.`item_id` = '".$itemID."'";
                        $result1 = mysqli_query($conn,$sql);
                        
                      echo '<tr>';
                        while($row1 = mysqli_fetch_assoc($result1)){

                            $imgSrc = $row1["image"];
                            $itemName = $row1["item_name"];
                            $itemDesc = $row1["description"];
                            echo '
                              <td>
                                <div class="row">
                                  <div class="col-4">
                                    <img src="images/'.$imgSrc.'" class="tableimg" style="height: 8rem" alt="">
                                  </div>
                                  <div class="col-8"><p class="pt-4 mb-1 itemname">'.
                                    $itemName.'</p><p style="font-size: 0.8rem;" class="mb-1">'.
                                    $itemDesc
                                  .'</p>
                                  <a href="remove.php?id='.$itemID.'"><button type="button" class="btn btn-dark btn-sm removeBtn" style="font-size: 0.8rem;"><i class="far fa-trash-alt"></i> Remove</button></a></div>
                                </div>
                              </td>';
                            $price = $row1["price"];
                            echo '<td class="pt-5">&#8377; '.$price.'</td><input type="hidden" class="iprice" value="'.$price.'">
                            <td>
                                <div class="quantity buttons_added pt-4">
	                                <input type="button" value="-" class="minus">
                                  <input type="number" style="width: 40px" step="1" min="1" max="" onchange="subTotal()" name="quantity" value="1" title="Qty" class="text-center qty pt-1 pb-1" class="input-text qty text" size="4" pattern="" inputmode="">
                                  <input type="button" value="+" class="plus">
                                </div>
                            </td>
                            <td class="pt-5">&#8377; <span class="itotal">'.$price.'</span></td>';
                        }
                      echo '</tr>';

                    }
                  }
                ?>
                    </tbody>
                </table>
                <br>
            </div>

            <div class="col-3 orderSum text-center">
                <p class="heading">Order Summary</p>
                <hr>
                <p class="nofItems"><?php echo $num; ?> Items</p>
                <div class="row pt-4">
                    <div class="col">Subtotal:</div>
                    <div class="col">&#8377; <span id="subT"></span></div>
                </div>
                <div class="row">
                    <div class="col">Shipping:</div>
                    <div class="col">&#8377; <span id='shipping'></span></div>
                </div>
                <hr>
                <div class="row total">
                    <div class="col">Total:</div>
                    <div class="col">&#8377; <span id="cost">0</span></div>
                </div>
                <form action="orderPlaced.php" method="post">
                <a href="orderPlaced.php" style="text-decoration: none"><div class="d-grid gap-2 pt-4 pb-4">
                    <button type="submit" name="placeOrder" id="placeOrder" class="btn btn-danger">Place Order</button>
                </div></a>
                </form>  
            </div>
        </div>
    </div>


    <script>

        var iprice = document.getElementsByClassName("iprice");
        var itotal = document.getElementsByClassName("itotal");
        var qty = document.getElementsByClassName("qty");
        var gTotal = document.getElementById("subT");
        var cost = document.getElementById("cost");
        var ship = document.getElementById("shipping");
        var n = iprice.length;
        
        if(n==0) {
          ship.innerText = 0;
          cost.innerText = 0;
        }
        else ship.innerText = 50;
        
        function subTotal(){
          var sum=0 ;
          for(var i=0 ; i<iprice.length ; i++){
            itotal[i].innerText = iprice[i].value*qty[i].value;
            //console.log(itotal[i].innerText);
            sum += iprice[i].value*qty[i].value;
          }
          gTotal.innerText = sum;
          cost.innerText = sum+50;
          if(n==0) cost.innerText = 0;
          var btn = document.getElementById("placeOrder");
          btn.setAttribute('value',''+(sum+50));
        }

        subTotal();

    </script>


 </body>
</html>