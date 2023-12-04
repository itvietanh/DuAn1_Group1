<?php
function insert_orderSeat($seat_order, $id_account, $order_date, $id_showTimeFrame, $show_date, $price, $id_film, $quantity, $check_payment, $room, $cinema, $qrcode)
{
  if ($check_payment == "payment_cash") {
    $sql = "INSERT INTO `order_ticket` (`id_account`, `seat_order`, `order_date`, `id_showTimeFrame`, `id_film`, `id_room`, `id_cinema`, `show_date`, `price`, `quantity`, `status`)
          VALUES ('$id_account', '$seat_order', '$order_date', '$id_showTimeFrame', '$id_film', '$room', '$cinema', '$show_date', '$price', '$quantity', 'Chờ thanh toán');";
  } else if ($check_payment == "paymentmomo_atm") {
    $sql = "INSERT INTO `order_ticket` (`id_account`, `seat_order`, `order_date`, `id_showTimeFrame`, `id_film`, `id_room`, `id_cinema`, `show_date`, `price`, `quantity`, `qr_code`, `status`)
          VALUES ('$id_account', '$seat_order', '$order_date', '$id_showTimeFrame', '$id_film', '$room', '$cinema', '$show_date', '$price', '$quantity', '$qrcode', 'Đã thanh toán');";
  }
  pdo_execute($sql);
}

function load_orderTicket($kyw = "")
{
  $sql = "SELECT order_date, (price * count(price)) as 'doanhthu' FROM `order_ticket`
  GROUP BY order_date";
  if ($kyw != "") {
    $sql = "SELECT order_date, (price * count(price)) as 'doanhthu' FROM `order_ticket`
    GROUP BY order_date having order_date = $kyw";
  }

  $list_orderTicket = pdo_query($sql);
  return $list_orderTicket;
}
