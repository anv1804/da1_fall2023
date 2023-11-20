<?php
function allRooms()
{
    $sql = "SELECT * FROM rooms WHERE 1";
    $result = pdo_query($sql);
    return $result;
}

?>