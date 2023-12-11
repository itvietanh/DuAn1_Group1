<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        li>a {
            padding: 10px 20px;
        }

        a {
            color: #000;
        }

        a:hover {
            color: #fd9351;
        }

        .nav-down {
            z-index: 1;
        }

        .nav-down li {
            list-style: none;
            padding: 10px 0;
        }

        .nav-down li a {
            text-decoration: none;
        }

        #btn_confirm {
            width: 150px !important;
            height: 40px !important;
       
        }
        
    </style>
</head>

<body>
    <div id="wrapper">

        <header>
            <div class="container">
                <div id="header_main">
                    <div class="header_logo">
                        <h1>FPOLY Cinema Manager</h1>
                    </div>

                    <ul class="nav">
                        <?php if ($_SESSION['account']['role'] == 0) {
                        ?>
                            <li><a href="index.php?act=quanlyphim">Dashboard</a></li>
                            <!-- 
                            <li><a href="index.php?act=quanlyphim">Quản lý phim</a></li>
                            <li><a href="index.php?act=quanlyloaiphim">Quản lý loại phim</a></li>
                            <li><a href="index.php?act=quanlytaikhoan">Quản lý tài khoản</a></li>
                            <li><a href="index.php?act=quanlyve">Quản lý vé</a></li>
                            <li><a href="index.php?act=quanlyvedat">Quản lý vé đặt</a></li> -->
                            <li class="menu-item-subnav">
                                <a href="index.php?act=quanlyvedat">Quản lý</a>
                                <ul class="nav-down">
                                    <li><a href="index.php?act=quanlyphim">Quản lý phim</a></li>
                                    <li><a href="index.php?act=quanlyloaiphim">Quản lý loại phim</a></li>
                                    <li><a href="index.php?act=quanlytaikhoan">Quản lý tài khoản</a></li>
                                    <li><a href="index.php?act=quanlyve">Quản lý vé</a></li>
                                    <li><a href="index.php?act=quanlyvedat">Quản lý vé đặt</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-subnav">
                                <a href="index.php?act=thongke">Thống kê</a>
                                <ul class="nav-down">
                                    <li><a href="index.php?act=thongke">Thống kê số lượng đặt phim</a></li>
                                    <li><a href="index.php?act=doanhthu">Thống kê doanh thu</a></li>
                                    <li><a href="index.php?act=thongkebinhluan">Thống kê bình luận</a></li>
                                </ul>
                            </li>

                            <li><a href="http://localhost/DuAn1_Group1/index.php?act=home">Thoát trang Admin</a></li>
                        <?php
                        } else {
                        ?>
                            <li><a href="index.php?act=quanlyphim">Dashboard</a></li>
                            <li><a href="index.php?act=quanlyvedat">Quản lý vé đặt</a></li>
                            <li><a href="http://localhost/DuAn1_Group1/index.php?act=home">Thoát trang Nhân Viên</a></li>
                        <?php
                        } ?>

                    </ul>
                </div>
            </div>
        </header>