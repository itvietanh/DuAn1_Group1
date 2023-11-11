<?php
    function loadall_genre() {
        $sql = "select * from genre";
        $list_genre = pdo_query($sql);
        return $list_genre;
    }
?>