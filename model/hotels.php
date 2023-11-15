<?php
function allHotes()
{
    $sql = "SELECT * FROM hotels WHERE 1";
    $listHotels = pdo_query($sql);
    return $listHotels;
}
function detailsHotels($hotelID)
{
    $sql = "SELECT * FROM hotels WHERE hotel_id = $hotelID";
    $data = pdo_query_one($sql);
    return $data;
}
?>