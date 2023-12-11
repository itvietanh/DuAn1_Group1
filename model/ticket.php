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

    function loadall_orderTicket($date, $id, $id_film, $id_room) {
        $sql = "SELECT distinct order_ticket.seat_order as 'seat_order', order_ticket.show_date, order_ticket.id_showTimeFrame, 
                order_ticket.id_film FROM `order_ticket` 
                WHERE show_date = '$date' AND order_ticket.id_showTimeFrame = $id AND order_ticket.id_film = $id_film and order_ticket.id_room = $id_room";
        $list_orderTicket = pdo_query($sql);
        return $list_orderTicket;
    }

    function loadOrder($kyw = "") {
        if ($kyw == "") {
            $sql = "select order_ticket.id as 'id_order', account.name as 'username', film.name as 'name_film', show_time_frame.start_time as 'start_time',
            show_time_frame.end_time as 'end_time', room.name as 'name_room', cinema.name as 'name_cinema', 
            order_ticket.show_date as 'show_date', order_ticket.seat_order as 'seat_order', order_ticket.order_date as 'order_date',
            order_ticket.quantity as 'quantity', order_ticket.price as 'price', order_ticket.order_id as 'order_id', order_ticket.status as 'status' from order_ticket
            join film on order_ticket.id_film = film.id
            join show_time_frame on order_ticket.id_showTimeFrame = show_time_frame.id
            join room on order_ticket.id_room = room.id
            join cinema on order_ticket.id_cinema = cinema.id
            join account on order_ticket.id_account = account.id ORDER BY order_date desc";
            $list_order = pdo_query($sql);
            return $list_order;
        }

        if ($kyw != "") {
            $sql = "select order_ticket.id as 'id_order', account.name as 'username', film.name as 'name_film', show_time_frame.start_time as 'start_time',
            show_time_frame.end_time as 'end_time', room.name as 'name_room', cinema.name as 'name_cinema', 
            order_ticket.show_date as 'show_date', order_ticket.seat_order as 'seat_order', order_ticket.order_date as 'order_date',
            order_ticket.quantity as 'quantity', order_ticket.price as 'price', order_ticket.order_id as 'order_id', order_ticket.status as 'status' from order_ticket
            join film on order_ticket.id_film = film.id
            join show_time_frame on order_ticket.id_showTimeFrame = show_time_frame.id
            join room on order_ticket.id_room = room.id
            join cinema on order_ticket.id_cinema = cinema.id
            join account on order_ticket.id_account = account.id 
            where order_id like '%$kyw%'
            ORDER BY order_date desc";
            $list_order = pdo_query($sql);
            return $list_order;
        }
        // $list_order = pdo_query($sql);
        // return $list_order;
    }

    function print_ticket($id_order) {
        $sql = "select order_ticket.id as 'id_order', account.name as 'username', film.name as 'name_film', show_time_frame.start_time as 'start_time',
            show_time_frame.end_time as 'end_time', room.name as 'name_room', cinema.name as 'name_cinema', 
            order_ticket.show_date as 'show_date', order_ticket.seat_order as 'seat_order', order_ticket.order_date as 'order_date',
            order_ticket.quantity as 'quantity', order_ticket.price as 'price', order_ticket.order_id as 'order_id', order_ticket.status as 'status', order_ticket.qr_code as 'qr_code' from order_ticket
            join film on order_ticket.id_film = film.id
            join show_time_frame on order_ticket.id_showTimeFrame = show_time_frame.id
            join room on order_ticket.id_room = room.id
            join cinema on order_ticket.id_cinema = cinema.id
            join account on order_ticket.id_account = account.id 
            where order_ticket.id = $id_order";
            $list_order = pdo_query($sql);
            return $list_order;
    }

    function update_printTicket($id_order) {
        $sql = "UPDATE `order_ticket` SET `status` = 'Vé đã được in' WHERE `order_ticket`.`id` = $id_order";
        pdo_query($sql);
    }
    
    function loadTicketOfFilm($id) {
        $sql = "select order_ticket.id as 'id_order', account.name as 'username', film.name as 'name_film', show_time_frame.start_time as 'start_time',
        show_time_frame.end_time as 'end_time', room.name as 'name_room', cinema.name as 'name_cinema', 
        order_ticket.show_date as 'show_date', order_ticket.seat_order as 'seat_order', order_ticket.order_date as 'order_date',
        order_ticket.quantity as 'quantity', order_ticket.price as 'price', order_ticket.status as 'status' from order_ticket
        join film on order_ticket.id_film = film.id
        join show_time_frame on order_ticket.id_showTimeFrame = show_time_frame.id
        join room on order_ticket.id_room = room.id
        join cinema on order_ticket.id_cinema = cinema.id
        join account on order_ticket.id_account = account.id
        where order_ticket.id_film = $id";
        $list_order = pdo_query($sql);
        return $list_order;
    }

    function updateStatusPayment($id_order) {
        $sql = "UPDATE `order_ticket` SET `status` = 'Đã thanh toán' WHERE `order_ticket`.`id` = $id_order";
        pdo_query($sql);
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