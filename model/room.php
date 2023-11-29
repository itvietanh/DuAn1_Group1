<?php 
    function loadall_room($id) {
        $sql = "select DISTINCT room.name as 'name_room', room.id as 'id' from `show_film` 
        JOIN room on show_film.id_room = room.id
        JOIN film on show_film.id_film = film.id
        WHERE film.id = $id
        ORDER BY room.id ASC";
        $list_room = pdo_query($sql);
        return $list_room;
    }

    function load_room() {
        $sql = "select room.id as 'id', room.name as 'name_room' from room where 1";
        $list_room = pdo_query($sql);
        return $list_room;
    }
?>