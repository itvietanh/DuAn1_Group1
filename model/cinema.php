<?php 
    function loadall_cinema() {
        $sql = "select cinema.id as 'id_cinema', cinema.name as 'name_cinema' from cinema where 1";
        $list_cinema = pdo_query($sql);
        return $list_cinema;
    }
?>