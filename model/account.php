<?php
    function loadall_account() {
        $sql = "select * from `account`";
        $list_account = pdo_query($sql);
        return $list_account;
    }

    function insert_account($username, $password, $name, $email, $phone) {
        $sql = "insert into `account` (`username`, `password`, `name`, `email`, `phone`) 
        VALUES ('$username', '$password','$name','$email','$phone')";
        pdo_execute($sql);
    }

    function loadone_account($id) {
        $sql = "select * from `account` where account.id = $id";
        $account = pdo_query_one($sql);
        return $account;
    }

    function update_account($id, $username, $password, $name, $email, $phone, $role) {
        $sql = "UPDATE `account` SET `username` = '$username', `password` = '$password', `name` = '$name', `email` = '$email', `phone` = '$phone', `role` = '$role' WHERE `account`.`id` = $id;";
        pdo_execute($sql);
    }

    function delete_account($id) {
        $sql = "DELETE FROM account WHERE `account`.`id` = $id";
        pdo_execute($sql);
    }

    function check_account($email, $password) {
        $sql = "select * from `account` where `email` = '$email' and `password` = '$password'";
        $account = pdo_query_one($sql);
        return $account;
    }

    function checkEmail($email) {
        $sql = "select * from account where email = '".$email."'";
        $account = pdo_query_one($sql);
        return $account;
    }

    function setPassNew($password, $email) {
        $sql = "UPDATE `account` SET `password` = '$password' WHERE `account`.`email` = '".$email."';";
        pdo_execute($sql);
    }

    function sendConfirmationAccount($rand, $email)
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
        $mail->SMTPDebug = 0; // gỡ lỗi: 0 = không hiển thị, 1 = hiển thị lỗi và tin nhắn, 2 = chỉ hiển thị tin nhắn
        $mail->SMTPAuth = true; // xác thực SMTP
        $mail->SMTPSecure = 'tls'; // kết nối an toàn SMTP: tls hoặc ssl
        $mail->Host = "sandbox.smtp.mailtrap.io"; // địa chỉ máy chủ SMTP của bạn
        $mail->Port = 587; // cổng SMTP của bạn
        $mail->Username = "70843b1bd3393b"; // tài khoản SMTP của bạn
        $mail->Password = "b087d6f0b12f47"; // mật khẩu SMTP của bạn
        $mail->SetFrom("vuvietanh591@gmail.com"); // địa chỉ email người gửi
        $mail->Subject = "Mã đặt lại mật khẩu"; // chủ đề email 
        $mail->Body = 'Mã đặt lại mật khẩu của bạn là: ' . "$rand"; // nội dung email
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