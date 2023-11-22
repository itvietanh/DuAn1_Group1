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
?>