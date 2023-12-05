<?php
function loadall_film($kyw = "")
{
    $sql = "SELECT film.id as 'id', film.name as 'name', film.rel_date as 'rel_date', genre.name as 'id_genre', film.image as 'image'
        FROM `film` 
        JOIN genre on film.id_genre = genre.id";
    if ($kyw != "") {
        $sql .= " where film.name like '%" . $kyw . "%' limit 12";
    }
    $list_product = pdo_query($sql);
    return $list_product;
}

function loadone_film($id)
{
    $sql = "SELECT film.id as 'id', film.name as 'name', film.rel_date as 'rel_date', film.id_genre as 'id_genre', film.image as 'image', show_time_frame.id as 'showTimeFrame' from film 
            JOIN genre on film.id_genre = genre.id
            JOIN show_film on film.id = show_film.id_film
            JOIN show_time_frame on show_film.id_showTimeFrame = show_time_frame.id
            where film.id = $id;";
    $list_product = pdo_query_one($sql);
    return $list_product;
}

function load_film($id)
{
    $sql = "select film.id as 'id', film.name as 'name' from film where film.id = $id";
    $film = pdo_query_one($sql);
    return $film;
}

function insert_film($name, $rel_date, $genre, $showTimeFrame, $image)
{
    $sql = "INSERT INTO `film` (`name`, `rel_date`, `id_genre`, `id_showTimeFrame`, `image`) VALUES ('$name', '$rel_date', '$genre', '$showTimeFrame', '$image');";
    pdo_execute($sql);
}

function insert_showTimeFrame($show_date, $id_film, $showTimeFrame, $room, $cinema)
{
    $sql = "INSERT INTO `show_film` (`show_date`, `id_film`, `id_showTimeFrame`, `id_room`, `id_cinema`) VALUES ('$show_date', '$id_film', '$showTimeFrame', '$room', '$cinema')";
    pdo_execute($sql);
}

function update_film($name, $rel_date, $genre, $image, $id)
{
    if ($image != "") {
        $sql = "UPDATE `film` SET `name` = '$name', `rel_date` = '$rel_date', `id_genre` = '$genre', `image` = '$image' WHERE `film`.`id` = $id;";
    } else {
        $sql = "UPDATE `film` SET `name` = '$name', `rel_date` = '$rel_date', `id_genre` = '$genre' WHERE `film`.`id` = $id;";
    }
    pdo_execute($sql);
}

function delete_film($id)
{
    $sql = "delete from film where film.id = $id";
    pdo_execute($sql);
}

function loadall_film_cartoon()
{
    $sql = "select film.id as 'id', genre.name as 'genre', film.name as 'film', film.image as 'image' from film
        join genre on film.id_genre = genre.id
        WHERE genre.name like 'Phim hoạt hình'
        group by genre.name, film.name ORDER BY genre.name desc LIMIT 3;";
    $list_film = pdo_query($sql);
    return $list_film;
}

function loadall_film_action()
{
    $sql = "select film.id as 'id', genre.name as 'genre', film.name as 'film', film.image as 'image' from film
            join genre on film.id_genre = genre.id
            WHERE genre.name like 'Bom tấn'
            group by genre.name, film.name ORDER BY genre.name desc LIMIT 3;";
    $list_film = pdo_query($sql);
    return $list_film;
}

function loadall_filmByGenre($id)
{
    $sql = "select genre.id as 'id', film.id as 'id', genre.name as 'genre', film.name as 'film', film.image as 'image',
            film.rel_date as 'rel_date' from film
            join genre on film.id_genre = genre.id
            WHERE genre.id = $id
            group by genre.name, film.name";
    $list_film = pdo_query($sql);
    return $list_film;
}

function film_detail($id)
{
    $sql = "select film.id, film.name, film.rel_date, film.id_genre, film.image,
        room.name as 'name_room', room.id as 'id_room', cinema.name as 'name_cinema', cinema.id as 'id_cinema' from film 
        join show_film on film.id = show_film.id_film
        join room on show_film.id_room = room.id
        join cinema on show_film.id_cinema = cinema.id
        where film.id = $id";
    $film = pdo_query_one($sql);
    return $film;
}

function loadall_showdate($date, $id, $room, $cinema)
{
    $sql = "SELECT DISTINCT film.id as 'id_film', film.name as 'name_film', cinema.name as 'cinema', cinema.id as 'id_cinema', room.name as 'room', room.id as 'id_room', show_film.show_date as 'show_date',
        time(show_time_frame.start_time) as 'start_time', show_time_frame.end_time as 'end_time', show_time_frame.id as 'id' from film
        JOIN show_film on film.id = show_film.id_film
        JOIN cinema on show_film.id_cinema = cinema.id
        JOIN show_time_frame on show_film.id_showTimeFrame = show_time_frame.id
        JOIN room on show_film.id_room = room.id
        where show_film.show_date = '$date' and film.id = $id and room.id = $room and cinema.id = $cinema
        GROUP BY show_film.show_date, show_time_frame.start_time";

    $list_showdate = pdo_query($sql);
    return $list_showdate;
}

function load_date($id)
{
    $sql = "select DISTINCT show_film.show_date as 'date' from show_film
        join film on show_film.id_film = film.id
        WHERE film.id = $id";
    $list_date = pdo_query($sql);
    return $list_date;
}

function load_DateAndTime($id, $date, $id_film, $id_room)
{
    $sql = "SELECT show_film.show_date as 'date', show_time_frame.start_time as 'time', film.id as 'id_film', film.name as 'name_film',
        room.name as 'room', room.id as 'id_room', cinema.name as 'cinema', cinema.id as 'id_cinema' from show_film 
        JOIN show_time_frame on show_film.id_showTimeFrame = show_time_frame.id
        join film on show_film.id_film = film.id
        join room on show_film.id_room = room.id
        join cinema on show_film.id_cinema = cinema.id
        WHERE show_film.show_date = '$date' and show_time_frame.id = $id and film.id = $id_film and room.id = $id_room";
    $list_showdate = pdo_query($sql);
    return $list_showdate;
}

function loadFilm($id_film, $id_room, $id_cinema, $date) {
    $sql = "SELECT film.id as 'id', film.name as 'name_film', show_time_frame.id as 'showTimeFrame', room.id as 'ok', cinema.id as 'id_cinema' from show_film 
        JOIN film on show_film.id_film = film.id
        JOIN show_time_frame on show_film.id_showTimeFrame = show_time_frame.id
        JOIN room on show_film.id_room = room.id
        JOIN cinema on show_film.id_cinema = cinema.id
        where film.id = $id_film and room.id = $id_room and cinema.id = $id_cinema and show_film.show_date = '$date'";
    $film = pdo_query($sql);
    return $film;
}