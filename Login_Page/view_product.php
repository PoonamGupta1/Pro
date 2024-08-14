<?php 
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
        <!-- Css Link -->
        <link rel="stylesheet" href=  "style.css">
       

<!-- Font Awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
 
</head>
<body>
   <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark header_body">
<a href="index.php" class="logo navbar-brand">ShopFiz</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Add Products <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">View Products</a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="#">Shopit</a>
</li>
      <li class="nav-item active">
      <a href="" class="cart nav-link">
              <i class="fa-solid fa-cart-shopping"></i>
             <span>
                 <sup>0</sup>
             </span> 
           </a>
</li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>
</nav>
  <div class="container">
    <section class="display_product">
        <table>
          <thead>
            <th>Serial No.</th>
            <th>Product</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Action</th>
          </thead>
          <tbody>
            <!-- php code -->
             <?php
             $display_products = mysqli_query($conn,"Select * from `product`");
             $num =1;
             if(mysqli_num_rows($display_products)>0){
              while($row = mysqli_fetch_assoc($display_products)){
                $product_name=$row['name'];
              $product_price = $row['price'];
              $product_image = $row['image'];
           
               ?>

               <!-- display table -->
               <tr>
              <td><?php echo $num?></td>
              <td><img src="images/<?php echo $row['image']?> "  ></td>
              <td><?php echo $product_name?></td>
              <td><?php echo $product_price?></td>
              <td><a href="" class="delete_product_btn">
                <i class="fas fa-trash"></i>
                <a href="" class="update_product_name"><i class="fas fa-edit"></i>
                </a>
              </a></td>
            </tr>
               <?php
               $num++;
              }
             }else {
              echo 'No';
             }
             ?>
            
          </tbody>
        </table>
    </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>
