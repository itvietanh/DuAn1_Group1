<?php
    include "global.php";
    include "view/header.php";
    if (isset($_GET['act']) && $_GET['act'] != "") {
        $act = $_GET['act'];
        switch ($act) {
            case 'home':
                $list_film = loadall_film_home();
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