<?php
ob_start();
session_start();
include "global.php";
include "model/pdo.php";
include "model/film.php";
include "model/genre.php";
include "model/account.php";
include "model/ticket.php";
include "model/order_seat.php";
include "model/payment.php";
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
                if (isset($_SESSION['account']) && $_SESSION['account']) {
                    $id_account = $_SESSION['account']['id'];
                }
                $price = loadone_ticket($id_film);
                $list_showdate = load_DateAndTime($id, $date, $id_film);
            }

            if (isset($_POST['order']) && $_POST['order']) {
                $seat_order = $_POST['selected_seats'];
                $price_total = $_POST['price'];
                $quantity = $_POST['hidden_quantity'];
                $show_date = $_POST['show_date'];
                $name_film = $_POST['name_film'];
                $time = $_POST['time'];
                $price_ticket = $_POST['price_ticket'];
                $id_film = $_POST['id_film'];
                $id_showTime = $_POST['id_showTime'];
                $temp = [$seat_order, $price['price'], $quantity, $name_film, $show_date, $price_total, $time, $id_film, $id_showTime];
                $_SESSION['seat_order'] = $temp;
                header("Location: index.php?act=checkout");
            }
            include "view/film_seat.php";
            break;
        case 'checkout':
            $id_account = $_SESSION['account']['id'];
            $order_date = date("Y-m-d h:i:sa");
            include "view/checkout.php";
            break;
        case 'payment':
            $seat_order = $_SESSION['seat_order'][0];
            $id_account = $_SESSION['account']['id'];
            $order_date = date("Y-m-d h:i:sa");
            $id_showTimeFrame = $_SESSION['seat_order'][8];
            $show_date = $_SESSION['seat_order'][4];
            $price = $_SESSION['seat_order'][5];
            $id_film = $_SESSION['seat_order'][7];
            $quantity = $_SESSION['seat_order'][2];
            if (isset($_POST['payment_choose']) && $_POST['payment_choose']) {
                if ($_POST['payment_choose'] == "payment_cash") {
                    $check_payment = "payment_cash";
                    insert_orderSeat($seat_order, $id_account, $order_date, $id_showTimeFrame, $show_date, $price, $id_film, $quantity, $check_payment);
                    header("Location: index.php?act=thank");
                    break;
                }

                if ($_POST["payment_choose"] == "paymentmomo_atm") {
                    header("Location: view/paymentmomo_atm.php");
                }
            }
            include "view/checkout.php";
            break;
        case 'thank':

            if (isset($_GET['partnerCode']) && $_GET['partnerCode']) {
                // Thông tin thanh toán
                $partnerCode = $_GET['partnerCode'];
                $orderId = $_GET['orderId'];
                $amount = $_GET['amount'];
                $orderInfo = $_GET['orderInfo'];
                $orderType = $_GET['orderType'];
                $transId = $_GET['transId'];
                $payType = $_GET['payType'];
                $seat_order = $_SESSION['seat_order'][0];
                // Thông tin vé đặt
                $id_account = $_SESSION['account']['id'];
                $order_date = date("Y-m-d h:i:sa");
                $id_showTimeFrame = $_SESSION['seat_order'][8];
                $show_date = $_SESSION['seat_order'][4];
                $price = $_SESSION['seat_order'][5];
                $id_film = $_SESSION['seat_order'][7];
                $quantity = $_SESSION['seat_order'][2];
                $check_payment = "paymentmomo_atm";
                //Insert thông tin vé đặt
                insert_orderSeat($seat_order, $id_account, $order_date, $id_showTimeFrame, $show_date, $price, $id_film, $quantity, $check_payment);
                // Insert thông tin thanh toán
                payment_momo($partnerCode, $orderId, $amount, $orderInfo, $orderType, $transId, $payType);
            }
            include "view/thank.php";
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
