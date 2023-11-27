<?php
    function insert_orderSeat($seat_order, $id_account, $order_date, $id_showTimeFrame, $show_date, $price, $id_film, $quantity, $check_payment, $room, $cinema) {
        if ($check_payment == "payment_cash") { 
            $sql = "INSERT INTO `order_ticket` (`id_account`, `seat_order`, `order_date`, `id_showTimeFrame`, `id_film`, `id_room`, `id_cinema`, `show_date`, `price`, `quantity`, `status`)
          VALUES ('$id_account', '$seat_order', '$order_date', '$id_showTimeFrame', '$id_film', '$room', '$cinema', '$show_date', '$price', '$quantity', 'Chờ thanh toán');";
        } else if ($check_payment == "paymentmomo_atm") {
            $sql = "INSERT INTO `order_ticket` (`id_account`, `seat_order`, `order_date`, `id_showTimeFrame`, `id_film`, `id_room`, `id_cinema`, `show_date`, `price`, `quantity`, `status`)
          VALUES ('$id_account', '$seat_order', '$order_date', '$id_showTimeFrame', '$id_film', '$room', '$cinema', '$show_date', '$price', '$quantity', 'Đã thanh toán');";
        }
        pdo_execute($sql);
    }

?>