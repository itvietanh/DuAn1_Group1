<?php
    function insert_orderSeat($seat_order, $id_account, $order_date, $id_showTimeFrame, $show_date, $price, $id_film, $quantity, $check_payment) {
        if ($check_payment == "payment_cash") { 
            $sql = "INSERT INTO `order_ticket` (`id_account`, `seat_order`, `order_date`, `id_showTimeFrame`, `id_film`,`show_date`, `price`, `quantity`, `status`)
          VALUES ('$id_account', '$seat_order', '$order_date', '$id_showTimeFrame', '$id_film','$show_date', '$price', '$quantity', 'Chưa thanh toán');";
        } else if ($check_payment == "paymentmomo_atm") {
            $sql = "INSERT INTO `order_ticket` (`id_account`, `seat_order`, `order_date`, `id_showTimeFrame`, `id_film`,`show_date`, `price`, `quantity`, `status`)
          VALUES ('$id_account', '$seat_order', '$order_date', '$id_showTimeFrame', '$id_film','$show_date', '$price', '$quantity', 'Đã thanh toán');";
        }
        pdo_execute($sql);
    }

    function loadall_orderTicket($date, $id, $id_film, $id_account) {
        $sql = "SELECT distinct order_ticket.seat_order as 'seat_order', order_ticket.show_date, order_ticket.id_showTimeFrame, 
                order_ticket.id_film FROM `order_ticket` 
                WHERE show_date = '$date' AND order_ticket.id_showTimeFrame = $id AND order_ticket.id_film = $id_film AND order_ticket.id_account = '$id_account'";
        $list_orderTicket = pdo_query($sql);
        return $list_orderTicket;
    }

    function loadall_infoOrder($seat_order, $date, $id, $id_film) {
        $sql = "SELECT film.name as 'name_film', show_time_frame.start_time as 'start_time', 
                show_time_frame.end_time as 'end_time', order_ticket.seat_order as 'seat_order', order_ticket.show_date as 'show_date',
                order_ticket.id_film, order_ticket.price as 'price', order_ticket.quantity as 'quantity' FROM `order_ticket` 
                INNER JOIN show_time_frame ON order_ticket.id_showTimeFrame = show_time_frame.id
                INNER JOIN film on order_ticket.id_film = film.id
                WHERE show_date = '$date' AND order_ticket.id_showTimeFrame = $id AND order_ticket.id_film = $id_film AND order_ticket.seat_order = '$seat_order'";
        $list_orderTicket = pdo_query_one($sql);
        return $list_orderTicket;
    }
?>