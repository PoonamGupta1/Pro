<?php
include 'pages/header.php';
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">ShopFiz</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item active">
        <a class="nav-link" href="firstPage.php">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="cart.php">Cart
          <i class="fa-solid fa-cart-shopping"></i>  <span class="sr-only">(current)</span> </a>
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
<div class="body">
    <div class="contact">
        <div class="text-center">
            <h1 class="mt-5">Contact Us</h1>
            <p class="lead">Contact Details</b></p>
            <p class="lead"><b>Phone Number : 91+ 1234567890 </b></p>
            <p class="lead"><b>Email Id : priya1234@gmail.com</b></p>
        </div>
    </div>
    </div>

<?php
include 'pages/footer.php';
?>