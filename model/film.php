<?php
    function loadall_film() {
        $sql = "SELECT film.id as 'id', film.name as 'name', film.rel_date as 'rel_date', genre.name as 'id_genre', film.image as 'image',
        show_time_frame.start_time as 'start_time' , show_time_frame.end_time as 'end_time' FROM `film` 
        JOIN genre on film.id_genre = genre.id
        JOIN show_time_frame on film.id_showTimeFrame = show_time_frame.id";
        $list_product = pdo_query($sql);
        return $list_product;
    }

    function loadone_film($id)
    {
        $sql = "SELECT film.id as 'id', film.name as 'name', film.rel_date as 'rel_date', film.id_genre as 'id_genre', film.image as 'image', film.id_showTimeFrame as 'showTimeFrame' from film 
            JOIN genre on film.id_genre = genre.id
            JOIN show_time_frame on film.id_showTimeFrame = show_time_frame.id 
            where film.id = $id;";
        $list_product = pdo_query_one($sql);
        return $list_product;
    }

    function insert_film($name, $rel_date, $genre, $showTimeFrame, $image) {
        $sql = "INSERT INTO `film` (`name`, `rel_date`, `id_genre`, `id_showTimeFrame`, `image`) VALUES ('$name', '$rel_date', '$genre', '$showTimeFrame', '$image');";
        pdo_execute($sql);
    }

    function update_film($name, $rel_date, $genre, $showTimeFrame, $image, $id) {
        if ($image != "") {
            $sql = "UPDATE `film` SET `name` = '$name', `rel_date` = '$rel_date', `id_genre` = '$genre', `id_showTimeFrame` = '$showTimeFrame', `image` = '$image' WHERE `film`.`id` = $id;";
        } else {
            $sql = "UPDATE `film` SET `name` = '$name', `rel_date` = '$rel_date', `id_genre` = '$genre', `id_showTimeFrame` = '$showTimeFrame' WHERE `film`.`id` = $id;";
        }
        pdo_execute($sql);
    }

    function delete_film($id) {
        $sql = "delete from film where film.id = $id";
        pdo_execute($sql);
    }

    function loadall_film_cartoon() {
        $sql = "select genre.name as 'genre', film.name as 'film', film.image as 'image' from film
        join genre on film.id_genre = genre.id
        WHERE genre.name like 'Phim hoạt hình'
        group by genre.name, film.name ORDER BY genre.name desc LIMIT 3;";
        $list_film = pdo_query($sql);
        return $list_film;
    }

    function loadall_film_action() {
        $sql = "select genre.name as 'genre', film.name as 'film', film.image as 'image' from film
            join genre on film.id_genre = genre.id
            WHERE genre.name like 'Bom tấn'
            group by genre.name, film.name ORDER BY genre.name desc LIMIT 3;";
        $list_film = pdo_query($sql);
        return $list_film;
}
?>