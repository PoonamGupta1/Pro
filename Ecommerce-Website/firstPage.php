<?php
require_once "connection.php";
$sql = "SELECT * FROM product";
$all_product = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="shortcut icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSE-qhVKhd_OZUmYeT8_4Isd0FDCWNy_Eu1uu1-y3ughXah8PcCNNWf39gHkhE6RlwZZLU&usqp=CAU" type="image/x-icon">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/first.css">
  <title>ShopFiz</title>

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">ShopFiz</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item active">
        <a class="nav-link" href="contact.php">Contact Us</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="cart.php">Cart
          <i class="fa-solid fa-cart-shopping" style="color: white;"></i> <sup id="badge" style="color:white;font-size:1em">0</sup> <span class="sr-only">(current)</span> </a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
      </li>
    </form>
    <a href="code.php" class="btn btn-primary" type="submit" name="submit">Sign Up</a>

  </div>

</nav>


<!-- Slider  -->
<div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/first.png" class="d-block w-100 " alt="..." height="450px">
    </div>
    <div class="carousel-item">
      <img src="images/second.jpeg" class="d-block w-100" alt="..." height="450px">
    </div>
    <div class="carousel-item">
      <img src="images/third.webp" class="d-block w-100" alt="..." height="450px">
    </div>
    <div class="carousel-item">
      <img src="images/fourth.png" class="d-block w-100" alt="..." height="450px">
    </div>
    <div class="carousel-item">
      <img src="images/five.jpg" class="d-block w-100" alt="..." height="450px">
    </div>
    <div class="carousel-item">
      <img src="images/six.webp" class="d-block w-100" alt="..." height="450px">
    </div>
    <div class="carousel-item">
      <img src="images/seven.png" class="d-block w-100" alt="..." height="450px">
    </div>

  </div>
  <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev" style="background-color: transparent;outline:none;border:none;">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next" style="background-color: transparent; outline: none;border:none;">

    <span class="carousel-control-next-icon " aria-hidden="true">
    </span>
    <span class="sr-only">Next</span>
  </button>
</div>



<!-- Card -->
<!-- body start -->

<main style="padding:12px; background-color:cream;" >
  <div class="row" style="padding:12px;" >
    <?php
    while ($row = mysqli_fetch_assoc($all_product)) {

    ?>
      <div class="card" style="padding:4px;margin-top:20px;" >
                        <div class="images">
                            <img src="<?php echo $row["product_image"]; ?>" alt="" style="width:100%">
                        </div>
                        <div class="caption" style="margin-top: 0px;display:flex;justify-content:start;">
                            <p class="rate">
                                <i class="fas fa-star" style="color: gold;"></i>
                                <i class="fas fa-star" style="color: gold;"></i>
                                <i class="fas fa-star" style="color: gold;"></i>
                                <i class="fas fa-star" style="color: gold;"></i>
                                <i class="fas fa-star" style="color: gold;"></i>
                            </p>
                            <p class="product_name"><?php echo $row["product_name"];  ?></p>
                            <p class="price">$<?php echo $row["price"]; ?></p>
                            <p class="discount"><del>$<?php echo $row["discount"]; ?></del></p>
                            
                          </div>
                          
                           <button class="add" data-id="<?php echo $row["product_id"]; ?>" style="background-color:firebrick;color:white;outline:none;border:1px solid black;font-family:cursive">Add Cart</button>
                    </div>

            <?php
                }
            
            ?>
        </div>
    </main>


<?php
include 'pages/footer.php'?>
