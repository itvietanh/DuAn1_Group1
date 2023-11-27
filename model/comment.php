<?php 
    function insert_comment($id_film, $content, $id_account, $date) {
        $sql = "INSERT INTO `comment` (`id_account`, `id_film`, `content`, `date_comment`) 
        VALUES ('$id_account', '$id_film', '$content', ' $date');";
        pdo_query($sql);
    }

    function loadall_comment($id) {
        $sql = "select comment.id as 'id_comment', account.name as 'username', comment.content as 'content',
        comment.date_comment as 'date_comment', film.name as 'name_film', film.id as 'id_film' from `comment`
        join film on comment.id_film = film.id 
        join account on comment.id_account = account.id
        where film.id = $id order by comment.id desc";
        $list_comment = pdo_query($sql);
        return $list_comment;
    }

    function delete_comment($id) {
        $sql = "DELETE FROM comment WHERE `comment`.`id` = $id";
        pdo_execute($sql);
    }
?>