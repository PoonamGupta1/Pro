<?php
require_once "connection.php";
$sql_cart  = "SELECT * FROM cart";
$all_cart = $conn->query($sql_cart);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSE-qhVKhd_OZUmYeT8_4Isd0FDCWNy_Eu1uu1-y3ughXah8PcCNNWf39gHkhE6RlwZZLU&usqp=CAU" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/cart.css">
    <title>Cart</title>
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
            <a class="nav-link" href="firstPage.php">Home <span class="sr-only">(current)</span> </a>
</li>
          <li class="nav-item active">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          
        </ul>
        <a href="code.php" class="btn btn-primary" type="submit" name="submit">Sign Up</a>

       
       
      </div>
    </nav>
    <main>
        <div class="row">
            <?php
            while ($row_cart = mysqli_fetch_assoc($all_cart)) {
                $sql = "SELECT * FROM product where product_id=" . $row_cart["product_id"];
                $sql2 = "SELECT * FROM product2 where product_id=" . $row_cart["product_id"];
                $all_product = $conn->query($sql) ;
                $conn->query($sql2);

                while ($row = mysqli_fetch_assoc($all_product)) {
            ?>

                    <div class="card" style="height:250px;width:400px;">
                        <div class="images">
                            <img src="<?php echo $row["product_image"]; ?>" alt="" style="height: 200px;width:100%">
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
                            <p class="discount">$<del><?php echo $row["discount"]; ?></del> </p>
                            <button class="btn btn-danger remove" data-id="<?php echo $row["product_id"]; ?> ">Delete</button>
                        </div>
                    </div>

            <?php
                }
            }
            ?>
        </div>
    </main>
    <script>
        var remove = document.getElementsByClassName("remove");
        for (var i = 0; i < remove.length; i++) {
            remove[i].addEventListener("click", function(event) {
                var target = event.target;
                var cart_id = target.getAttribute("data-id");

                var xml = new XMLHttpRequest();
                xml.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {

                        target.innerHTML = this.responseText;
                        target.style.opacity = .3;
                    }
                }
                xml.open("GET", "connection.php?cart_id=" + cart_id, true);
                xml.send();
            })
        }
    </script>

    <!-- Bootstrap Jsquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibx29j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>