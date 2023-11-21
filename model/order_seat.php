<?php
    function insert_orderSeat($seat_order) {
//        $sql = "INSERT INTO `order_ticket` (`id`, `id_account`, `id_ticket`, `seat_order`, `order_date`) VALUES (NULL, '4', '3', '', '2023-11-20 17:41:21.000000');"
        $sql = "INSERT INTO `order_ticket` (`seat_order`) VALUES ('$seat_order');";
        pdo_execute($sql);
    }
?>