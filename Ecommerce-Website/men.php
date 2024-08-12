<?php
require_once "connection.php";
$sql = "SELECT * FROM product";
$all_product = $conn->query($sql);
?>
<?php
include 'pages/header.php';
?>  
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
          <p >
                <i class="fas fa-star" ></i>
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
              document.getElementById("badge").innerHTML = data.num_cart +1;
            }
          }
          xml.open("GET", "connection.php?id=" + id, true);
          xml.send();

        })
      }
    </script>

  <?php

  include 'pages/footer.php';
  ?>