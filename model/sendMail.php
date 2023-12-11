<?php
function sendConfirmationEmail($username, $email, $seat_order, $name_film, $time, $price, $quantity, $order_date, $show_date, $room, $cinema, $qrcode, $orderId)
{
    // Sử dụng PHPMailer
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'PHPMailer/src/Exception.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    try {
        
        $mail->IsSMTP(); // enable SMTP
        $mail->CharSet = "UTF-8";
        $mail->IsHTML(true);
        $mail->AddEmbeddedImage("$qrcode", 'qr_code');
        $mail->SMTPDebug = 0; // gỡ lỗi: 0 = không hiển thị, 1 = hiển thị lỗi và tin nhắn, 2 = chỉ hiển thị tin nhắn
        $mail->SMTPAuth = true; // xác thực SMTP
        $mail->SMTPSecure = 'tls'; // kết nối an toàn SMTP: tls hoặc ssl
        $mail->Host = "sandbox.smtp.mailtrap.io"; // địa chỉ máy chủ SMTP của bạn
        $mail->Port = 587; // cổng SMTP của bạn
        $mail->Username = "1acd448205393b"; // tài khoản SMTP của bạn
        $mail->Password = "30004f6b7bcc70"; // mật khẩu SMTP của bạn
        $mail->SetFrom("vuvietanh591@gmail.com", "$username"); // địa chỉ email người gửi
        $mail->Subject = "Đặt vé xem phim thành công"; // chủ đề email 
        $mail->Body = 'Tên Khách Hàng: ' . $username . ' <br>Email: ' . $email . ' <br>Tên Phim: ' . $name_film . ' <br>Ngày khởi chiếu: ' . $show_date
            . ' <br>Khung giờ chiếu: ' . $time . ' <br>Phòng Chiếu: ' . $room . ' <br>Rạp Chiếu: ' . $cinema . ' <br>Chỗ ngồi: ' . $seat_order . ' <br>Số lượng vé: ' . $quantity . ' <br>Tổng giá: ' . $price . ' <br>Ngày đặt: ' . $order_date . '<br>' . '<img src="cid:qr_code">' . ' <br>Mã vé: ' . $orderId; // nội dung email
        $mail->AddAddress($email); // địa chỉ email người nhận

        if (!$mail->Send()) {
            return false; // Gửi email thất bại
        } else {
            return true; // Gửi email thành công
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>