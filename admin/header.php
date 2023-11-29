<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div id="wrapper">

        <header>
            <div class="container">
                <div id="header_main">
                    <div class="header_logo">
                        <h1>FPOLY Cinema Manager</h1>
                    </div>

                    <nav class="header_menu">
                        <?php if ($_SESSION['account']['role'] == 0) {
                        ?>
                            <li><a href="index.php?act=dashboard">Dashboard</a></li>
                            <li><a href="index.php?act=quanlyphim">Quản lý phim</a></li>
                            <li><a href="index.php?act=quanlyloaiphim">Quản lý loại phim</a></li>
                            <li><a href="index.php?act=quanlytaikhoan">Quản lý tài khoản</a></li>
                            <li><a href="index.php?act=quanlyve">Quản lý vé</a></li>
                            <li><a href="index.php?act=quanlyvedat">Quản lý vé đặt</a></li>
                            <li><a href="index.php?act=thongke">Thống kê</a></li>
                            <li><a href="index.php?act=thongkebinhluan">Thống kê bình luận</a></li>
                            <li><a href="http://localhost/DuAn1_Group1/index.php?act=home">Thoát trang Admin</a></li>
                        <?php
                        } else {
                            ?>
                                <li><a href="index.php?act=quanlyphim">Dashboard</a></li>
                                <li><a href="index.php?act=quanlyvedat">Quản lý vé đặt</a></li>
                                <li><a href="http://localhost/DuAn1_Group1/index.php?act=home">Thoát trang Nhân Viên</a></li>
                            <?php
                        } ?>

                    </nav>
                </div>
            </div>
        </header>