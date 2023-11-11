<?php
    function loadall_film() {
        $sql = "SELECT film.id as 'id', film.name as 'name', film.rel_date as 'rel_date', genre.name as 'id_genre', film.image as 'image', show_time_frame.start_time as 'start_time', show_time_frame.end_time as 'end_time' from film 
        JOIN genre on film.id_genre = genre.id
        JOIN show_time_frame on film.id_showTimeFrame = show_time_frame.id 
        WHERE film.rel_date >= show_time_frame.date AND film.rel_date <= show_time_frame.date;";
        $list_product = pdo_query($sql);
        return $list_product;
    }

function loadone_film($id) {
    $sql = "SELECT film.id as 'id', film.name as 'name', film.rel_date as 'rel_date', genre.name as 'id_genre', film.image as 'image', show_time_frame.start_time as 'start_time', show_time_frame.end_time as 'end_time' from film 
        JOIN genre on film.id_genre = genre.id
        JOIN show_time_frame on film.id_showTimeFrame = show_time_frame.id 
        WHERE film.rel_date >= show_time_frame.date AND film.rel_date <= show_time_frame.date and film.id = $id;";
    $list_product = pdo_query_one($sql);
    return $list_product;
}
?>