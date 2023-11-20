<?php
    include "global.php";
    include "model/pdo.php";
    include "model/film.php";
    include "model/genre.php";
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
                include "view/login.php";
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
                    $list_showdate = loadall_showdate($date);
                    $list_date = load_date($id);
                }
                include "view/show_date.php";
                break;
            case 'show_date':
                $date = $_POST['choose_date'];
                $id = $_POST['id_film'];
                $list_date = load_date($id);
                $list_showdate = loadall_showdate($date);
                include "view/show_date.php";
                break;
            case 'film_seat':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $id = $_GET['id'];
                    $date = $_GET['date'];
                    $list_showdate = load_DateAndTime($id, $date);
                }
                include "view/film_seat.php";
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
?>