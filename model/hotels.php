<?php
function allHotels()
{
    $sql = "SELECT * FROM hotels WHERE 1";
    $result = pdo_query($sql);
    return $result;
}
function topHotels()
{
    $sql = "SELECT * FROM hotels WHERE 1 ORDER BY hotel_views DESC LIMIT 0,5  ";
    $result = pdo_query($sql);
    return $result;
}

?>