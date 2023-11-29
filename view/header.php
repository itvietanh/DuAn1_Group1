<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from pixner.net/boleto/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Nov 2023 08:54:32 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $path?>assets/css/all.min.css">
    <link rel="stylesheet" href="<?php echo $path?>assets/css/animate.css">
    <link rel="stylesheet" href="<?php echo $path?>assets/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo $path?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo $path?>assets/css/odometer.css">
    <link rel="stylesheet" href="<?php echo $path?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $path?>assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo $path?>assets/css/nice-select.css">
    <link rel="stylesheet" href="<?php echo $path?>assets/css/jquery.animatedheadline.css">
    <link rel="stylesheet" href="<?php echo $path?>assets/css/main.css">

    <link rel="shortcut icon" href="<?php echo $path?>assets/images/favicon.png" type="image/x-icon">

    <title>Boleto  - Online Ticket Booking Website HTML Template</title>

    <style>
        .nice-select .list {
            background-color: #fff !important;
        }
    </style>

</head>

<body>
<!-- ==========Preloader==========-->
<!--<div class="preloader">-->
<!--    <div class="preloader-inner">-->
<!--        <div class="preloader-icon">-->
<!--            <span></span>-->
<!--            <span></span>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- ==========Preloader==========-->
<!-- ==========Overlay==========-->
<div class="overlay"></div>
<a href="#0" class="scrollToTop">
    <i class="fas fa-angle-up"></i>
</a>
<!-- ==========Overlay========== -->

<!-- ==========Header-Section========== -->
<header class="header-section">
    <div class="container">
        <div class="header-wrapper">
            <div class="logo">
                <a href="index.html">
                    <h5>FPOLY Cinema</h5>
<!--                    <img src="../assets/images/logo/logo.png" alt="logo">-->
                </a>
            </div>
            <ul class="menu">
                <li>
                    <a href="index.php?act=home" class="active">Home</a>
                </li>
                <li>
                    <a href="index.php?act=movie">movies</a>
                    <ul class="submenu">
                        <li>
                            <a href="movie-grid.html">Movie Grid</a>
                        </li>
                        <li>
                            <a href="movie-list.html">Movie List</a>
                        </li>
                        <li>
                            <a href="movie-details.html">Movie Details</a>
                        </li>
                        <li>
                            <a href="movie-details-2.html">Movie Details 2</a>
                        </li>
                        <li>
                            <a href="movie-ticket-plan.html">Movie Ticket Plan</a>
                        </li>
                        <li>
                            <a href="movie-seat-plan.html">Movie Seat Plan</a>
                        </li>
                        <li>
                            <a href="movie-checkout.html">Movie Checkout</a>
                        </li>
                        <li>
                            <a href="popcorn.html">Movie Food</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#0">cinema</a>
                    <ul class="submenu">
                        <li>
                            <a href="events.html">Events</a>
                        </li>
                        <li>
                            <a href="event-details.html">Event Details</a>
                        </li>
                        <li>
                            <a href="event-speaker.html">Event Speaker</a>
                        </li>
                        <li>
                            <a href="event-ticket.html">Event Ticket</a>
                        </li>
                        <li>
                            <a href="event-checkout.html">Event Checkout</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="contact.html">contact</a>
                </li>
            </ul>
            <?php
                if (!isset($_SESSION['account'])) {
                    echo '<div class="login">
                            <li class="header-button pr-0">
                                <a href="index.php?act=login">Login</a>
                            </li>
                        </div>';
                } else {
                    extract($_SESSION['account']);
                    echo "<p>" . "Xin chào, " . "<b>" . $name . "</b>" . "<br>" . 
                    "<a href='index.php?act=logout'>" . "Đăng xuất" . "</a>" . 
                    "</p>";
                    if ($_SESSION['account']['role'] == 0) {
                        echo "<a href='admin/index.php'>". "Đăng nhập Admin" . "</a>";
                    } if ($_SESSION['account']['role'] == 1) {
                        echo "<a href='admin/index.php'>". "Đăng nhập Nhân Viên" . "</a>";
                    } 
                }
            ?>
        </div>
    </div>
</header>
