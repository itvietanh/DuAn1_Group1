<?php
    function loadall_film() {
        $sql = "select * from film";
        $list_product = pdo_query($sql);
        return $list_product;
    }
?>