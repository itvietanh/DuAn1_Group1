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
                include "view/phim.php";
                break;
            case 'login':
                include "view/login.php";
                break;
            case 'sign_up':
                include "view/signup.php";
                break;
            case 'ct_phim':
                include "view/chitietphim.php";
                break;
            default:
                include "view/home.php";
        }
    } else {
        include "view/home.php";
    }
    include "view/footer.php";
?>