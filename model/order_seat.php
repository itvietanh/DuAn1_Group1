<?php
    function insert_orderSeat($seat_order, $id_account, $order_date, $id_showTimeFrame, $show_date, $price) {
        $sql = "INSERT INTO `order_ticket` (`id_account`, `seat_order`, `order_date`, `id_showTimeFrame`, `show_date`, `price`)
          VALUES ('$id_account', '$seat_order', '$order_date', '$id_showTimeFrame', '$show_date', '$price');";
//        $sql = "INSERT INTO `order_ticket` (`seat_order`) VALUES ('$seat_order');";
        pdo_execute($sql);
    }

    function loadall_orderTicket() {
        $sql = "SELECT order_ticket.seat_order as 'seat_order' FROM `order_ticket` WHERE 1";
        $list_orderTicket = pdo_query($sql);
        return $list_orderTicket;
    }
?>