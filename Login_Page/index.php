<?php
include 'connect.php' ;
if(isset($_POST['add_product'])){
    $product_name=$_POST['product_name'];
    $product_email = $_POST['product_email'];
    $product_password = $_POST['product_password'];
    

    $insert_query=mysqli_query($conn,"insert into `product` (name,email,password) values
    ('$product_name','$product_email','$product_password')")or die("Insert query Failed");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Cart</title>
    <!-- Css Link -->
     <link rel="stylesheet" href="style.css">

    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
     
</head>
<body>

    <!-- Form Section -->
     <div class="cart-container">
     <div class="container">
        <!-- message container -->
         <?php
         if(isset($display_message)){
            echo " <div class='display_message'>
            <span>$display_message</span>
            <i class='fas fa-times' onclick='this.parentElement.style.display = `none`';></i>
         </div>";
         }
         ?>
        
        <section>
            <h3 class="heading">
                Login
            </h3>
            <form action="" class="add_product" method="post" enctype="multipart/form-data" >
               
                <input type="text" name="product_name" placeholder="Enter Your Name" class="input_fields" required>
                <input type="email" name="product_email" min = "0 " placeholder="Enter Your email" class="input_fields" required>
                <input type="password" name="product_password" class="input_fields" placeholder="Enter Your Password"  required>
                <input type="submit"name="add_product" class="submit_btn" value="Login">
              
            </form>
        </section>
     </div>
     </div>
 
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>
