<?php
    function loadall_genre() {
        $sql = "select * from genre";
        $list_genre = pdo_query($sql);
        return $list_genre;
    }

    function insert_genre($name) {
        $sql = "INSERT INTO `genre` (`name`) VALUES ('$name');";
        pdo_execute($sql);
    }

    function loadone_genre($id) {
        $sql = "select * from genre where genre.id = $id";
        $edit_genre = pdo_query_one($sql);
        return $edit_genre;
    }

    function update_genre($id, $name) {
        $sql = "UPDATE `genre` SET `name` = '$name' where genre.id = $id;";
        pdo_execute($sql);
    }

    function delete_genre($id) {
        $sql = "delete from genre where genre.id = $id";
        pdo_execute($sql);
    }
?>