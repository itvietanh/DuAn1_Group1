<?php
include "../model/pdo.php";
include "../model/film.php";
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
            include 'quanlyphim/quanlyphim.php';
            break;
        case 'add_film':
            if (isset($_GET['btn_add'])) {

            }
        default:
            include 'home.php';
            break;

    }
}
include "footer.php";

?>