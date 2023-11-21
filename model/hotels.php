<?php
function allHotels($hotel_name = '')
{
    $sql = "SELECT * FROM hotels WHERE 1";
    if ($hotel_name != '') {
        $sql .= " and hotel_name like '%" . $hotel_name . "%'";
    }
    $result = pdo_query($sql);
    return $result;
}
function topHotels()
{
    $sql = "SELECT * FROM hotels WHERE 1 ORDER BY hotel_views DESC LIMIT 0,5  ";
    $result = pdo_query($sql);
    return $result;
}
function dataHotels($hotelID)
{
    $sql = "SELECT * FROM hotels WHERE hotel_id=$hotelID";
    $result = pdo_query($sql);
    return $result;
}
?>