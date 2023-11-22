<?php
    function insert_orderSeat($seat_order, $id_account, $order_date) {
        $sql = "INSERT INTO `order_ticket` (`id_account`, `seat_order`, `order_date`)
          VALUES ('$id_account', '$seat_order', '$order_date');";
//        $sql = "INSERT INTO `order_ticket` (`seat_order`) VALUES ('$seat_order');";
        pdo_execute($sql);
    }
?>