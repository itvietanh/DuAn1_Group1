<?php
include "../model/pdo.php";
include "../model/film.php";
include "../model/showTimeFrame.php";
include "../model/account.php";
include "../model/genre.php";
include "../model/thongke.php";
include "../model/ticket.php";
include "../global.php";
include "header.php";
//Controller
if  (isset($_GET['act']) && $_GET['act'] != "") {
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
                $showTimeFrame = $_POST['showTimeFrame'];
                $image = $_FILES['image']['name'];
                $upFile = $img_path . basename($_FILES['image']['name']);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $upFile)) {
                    $image = $upFile;
//                    echo "Upload successfully";
                } else {
//                    echo "Upload failed";
                }
                update_film($name, $rel_date, $genre, $showTimeFrame, $image, $id);
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
            }
            include "quanlyphim/addShowTimeFrame.php";
            break;
        case 'add_showTimeFrame':
            if (isset($_POST['add_showTime']) && $_POST['add_showTime']) {
                $id_film = $_POST['id_film'];
                $show_date = $_POST['show_date'];
                $showTimeFrame = $_POST['showTimeFrame'];
                insert_showTimeFrame($show_date, $id_film, $showTimeFrame);
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
        case 'quanlyvedat':
            $list_orderTicket = loadall_orderTicket();
            include 'quanlyvedat/list_ticket.php';
            break;      
        default:
            include 'home.php';
            break;

    }
}
include "footer.php";

?>