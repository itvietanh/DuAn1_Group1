<?php
function loadall_thongke() {
    $sql = "SELECT order_ticket.id as 'id',film.name as 'name_film', COUNT(order_ticket.id_film) as 'quantity' FROM `order_ticket`
                JOIN film ON order_ticket.id_film = film.id                                                                  
                GROUP BY film.name;";
    $list_thongke = pdo_query($sql);
    return $list_thongke;
}
