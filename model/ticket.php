<?php
    function loadone_ticket($id_film) {
        $sql = "select ticket.id as 'id', ticket.price as 'price' from `ticket` where ticket.id_film = $id_film";
        $list_ticket = pdo_query_one($sql);
        return $list_ticket;
    }

    function editTicket($id_ticket) {
        $sql = "select ticket.id as 'id_ticket', ticket.price as 'price' from `ticket` where ticket.id = $id_ticket";
        $ticket = pdo_query_one($sql);
        return $ticket;
    }

    function loadall_orderTicket($date, $id, $id_film, $id_account) {
        $sql = "SELECT distinct order_ticket.seat_order as 'seat_order', order_ticket.show_date, order_ticket.id_showTimeFrame, 
                order_ticket.id_film FROM `order_ticket` 
                WHERE show_date = '$date' AND order_ticket.id_showTimeFrame = $id AND order_ticket.id_film = $id_film";
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

    function list_orderTicket() {
        $sql = "SELECT * FORM `order_ticket`";
        $list_orderTicket = pdo_query($sql);
        return $list_orderTicket;
    }
    function loadall_ticket() {
        $sql = "select ticket.id as 'id_ticket', ticket.price as 'price', film.id as 'id_film' ,film.name as 'name_film'
        from ticket 
        join film on ticket.id_film = film.id
        where 1";
        $list_ticket = pdo_query($sql);
        return $list_ticket;
    }

    function insert_ticket($price, $id_film) {
        $sql = "INSERT INTO `ticket` (`price`, `id_film`) VALUES ('$price','$id_film')";
        pdo_execute($sql);
    }

    function update_ticket($price, $id_film, $id_ticket) {
        $sql = "UPDATE `ticket` SET `price` = '$price', `id_film` = '$id_film' where ticket.id =  $id_ticket";
        pdo_query($sql);
    }

    function delete_ticket($id_ticket) {
        $sql = "delete from ticket where ticket.id = $id_ticket";
        pdo_execute($sql);
    }
?>