<?php
function allHotels($hotel_name = '', $city= '', $hotelID= '',$top5='')
{
    $sql = "SELECT * FROM hotels ";
    if ($hotel_name != '') {
        $sql .= "WHERE 1 and hotel_name like '%" . $hotel_name . "%'";
    }
    if ($hotelID != '') {
        $sql .= "WHERE hotel_id=$hotelID";
    }
    if ($city != '') {
        $sql .= "INNER JOIN city ON hotels.city_id = city.city_id";
    }
    if ($top5 != '') {
        $sql .= "WHERE 1 ORDER BY hotel_views DESC LIMIT 0,5 ";
    }
    $result = pdo_query($sql);
    return $result;
}
function loadCity()
{
    $sql = "SELECT * FROM city";
    $result = pdo_query($sql);
    return $result;
}
function loadServices()
{
    $sql = "SELECT * FROM services";
    $result = pdo_query($sql);
    return $result;
}
function updateHotels($hotelID, $nameHotel, $descHotel, $locationHotel, $img, $cityHotel)
{
    $sql = "UPDATE `hotels` 
    SET `hotel_id`='$hotelID',
    `hotel_name`='$nameHotel',
    `hotel_desc`='$descHotel',
    `hotel_location`='$locationHotel',
    `hotel_image`='$img',
    `hotel_rate`='0',
    `hotel_views`='0',
    `city_id`='$cityHotel' 
    WHERE hotel_id = $hotelID";
    pdo_execute($sql);
}
function deleteHotels($hotelID)
{
    $sql = "DELETE FROM hotels WHERE hotel_id = $hotelID";
    pdo_execute($sql);
}
?>