<?php 
    $list_genre = loadall_genre();
?>

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

    <title>FPOLY Cinema - Đặt vé xem phim</title>

    <style>
        .nice-select .list {
            background-color: #fff !important;
        }

        .ticket-search-form .form-group button {
            right: 20px
        }

        .ticket-search-form .form-group input {
            padding: 0 20px;
        }

        .ticket-search-form .form-group.large {
            width: 340px;
            justify-content: space-between;
        }
        
        .banner-section {
            padding: 170px 316px 170px;
            position: relative;
        }

        .movie-grid {
            height: 562px;
        }
        
        .widget-search .btn_search {
            width: auto;
            min-width: 150px;
            outline: none;
            color: #ffffff;
            height: 40px;
            border-radius: 20px;
            background-image: -webkit-linear-gradient(169deg, #5560ff 17%, #aa52a1 63%, #ff4343 100%);
        }

        .flaticon-loupe {
            position: absolute;
            left: 64px;
            line-height: 40px;
        }

        .error {
            color: red;
            margin: 10px 0 0 0;
        }

        table {
      
        }

        th {
            border-bottom: 3px solid #fff;
        }

        td {
            border: 1px solid #fff;
        }

        td, th {
            padding: 20px;
        }
    </style>

</head>

<body>
<!-- ==========Preloader==========-->
<!-- <div class="preloader">
   <div class="preloader-inner">
       <div class="preloader-icon">
           <span></span>
           <span></span>
       </div>
   </div> -->
<!--</div> -->
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
                <a href="index.php?act=home">
                    <h5>FPOLY Cinema</h5>
<!--                    <img src="../assets/images/logo/logo.png" alt="logo">-->
                </a>
            </div>
            <ul class="menu">
                <li>
                    <a href="index.php?act=home" class="active">Trang Chủ</a>
                </li>
                <li>
                    <a href="index.php?act=movie">Phim</a>
                    <ul class="submenu">
                    <?php foreach ($list_genre as $value) {
                    extract($value); ?>
                    <li>
                        <a href="index.php?act=film_by_genre&id=<?php echo $id?>"><?php echo $name?></a>
                    </li>
                <?php
                }?>
                    </ul>
                </li>
                <li>
                    <a href="#0">Xem Thêm</a>
                    <ul class="submenu">
                        <li>
                            <a href="index.php?act=my_ticket">Quản lý vé đặt</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="contact.html">Liên hệ</a>
                </li>
            </ul>
            <?php
                if (!isset($_SESSION['account'])) {
                    echo '<div class="login">
                            <li class="header-button pr-0">
                                <a href="index.php?act=login">Đăng nhập</a>
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
