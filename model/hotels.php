<?php
function allHotels()
{
    $sql = "SELECT * FROM hotels WHERE 1";
    $result = pdo_query($sql);
    return $result;
}

?>