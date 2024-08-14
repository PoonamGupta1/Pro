<?php global $user; ?>
<!-- <nav class="navbar navbar-expand-lg navbar-light bg-white border">
    <div class="container col-9 d-flex justify-content-between">
        <div class="d-flex justify-content-between col-8">
            <a class="navbar-brand" href="#">
                <img src="assets/images/img/pictogram.png" alt="" height="28">

            </a>

            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="looking for someone.." aria-label="Search">

            </form>

        </div>


        <ul class="navbar-nav  mb-2 mb-lg-0">

            <li class="nav-item">
                <a class="nav-link text-dark" href="#"><i class="bi bi-house-door-fill"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#"><i class="bi bi-plus-square-fill"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#"><i class="bi bi-bell-fill"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#"><i class="bi bi-chat-right-dots-fill"></i></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="assets/images/img/<?= $user['profile_pic'] ?>" alt="" height="30" class="rounded-circle border">
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="?editprofile">Edit Profile</a></li>
                    <?php
                    if (isset($_GET['success'])) {
                    ?>
                        <p class="text-success"> Profile is updated !</p>
                    <?php
                    }
                    ?>
                    <li><a class="dropdown-item" href="#">Account Settings</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
            </li>

        </ul>


    </div>
</nav> -->
<div class="container col-9 rounded-0 d-flex justify-content-between">
    <div class="col-12 bg-white border rounded p-4 mt-4 shadow-sm">
        <form method="post" action="assets/php/actions.php?updateprofile" enctype="multipart/form-data">
            <div class="d-flex justify-content-center">


            </div>
            <h1 class="h5 mb-3 fw-normal">Edit Profile</h1>
            <div class="form-floating mt-1 col-6">
                <img src="assets/images/<?= $user['profile_pic'] ?>" class="img-thumbnail my-3" style="height:150px;" alt="...">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Change Profile Picture</label>
                    <input class="form-control" type="file" id="formFile" name="profile_pic">
                </div>
            </div>
            <?= showError('profile_pic') ?>
            <div class="d-flex">
                <div class="form-floating mt-1 col-6 ">
                    <input type="text" class="form-control rounded-0" placeholder="username/email" name="first_name" value="<?= $user['first_name'] ?>">
                    <label for="floatingInput">first name</label>
                </div>

                <div class="form-floating mt-1 col-6">
                    <input type="text" class="form-control rounded-0" placeholder="username/email" name="last_name" value="<?= $user['last_name'] ?>">
                    <label for="floatingInput">last name</label>
                </div>
            </div>
            <?= showError('first_name') ?>
            <?= showError('last_name') ?>
            <div class="d-flex gap-3 my-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" <?= $user['gender'] == 1 ? 'checked' : '' ?> disabled>
                    <label class="form-check-label" for="exampleRadios1">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option2" <?= $user['gender'] == 2 ? 'checked' : '' ?> disabled>
                    <label class="form-check-label" for="exampleRadios3">
                        Female
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option3" <?= $user['gender'] == 0 ? 'checked' : '' ?> disabled>
                    <label class="form-check-label" for="exampleRadios2">
                        Other
                    </label>
                </div>
            </div>
            <div class="form-floating mt-1">
                <input type="email" name="email" value="<?= $user['email'] ?>" class="form-control rounded-0" placeholder="username/email" disabled>
                <label for="floatingInput">email</label>
            </div>

            <div class="form-floating mt-1">
                <input type="text" name="username" value="<?= $user['username'] ?>" class="form-control rounded-0" placeholder="username/email" name="username">
                <label for="floatingInput">username</label>
            </div>
            <?= showError('username') ?>
            <div class="form-floating mt-1">
                <input type="password" class="form-control rounded-0" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword"> new password</label>
            </div>

            <div class="mt-3 d-flex justify-content-between align-items-center">
                <button class="btn btn-primary" type="submit">Update Profile</button>



            </div>

        </form>
    </div>

</div>