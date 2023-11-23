<?php
    function loadone_ticket($id_film) {
        $sql = "select ticket.id as 'id', ticket.price as 'price' from `ticket` where ticket.id_film = $id_film";
        $list_ticket = pdo_query_one($sql);
        return $list_ticket;
    }
?>