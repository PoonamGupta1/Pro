<?php
require_once "connection.php";
$sql = "SELECT * FROM product2";
$all_product = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Women Session</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>

    <!-- navbar start -->
    <?php
    include "navbar.php";
    ?>
    <!-- navbar end -->

    <!-- body start -->
    <main style="padding:12px;">
        <div class="card-deck md-2">
            <?php
            while ($row = mysqli_fetch_assoc($all_product)) {

            ?>
                <div class="card" style="box-shadow: 2px 2px 2px 2px;">

                    <img src="<?php echo $row["product_image"]; ?>" alt="">

                    <div class="card-body">
                        <p class="rate">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </p>
                        <p class="product_name"><?php echo $row["product_name"]; ?> </p>
                        <p class="price">$ <?php echo $row["price"]; ?> </p>
                        <p class="discount"><del>$<?php echo $row["discount"]; ?></del></p>
                    </div>
                    <button class="add" data-id="<?php echo $row["product_id"]; ?>" style="background-color:firebrick;color:white;outline:none;border:1px solid black;font-family:cursive">Add Cart</button>
                </div>
            <?php
            }
            ?>
        </div>
        </div>
    </main>
    <!-- body end -->

    <!-- footer -->
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© 2024 Demo Ecommerce Website</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>



    <script>
        var product_id = document.getElementsByClassName("add");
        for (var i = 0; i < product_id.length; i++) {
            product_id[i].addEventListener("click", function(event) {
                var target = event.target;
                var id = target.getAttribute("data-id");

                var xml = new XMLHttpRequest();
                xml.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var data = JSON.parse(this.responseText);
                        target.innerHTML = data.in_cart;
                        document.getElementById("badge").innerHTML = data.num_cart + 1 ;
                    }
                }
                xml.open("GET", "connection.php?id=" + id, true);
                xml.send();

            })
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>