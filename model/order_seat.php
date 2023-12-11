<?php
function insert_orderSeat($seat_order, $id_account, $order_date, $id_showTimeFrame, $show_date, $price, $id_film, $quantity, $check_payment, $room, $cinema, $qrcode, $orderId)
{
  if ($check_payment == "payment_cash") {
    $sql = "INSERT INTO `order_ticket` (`id_account`, `seat_order`, `order_date`, `id_showTimeFrame`, `id_film`, `id_room`, `id_cinema`, `show_date`, `price`, `quantity`, `qr_code`, `order_id`, `status`)
          VALUES ('$id_account', '$seat_order', '$order_date', '$id_showTimeFrame', '$id_film', '$room', '$cinema', '$show_date', '$price', '$quantity', '$qrcode', '$orderId', 'Chờ thanh toán');";
  } else if ($check_payment == "paymentmomo_atm") {
    $sql = "INSERT INTO `order_ticket` (`id_account`, `seat_order`, `order_date`, `id_showTimeFrame`, `id_film`, `id_room`, `id_cinema`, `show_date`, `price`, `quantity`, `qr_code`, `order_id`, `status`)
          VALUES ('$id_account', '$seat_order', '$order_date', '$id_showTimeFrame', '$id_film', '$room', '$cinema', '$show_date', '$price', '$quantity', '$qrcode', '$orderId', 'Đã thanh toán');";
  }
  pdo_execute($sql);
}

function load_orderTicket($kyw = "")
{
  if ($kyw == "") {
    $sql = "SELECT order_date, (price * count(price)) as 'doanhthu' FROM `order_ticket`
    GROUP BY order_date limit 30";
     $list_orderTicket = pdo_query($sql);
     return $list_orderTicket;
  }
  if ($kyw != "") {
    $sql = "SELECT order_date, (price * count(price)) as 'doanhthu' FROM `order_ticket`
    GROUP BY order_date having order_date = date_format($kyw, 'Y/m')";
     $list_orderTicket = pdo_query($sql);
     return $list_orderTicket;
  }

 
}

function loadTicketForClient($id_account)
{
  $sql = "select order_ticket.id as 'id_order', account.name as 'username', film.name as 'name_film', show_time_frame.start_time as 'start_time',
        show_time_frame.end_time as 'end_time', room.name as 'name_room', cinema.name as 'name_cinema', 
        order_ticket.show_date as 'show_date', order_ticket.seat_order as 'seat_order', order_ticket.order_date as 'order_date',
        order_ticket.quantity as 'quantity', order_ticket.price as 'price', order_ticket.status as 'status' from order_ticket
        join film on order_ticket.id_film = film.id
        join show_time_frame on order_ticket.id_showTimeFrame = show_time_frame.id
        join room on order_ticket.id_room = room.id
        join cinema on order_ticket.id_cinema = cinema.id
        join account on order_ticket.id_account = account.id
        where account.id = $id_account and order_ticket.status not like '%Vé đã được in%' 
        order by order_ticket.id desc;";
  $list_order = pdo_query($sql);
  return $list_order;
}

function used_ticket($id_account) {
  $sql = "select order_ticket.id as 'id_order', account.name as 'username', film.name as 'name_film', show_time_frame.start_time as 'start_time',
        show_time_frame.end_time as 'end_time', room.name as 'name_room', cinema.name as 'name_cinema', 
        order_ticket.show_date as 'show_date', order_ticket.seat_order as 'seat_order', order_ticket.order_date as 'order_date',
        order_ticket.quantity as 'quantity', order_ticket.price as 'price', order_ticket.status as 'status' from order_ticket
        join film on order_ticket.id_film = film.id
        join show_time_frame on order_ticket.id_showTimeFrame = show_time_frame.id
        join room on order_ticket.id_room = room.id
        join cinema on order_ticket.id_cinema = cinema.id
        join account on order_ticket.id_account = account.id
        where account.id = $id_account and order_ticket.status = 'Vé đã được in'
        order by order_ticket.id desc;";
  $list_order = pdo_query($sql);
  return $list_order;
}
