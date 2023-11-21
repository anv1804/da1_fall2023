<?php
function allRooms()
{
    $sql = "SELECT * FROM rooms WHERE 1";
    $result = pdo_query($sql);
    return $result;
}
function countRooms()
{
    $sql = "SELECT hotels.hotel_id ,  COUNT(room_id) AS count
    FROM hotels
    LEFT JOIN rooms ON hotels.hotel_id = rooms.hotel_id
    GROUP BY hotels.hotel_id ";

    $count_category_id = pdo_query($sql);
    return $count_category_id;
}
?>
