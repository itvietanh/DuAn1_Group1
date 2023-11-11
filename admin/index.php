<?php
include "header.php";
//Controller
if  (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'dashboard':
            include 'home.php';
            break;

        case 'quanlyphim':
            include 'quanlyphim/quanlyphim.php';
            break;
        default:
            include 'home.php';
            break;

    }
}
include "footer.php";

?>