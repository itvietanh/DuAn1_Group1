<?php
    ob_start();
    session_start();
    include "global.php";
    include "model/pdo.php";
    include "model/film.php";
    include "model/genre.php";
    include "model/account.php";
    include "view/header.php";
    if (isset($_GET['act']) && $_GET['act'] != "") {
        $act = $_GET['act'];
        switch ($act) {
            case 'home':
                $list_film_cartoon = loadall_film_cartoon();
                $list_film_action = loadall_film_action();
                $list_genre = loadall_genre();
                include "view/banner.php";
                include "view/home.php";
                break;
            case 'movie':
                $list_film = loadall_film();
                $list_genre = loadall_genre();
                include "view/phim.php";
                break;
            case 'login':
                if (isset($_POST['btn_login']) && $_POST['btn_login']) {
                    $error = [];
                    if (empty($_POST['email'])) {
                        $error['email'] = "Bạn phải nhập email";
                    } else {
                        $email = $_POST['email'];
                    }

                    if (empty($_POST['password'])) {
                        $error['password'] = "Bạn phải nhập password";
                    } else {
                        $password = $_POST['password'];
                    }

                    if (!empty($error)) {
                        echo "Lỗi !!!";
                        echo "<p class='error'>" . $error['email'] . "</p>";
                        echo "<p class='error'>" . $error['password'] . "</p>";
                    } else {
                        $check_account = check_account($email, $password);
                        if (is_array($check_account)) {
                            $_SESSION['account'] = $check_account;
                            echo "<pre>";
                            header("Location: index.php");
                        } else {
                            $thongbao = "Tài khoản không tồn tại, vui lòng kiểm tra lại !!!";
                        }
                    }
                }
                include "view/login.php";
                break;
            case 'logout':
                session_unset();
                header("Location: index.php");
                break;
            case 'sign_up':
                include "view/signup.php";
                break;
            case 'ct_phim':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $id = $_GET['id'];
                    $film = film_detail($id);
                }
                $list_genre = loadall_genre();
                include "view/chitietphim.php";
                break;
            case 'film_by_genre':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $id = $_GET['id'];
                    $list_film = loadall_filmByGenre($id);
                }
                $list_genre = loadall_genre();
                include "view/film_by_genre.php";
                break;
            case 'bookticket':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $id = $_GET['id'];
                    $date = $_GET['date'];
                    $list_showdate = loadall_showdate($date, $id);
                    $list_date = load_date($id);
                }
                include "view/show_date.php";
                break;
            case 'show_date':
                $date = $_POST['choose_date'];
                $id = $_POST['id_film'];
                $list_date = load_date($id);
                $list_showdate = loadall_showdate($date, $id);
                include "view/show_date.php";
                break;
            case 'film_seat':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $id_film = $_GET['id_film'];
                    $id = $_GET['id'];
                    $date = $_GET['date'];
                    $list_showdate = load_DateAndTime($id, $date, $id_film);
                }
                include "view/film_seat.php";
                break;
            case 'checkout':
                include "view/checkout.php";
                break;
            default:
                $list_film_cartoon = loadall_film_cartoon();
                $list_film_action = loadall_film_action();
                $list_genre = loadall_genre();
                include "view/banner.php";
                include "view/home.php";
        }
    } else {
        $list_film_cartoon = loadall_film_cartoon();
        $list_film_action = loadall_film_action();
        $list_genre = loadall_genre();
        include "view/banner.php";
        include "view/home.php";
    }
    include "view/footer.php";
    ob_end_flush();
?>