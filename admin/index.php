<?php
include "../model/pdo.php";
include "../model/film.php";
include "../model/showTimeFrame.php";
include "../model/genre.php";
include "header.php";
//Controller
if  (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'dashboard':
            include 'home.php';
            break;
        case 'quanlyphim':
            $list_film = loadall_film();
            include 'quanlyphim/listFilm.php';
            break;
        case 'add_film':
                $list_genre = loadall_genre();
                $list_showTime = showTimeFrame();
                include "quanlyphim/addFilm.php";
                break;
        case 'edit_film':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $edit_film = loadone_film($id);
                include "quanlyphim/editFilm.php";
                break;
            }
        default:
            include 'home.php';
            break;

    }
}
include "footer.php";

?>