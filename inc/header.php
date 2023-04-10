<?php
session_start();
include('config.php');
error_reporting(0);
?>

<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner"></div>
</div>
<!-- Spinner End -->


<!-- Topbar Start -->
<div class="container-fluid bg-dark px-5 d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i><a href="https://goo.gl/maps/ZgdicQihDJ5GbNwX9">Parul University, Vadodara, Gujarat</a></small>
                <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i><a href="tel:+917041854707"> 704 185 4707</a></small>
                <small class="text-light"><i class="fa fa-envelope-open me-2"></i><a href="https://mail.google.com/mail/?view=cm&fs=1&to=helpinghandweb4@gmail.com">helpinghandweb4@gmail.com</a></small>
            </div>
        </div>
        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://twitter.com/helpinghandweb4"><i class="fab fa-twitter fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.facebook.com/profile.php?id=100090031366271"><i class="fab fa-facebook-f fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.linkedin.com/in/helping-hands-4ba823265/"><i class="fab fa-linkedin-in fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.instagram.com/helpinghandweb4/"><i class="fab fa-instagram fw-normal"></i></a>

            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar & Carousel Start -->
<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark px-3 py-3 py-lg-0">
        <a href="index.php" class="navbar-brand p-0">
            <h1 class="m-0"><i class="fa fa-user-tie me-2"></i>HelpingHands</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.php" class="nav-item nav-link ">Home</a>
                <a href="product.php" class="nav-item nav-link">Product/Courses</a>
                <a href="about.php" class="nav-item nav-link">About</a>
                <a href="sell.php" class="nav-item nav-link">Sell </a>

                <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown active">Services</a>
                        <div class="dropdown-menu m-0">
                            <!-- <a href="purchase.php" class="dropdown-item">Purchase </a> --
                        </div>
                    </div> -->

                <a href="contact.php" class="nav-item nav-link">Contact</a>
                <!-- <a href="login.php" class="nav-item nav-link">Login</a> -->

                <?php if (!$_SESSION['user']) { ?>
                    <a href="login.php" class="nav-item nav-link">Login</a>
                <?php } else { ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown active">Hey, <?php
                                                                                                            $email = $_SESSION['user'];
                                                                                                            $sql = "SELECT name FROM users_info WHERE email=:email ";
                                                                                                            $query = $dbh->prepare($sql);
                                                                                                            $query->bindParam(':email', $email, PDO::PARAM_STR);
                                                                                                            $query->execute();
                                                                                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                                                                            if ($query->rowCount() > 0) {
                                                                                                                foreach ($results as $result) {
                                                                                                                    echo htmlentities($result->name);
                                                                                                                }
                                                                                                            } ?></a>
                        <div class="dropdown-menu m-0 ml-0">
                            <a href="profile.php" class="dropdown-item">Your Profile</a>
                            <!-- <a href="logout.php" class="dropdown-item">Log Out</a> -->
                            <a href="logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                <?php } ?>

            </div>

        </div>
    </nav>