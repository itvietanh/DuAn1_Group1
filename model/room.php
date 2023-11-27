<?php 
    function loadall_room() {
        $sql = "select DISTINCT room.name as 'name_room', room.id as 'id' from `show_film` 
        JOIN room on show_film.id_room = room.id
        JOIN film on show_film.id_film = film.id
        WHERE film.id = 1
        ORDER BY room.id ASC";
        $list_room = pdo_query($sql);
        return $list_room;
    }
?>