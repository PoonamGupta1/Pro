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
          document.getElementById("badge").innerHTML = data.num_cart + 1;
        }
      }
      xml.open("GET", "connection.php?id=" + id, true);
      xml.send();

    })
  }
</script>

 <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibx29j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="contact.js"></script>

</body>

</html>