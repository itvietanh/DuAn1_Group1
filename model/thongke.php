<?php
function loadall_thongke() {
    $sql = "SELECT order_ticket.id as 'id',film.name as 'name_film', COUNT(order_ticket.id_film) as 'quantity' FROM `order_ticket`
                JOIN film ON order_ticket.id_film = film.id                                                                  
                GROUP BY film.name;";
    $thongke = pdo_query($sql);
    return $thongke;
}
function loadall_thongkebinhluan() {
    $sql = "SELECT film.name as 'name_film', COUNT(comment.id) as 'quantity' FROM comment
            JOIN film ON comment.id_film = film.id
            GROUP BY film.name";

    $thongkebinhluan = pdo_query($sql);
    return $thongkebinhluan;
}
?>