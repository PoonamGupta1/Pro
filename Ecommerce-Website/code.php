<?php
session_start();
include 'connection.php';
if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $insert_query = "insert into users(first_name,last_name,email,username,password) values ('$first_name','$last_name','$email', '$username','$password') ";
    $insert_query_run = mysqli_query($conn, $insert_query);
    if ($insert_query_run) {
        $_SESSION['status'] = "";
    }
}

?>
<?php
include 'pages/header.php'?>
        <div class="login" style="margin-top:100px;">
            <div class="col-4 bg-white border rounded p-4 shadow-sm m-auto">
                <form method="post">

                    <h1 class="h5 mb-3 fw-normal text-center">Signin</h1>

                    <div class="form-floating mt-1  ">
                        <label for="floatingInput"> first Name</label>
                        <input type="text" class="form-control rounded-0" placeholder="First Name" name="first_name">
                    </div>

                    <div class="form-floating mt-1  ">
                        <label for="floatingInput"> last Name</label>
                        <input type="text" class="form-control rounded-0" placeholder="Last Name" name="last_name">
                    </div>

                    <div class="form-floating mt-1">
                        <label for="floatingInput">email</label>
                        <input type="text" class="form-control rounded-0" placeholder="Email " name="email">
                    </div>

                    <div class="form-floating mt-1">
                        <label for="floatingInput">username</label>
                        <input type="text" class="form-control rounded-0" placeholder="Username" name="username">
                    </div>

                    <div class="form-floating mt-1">
                        <label for="floatingPassword">password</label>
                        <input type="password" class="form-control rounded-0" id="floatingPassword" placeholder="Password" name="password">
                    </div>


                    <div class="mt-3 d-flex justify-content-between align-items-center">
                        <button class="btn btn-primary" type="submit" name="submit" class="text-center">Sign Up</button>
                    </div>

                </form>
            </div>
        </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibx29j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <?php
    include 'pages/footer.php';
    ?>