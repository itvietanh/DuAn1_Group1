<?php
session_start();
include "../model/pdo.php";
include "../model/film.php";
include "../model/showTimeFrame.php";
include "../model/account.php";
include "../model/genre.php";
include "../model/thongke.php";
include "../model/ticket.php";
include "../model/room.php";
include "../model/cinema.php";
include "../model/order_seat.php";
include "../global.php";
include "header.php";
//Controller
if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
            //      Controller Phim
        case 'dashboard':
            include 'home.php';
            break;
        case 'quanlyphim':
            if (isset($_POST['kyw']) && $_POST['kyw'] != "") {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            $list_film = loadall_film($kyw);
            include 'quanlyphim/listFilm.php';
            break;
        case 'add_film':
            $list_genre = loadall_genre();
            $list_showTime = showTimeFrame();
            if (isset($_POST['btn_add'])) {
                $name = $_POST['name'];
                $rel_date = $_POST['rel_date'];
                $genre = $_POST['genre'];
                $showTimeFrame = $_POST['showTimeFrame'];
                $image = $img_path . $_FILES['image']['name'];
                $upFile = $img_path . basename($_FILES['image']['name']);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $upFile)) {
                    echo "Upload successfully";
                } else {
                    echo "Upload failed";
                }
                insert_film($name, $rel_date, $genre, $showTimeFrame, $image);
                $thongbao = "ADD FILM SUCCESSFULLY";
            }
            $list_film = loadall_film();
            include "quanlyphim/addFilm.php";
            break;
        case 'edit_film':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $edit_film = loadone_film($id);
                echo "<pre>";
                echo $edit_film;
                die();
            }
            $list_genre = loadall_genre();
            $list_showTime = showTimeFrame();
            include "quanlyphim/editFilm.php";
            break;
        case 'update_film':
            if (isset($_POST['btn_update']) && $_POST['btn_update']) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $rel_date = $_POST['rel_date'];
                $genre = $_POST['genre'];
                $image = $_FILES['image']['name'];
                $upFile = $img_path . basename($_FILES['image']['name']);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $upFile)) {
                    $image = $upFile;
                    //                    echo "Upload successfully";
                } else {
                    //                    echo "Upload failed";
                }
                update_film($name, $rel_date, $genre, $image, $id);
                $thongbao = "UPDATE FILM SUCCESSFULLY";
            }
            $list_genre = loadall_genre();
            $list_showTime = showTimeFrame();
            $edit_film = loadone_film($id);
            $list_film = loadall_film();
            include "quanlyphim/editFilm.php";
            break;
        case 'delete_film':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                delete_film($id);
            }
            $list_film = loadall_film();
            include "quanlyphim/listFilm.php";
            break;
        case 'list_film':
            $list_film = loadall_film();
            include "quanlyphim/listFilm.php";
            break;

            //      Controller Loai Phim
        case 'quanlyloaiphim':
            $list_genre = loadall_genre();
            include "quanlyloaiphim/listGenre.php";
            break;
        case 'add_genre':
            if (isset($_POST['btn_add'])) {
                $name = $_POST['name'];
                insert_genre($name);
                $thongbao = "ADD GENRE SUCCESSFULLY";
            }
            $list_genre = loadall_genre();
            include "quanlyloaiphim/addGenre.php";
            break;
        case 'edit_genre':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $edit_genre = loadone_genre($id);
            }
            include "quanlyloaiphim/editGenre.php";
            break;
        case 'update_genre':
            if (isset($_POST['btn_update']) && $_POST['btn_update']) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                update_genre($id, $name);
            }
            $list_genre = loadall_genre();
            include "quanlyloaiphim/listGenre.php";
            break;
        case 'delete_genre':
            if (isset($_GET['delete_genre'])) {
                $id = $_GET['id'];
                delete_genre($id);
            }
            $list_genre = loadall_genre();
            include "quanlyloaiphim/listGenre.php";
            break;
        case 'list_genre':
            $list_genre = loadall_genre();
            include "quanlyloaiphim/listGenre.php";
            break;
            //      Thêm khung giờ chiếu cho phim
        case 'showTimeFrame':
            if (isset($_GET['id_film']) && $_GET['id_film'] > 0) {
                $id = $_GET['id_film'];
                $film = load_film($id);
                $list_showTime = showTimeFrame();
                $list_room = load_room();
                $list_cinema = loadall_cinema();
            }
            include "quanlyphim/addShowTimeFrame.php";
            break;
        case 'add_showTimeFrame':
            if (isset($_POST['add_showTime']) && $_POST['add_showTime']) {
                $id_film = $_POST['id_film'];
                $show_date = $_POST['show_date'];
                $showTimeFrame = $_POST['showTimeFrame'];
                $room = $_POST['room'];
                $cinema = $_POST['cinema'];
                insert_showTimeFrame($show_date, $id_film, $showTimeFrame, $room, $cinema);
                $thongbao = "Thêm thành công";
            }
            $list_film = loadall_film();
            include "quanlyphim/listFilm.php";
            break;
        case 'quanlytaikhoan':
            $list_account = loadall_account();
            include "quanlytaikhoan/listAccount.php";
            break;

        case 'add_account':
            if (isset($_POST['btn_add']) && $_POST['btn_add']) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                insert_account($username, $password, $name, $email, $phone);
                $thongbao = "Thêm thành công";
            }
            include "quanlytaikhoan/addAccount.php";
            break;
        case 'list_account':
            $list_account = loadall_account();
            include "quanlytaikhoan/listAccount.php";
            break;
        case 'edit_account':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $account = loadone_account($id);
            }
            include "quanlytaikhoan/editAccount.php";
            break;
        case "update_account":
            if (isset($_POST['btn_update']) && $_POST['btn_update']) {
                $id = $_POST['id'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $role = $_POST['role'];
                update_account($id, $username, $password, $name, $email, $phone, $role);
                $thongbao = "Cập nhật tài khoản thành công";
            }
            $list_account = loadall_account();
            include "quanlytaikhoan/listAccount.php";
            break;
        case 'delete_account':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                delete_account($id);
                $thongbao = "Xóa tài khoản thành công";
            }
            $list_account = loadall_account();
            include "quanlytaikhoan/listAccount.php";
            break;
        case 'thongke':
            $thongke = loadall_thongke();
            include 'thongke/thongke.php';
            break;
        case 'bieudo':
            $thongke = loadall_thongke();
            include 'thongke/bieudo.php';
            break;
        case 'doanhthu':
            if (isset($_POST['filter']) && $_POST['filter'] != "") {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            $list_orderTicket = load_orderTicket($kyw);
            include "thongke/doanhthu.php";
            break;    
        case 'thongkebinhluan':
            $thongke = loadall_thongkebinhluan();
            include 'thongke/thongkebinhluan.php';
            break;
        case 'bieudo2':
            $thongke = loadall_thongkebinhluan();
            include 'thongke/bieudo2.php';
            break;
        case 'quanlyvedat':
            if (isset($_POST['filter']) && $_POST['filter'] != "") {
                (int)$kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            $list_orderTicket = loadOrder($kyw);
            include 'quanlyvedat/list_ticket.php';
            break;
        case 'quanlyvedatofphim':
            if (isset($_GET['id_film']) && $_GET['id_film'] > 0) {
                $id = $_GET['id_film'];
                $list_orderTicketOfFilm = loadTicketOfFilm($id);
            }
            include 'quanlyvedat/ticket_of_film.php';
            break;
        case 'confirmPayment':
            if (isset($_GET['id_order']) && $_GET['id_order'] > 0) {
                $id_order = $_GET['id_order'];
                updateStatusPayment($id_order);
            }
            $list_orderTicket = loadOrder();
            include "quanlyvedat/list_ticket.php";
            break;
        case 'quanlyve':
            $list_ticket = loadall_ticket();
            include 'quanlyve/listVe.php';
            break;
        case 'add_ticket':
            $list_film = loadall_film();
            if (isset($_POST['btn_add']) && $_POST['btn_add']) {
                $price = $_POST['price'];
                $id_film = $_POST['id_film'];
                insert_ticket($price, $id_film);
            }
            //     echo "<pre>";
            //   print_r($list_film);
            //   die();
            include "quanlyve/addVe.php";
            break;
        case 'edit_ticket':
            $id_ticket = $_GET['id'];
            $ticket = editTicket($id_ticket);
            $list_film = loadall_film();
            include "quanlyve/editVe.php";
            break;
        case 'update_ticket':
            if (isset($_POST['btn_update']) && $_POST['btn_update']) {
                $id_ticket = $_POST['id_ticket'];
                $price = $_POST['price'];
                $id_film = $_POST['id_film'];
                update_ticket($price, $id_film, $id_ticket);
            }
            $list_ticket = loadall_ticket();
            include 'quanlyve/listVe.php';
            break;
        case 'delete_ticket':
            $id_ticket = $_GET['id'];
            delete_ticket($id_ticket);
            $list_ticket = loadall_ticket();
            include 'quanlyve/listVe.php';
            break;
        case 'process_print':
            if (isset($_GET['id_order']) && $_GET['id_order'] > 0) {
                $id_order = $_GET['id_order'];
                $list_orderTicket = print_ticket($id_order);
                // echo "<pre>";
                // var_dump($list_orderTicket);die();
            }
            include "quanlyvedat/process_printTicket.php";
            break;    
        case 'print_ticket':
            if (isset($_GET['id_order']) && $_GET['id_order'] > 0) {
                $id_order = $_GET['id_order'];
                $list_orderTicket = print_ticket($id_order);
                // echo "<pre>";
                // var_dump($list_orderTicket);die();
                update_printTicket($id_order);
                header("Location: index.php?act=quanlyvedat");
            }
            include 'quanlyvedat/print_ticket.php';
            break;    
        default:
            include 'home.php';
            break;
    }
} else {
    if (isset($_POST['kyw']) && $_POST['kyw'] != "") {
        $kyw = $_POST['kyw'];
    } else {
        $kyw = "";
    }
    $list_film = loadall_film($kyw);
    include 'quanlyphim/listFilm.php';
}
include "footer.php";
