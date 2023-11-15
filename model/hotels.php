<?php
function allHotels()
{
    $sql = "SELECT * FROM hotels";
    $listHotels = pdo_query($sql);
    return $listHotels;
}
?>