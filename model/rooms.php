<?php
function allRooms($room_id)
{
    $sql = "SELECT * FROM rooms WHERE 1";
    if ($room_id != 0) {
        $sql .= " and room_id = '" . $room_id ."'";
    }
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

function loadAllDate($room_id = 0) {
    $sql = "SELECT * FROM completed WHERE 1";
    if ($room_id != 0) {
        $sql .= " and room_id = '" . $room_id ."'";
    }

    return pdo_query($sql);
}

?>
