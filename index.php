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
include "model/sendMail.php";
include "model/room.php";
include "model/comment.php";
include "phpqrcode/qrlib.php";
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
            if (isset($_POST['btn-search']) && $_POST['btn-search'] != "") {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            $list_film = loadall_film($kyw);
            $list_genre = loadall_genre();
            include "view/phim.php";
            break;
        case 'login':
            if (isset($_POST['btn_login']) && $_POST['btn_login']) {
                $error = [];
                if (empty($_POST['email']) ) {
                    $error['email'] = "Bạn phải nhập email";
                } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $error['email'] = "Bạn nhập email chưa đúng định dạng";
                } else {
                    $email = $_POST['email'];
                }

                if (empty($_POST['password'])) {
                    $error['password'] = "Bạn phải nhập password";
                } else {
                    $password = $_POST['password'];
                }

                if (!empty($error)) {
                    $_SESSION['error'] = $error;
                } else {
                    $check_account = check_account($email, $password);
                    // echo "<pre>";
                    // print_r($check_account);
                    // die();
                    if (is_array($check_account)) {
                        $_SESSION['account'] = $check_account;
                        unset($_SESSION['error']);
                        header("Location: index.php");
                    } else {
                        $error['error_emailOrPass'] = "Tài khoản hoặc mật khẩu không tổn tại, vui lòng nhập lại!";
                        $_SESSION['error'] = $error;
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
            if (isset($_POST['btn_signup']) && $_POST['btn_signup'] != "") {
                $error = [];
                if (empty($_POST['username']) && $_POST['username'] != "") {
                    $error['username'] = "Bạn phải nhập username";
                } else if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['username'])) {
                    $error['username'] = "Username không được chưa kí tự";
                } else {
                    $username = $_POST['username'];
                }
                
                if (empty($_POST['name']) && $_POST['name'] != "") {
                    $error['name'] = "Bạn phải nhập name";
                } else if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['name'])) {
                    $error['name'] = "name không được chưa kí tự";
                } else {
                    $name = $_POST['name'];
                }

                if (empty($_POST['email']) ) {
                    $error['email_signUp'] = "Bạn phải nhập email";
                } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $error['email_signUp'] = "Bạn nhập email chưa đúng định dạng";
                } else {
                    $email = $_POST['email'];
                }

                if (empty($_POST['password'])) {
                    $error['password_signUp'] = "Bạn phải nhập password";
                } else {
                    $password = $_POST['password'];
                }

                if (empty($_POST['phone'])) {
                    $error['phone'] = "Bạn phải nhập số điện thoại";
                } else if (is_numeric($_POST['phone'] == false) && $_POST['phone'] == "") {
                    $error['phone'] = "Bạn phải nhập số điện thoại là số!";
                } else if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['phone'])) {
                    $error['phone'] = "Số điện thoại không được nhập ký tự";
                } else if ($_POST['phone'] < 0 && $_POST['phone'] < 11) {
                    $error['phone'] = "Số điện thoại không tồn tại";
                }
                else {
                    $phone = $_POST['phone'];
                }

                if (!empty($error)) {
                    $_SESSION['error'] = $error;
                } else {
                    unset($_SESSION['error']);
                    insert_account($username, $password, $name, $email, $phone);
                }
            }
            include "view/signup.php";
            break;
        case 'forgot_password':
            if (isset($_POST['btn_forgot'])) {
                $error = [];
                if (empty($_POST['email']) ) {
                    $error['email_forGot'] = "Bạn phải nhập email";
                } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $error['email_forGot'] = "Bạn nhập email chưa đúng định dạng";
                } else {
                    $email = $_POST['email']; 
                }

                if (!empty($error)) {
                    $_SESSION['error'] = $error;
                } else {
                    unset($_SESSION['error']);
                    $account = checkEmail($email);
                    if ($account != false) {
                        $rand = rand(0, 999999);
                        $email = $account['email'];
                        $infoCode = [$rand, $email];
                        $_SESSION['code_forgot'] = $infoCode;
                        sendConfirmationAccount($rand, $email);
                        header("Location: index.php?act=confirm_code");
                    }
                }
            }
            include "view/forgot_password.php";
            break;    
        case 'confirm_code':
            // echo "<pre>";
            // printf($_SESSION['code_forgot']);
            // die();
            if (isset($_POST['btn_confirm'])) {
                $error = [];
                if (empty($_POST['code'])) {
                    $error['code'] = "Không được để trống";
                } else if (is_numeric($_POST['code'] == false) && $_POST['code'] == "") {
                    $error['code'] = "Bạn phải nhập số code là số!";
                } else if ($_POST['code'] != $_SESSION['code_forgot'][0]) {
                    $error['code'] = "Mã xác nhận không trùng khớp";
                } else {
                    $code = $_POST['code'];
                }

                if (!empty($error)) {
                    $_SESSION['error'] = $error;
                } else {
                    unset($_SESSION['error']);
                    header("Location: index.php?act=change_password");
                }
            }
            include "view/confim_code.php";
            break;
        case 'change_password':
            if (isset($_POST['btn_change'])) {
                $error = [];
                if (empty($_POST['password'])) {
                    $error['password_new'] = "Mật khẩu không được bỏ trống";
                } else {
                    $password = $_POST['password'];
                    $email = $_SESSION['code_forgot'][1];
                }

                if (!empty($error)) {
                    $_SESSION['error'] = $error;
                } else {
                    unset($_SESSION['error']);
                    setPassNew($password, $email);
                    include "view/change_success.php";
                    break;
                }
            }
            include "view/change_password.php";
            break;    
        case 'ct_phim':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $film = film_detail($id);
            }
            $list_comment = loadall_comment($id);
            $list_genre = loadall_genre();
            include "view/chitietphim.php";
            break;
        case 'comment':
            if (isset($_POST['send_comment']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $content = $_POST['comment'];
                $id_account = $_SESSION['account']['id'];
                $date = date("Y-m-d");
                insert_comment($id, $content, $id_account, $date);
            }
            $film = film_detail($id);
            $list_genre = loadall_genre();
            $list_comment = loadall_comment($id);
            // echo "<pre>";
            // print_r($list_comment);
            // die();
            include "view/chitietphim.php";
            break;
        case 'delete_comment':
            if (isset($_GET['id_comment']) && $_GET['id_comment'] > 0) {
                $id_film = $_GET['id'];
                $id_comment = $_GET['id_comment'];
                delete_comment($id_comment);
            }
            $film = film_detail($id_film);
            $list_genre = loadall_genre();
            $list_comment = loadall_comment($id_film);
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
                $room = $_GET['id_room'];
                $cinema = $_GET['id_cinema'];
                $list_showdate = loadall_showdate($date, $id, $room, $cinema);
                $list_date = load_date($id);
                $list_room = loadall_room($id);
                // echo "<pre>";
                // print_r($list_room);
                // die();
            }
            include "view/show_date.php";
            break;
        case 'show_date':
            if (isset($_POST['btn_show']) && $_POST['btn_show']) {
                $date = $_POST['choose_date'];
                $room = $_POST['choose_room'];
                $id = $_POST['id_film'];
                $id_cinema = $_POST['id_cinema'];
                $list_showdate = loadall_showdate($date, $id, $room, $id_cinema);
                $list_date = load_date($id);
                $list_room = loadall_room($id);
            }
            include "view/show_date.php";
            break;
        case 'film_seat':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id_film = $_GET['id_film'];
                $id = $_GET['id'];
                $date = $_GET['date'];
                $id_room = $_GET['room'];
                if (isset($_SESSION['account']) && $_SESSION['account']) {
                    $id_account = $_SESSION['account']['id'];
                }
                $price = loadone_ticket($id_film);
                $list_showdate = load_DateAndTime($id, $date, $id_film, $id_room);
                $list_orderTicket = loadall_orderTicket($date, $id, $id_film, $id_room);
            }

            if (isset($_POST['order']) && $_POST['order']) {
                $seat_order = $_POST['selected_seats'];
                $price_total = $_POST['price'];
                $quantity = $_POST['hidden_quantity'];
                $show_date = $_POST['show_date'];
                $name_film = $_POST['name_film'];
                $time = $_POST['time'];
                $id_film = $_POST['id_film'];
                $id_showTime = $_POST['id_showTime'];
                $id_room = $_POST['id_room'];
                $id_cinema = $_POST['id_cinema'];
                $room = $_POST['room'];
                $cinema = $_POST['cinema'];
                $temp = [$seat_order, $price['price'], $quantity, $name_film, $show_date, $price_total, $time, $id_film, $id_showTime, $id_room, $id_cinema, $room, $cinema];
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

            $username = $_SESSION['account']['name'];
            $email = $_SESSION['account']['email'];
            $name_film = $_SESSION['seat_order'][3];
            $time = $_SESSION['seat_order'][6];
            $id_room = $_SESSION['seat_order'][9];
            $id_cinema = $_SESSION['seat_order'][10];
            $room = $_SESSION['seat_order'][11];
            $cinema = $_SESSION['seat_order'][12];
            $orderId = time() ."";
            if (isset($_POST['payment_choose']) && $_POST['payment_choose']) {
                if ($_POST['payment_choose'] == "payment_cash") {
                    $check_payment = "payment_cash";
                    $path = "./images_qrcode/";
                    $qrcode = $path.time().".png";
                    QRcode :: png("$username " . "$email " . "$name_film " . "$room " . "$cinema " . "$order_date " . "$price " . "$seat_order ", $qrcode, 'H', 3, 3);
                    insert_orderSeat($seat_order, $id_account, $order_date, $id_showTimeFrame, $show_date, $price, $id_film, $quantity, $check_payment, $id_room, $id_cinema ,$qrcode, $orderId);
                    sendConfirmationEmail($username, $email, $seat_order, $name_film, $time, $price, $quantity, $order_date, $show_date, $room, $cinema, $qrcode, $orderId);
                    unset($_SESSION['seat_order'][2]);
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
                //Thông tin send mail
                $username = $_SESSION['account']['name'];
                $email = $_SESSION['account']['email'];
                $name_film = $_SESSION['seat_order'][3];
                $time = $_SESSION['seat_order'][6];
                $id_room = $_SESSION['seat_order'][9];
                $id_cinema = $_SESSION['seat_order'][10];
                $room = $_SESSION['seat_order'][11];
                $cinema = $_SESSION['seat_order'][12];
                //Insert thông tin vé đặt
                $path = "./images_qrcode/";
                $qrcode = $path.time().".png";
                QRcode :: png("$username " . "$email " . "$name_film " . "$room " . "$cinema " . "$order_date " . "$price " . "$seat_order ", $qrcode, 'H', 3, 3);
                insert_orderSeat($seat_order, $id_account, $order_date, $id_showTimeFrame, $show_date, $price, $id_film, $quantity, $check_payment, $id_room, $id_cinema, $qrcode, $orderId);
                // Insert thông tin thanh toán
                payment_momo($partnerCode, $orderId, $amount, $orderInfo, $orderType, $transId, $payType);
                sendConfirmationEmail($username, $email, $seat_order, $name_film, $time, $price, $quantity, $order_date, $show_date, $room, $cinema, $qrcode, $orderId);
                unset($_SESSION['seat_order'][2]);
            }
            include "view/thank.php";
            break;
            case 'my_ticket':
                if (isset($_SESSION['account']) && $_SESSION['account'] != "") {
                    $id_account = $_SESSION['account']['id'];
                    $list_ticket = loadTicketForClient($id_account);
                }
                include "view/my_ticket.php";
                break;
            case 'contact':
                include "view/contact.php";
                break;    
            case 'used_ticket': 
                if (isset($_SESSION['account']) && $_SESSION['account'] != "") {
                    $id_account = $_SESSION['account']['id'];
                    $list_ticket = used_ticket($id_account);
                }
                include "view/used_ticket.php";
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
