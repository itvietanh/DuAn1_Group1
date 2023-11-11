<?php
    function showTimeFrame() {
        $sql = "select * from show_time_frame";
        $list_showTimeFrame = pdo_query($sql);
        return $list_showTimeFrame;
    }
?>