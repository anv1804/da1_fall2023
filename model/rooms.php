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
function roomsHotels($hotelID)
{
    $sql = "SELECT * FROM rooms WHERE rooms.hotel_id = $hotelID";
    $result = pdo_query($sql);
    return $result;
}
function countRooms($hotel_id = 0)
{
    $sql = "SELECT hotels.hotel_id ,  COUNT(room_id) AS count
    FROM hotels
    LEFT JOIN rooms ON hotels.hotel_id = rooms.hotel_id
    GROUP BY hotels.hotel_id ";
    if ($hotel_id != 0) {
        $sql .= ' HAVING hotels.hotel_id = '.$hotel_id;
    }
    
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
function  fullRooms(){
    $sql = "SELECT * FROM rooms 
    INNER JOIN hotels ON rooms.hotel_id = hotels.hotel_id 
    INNER JOIN beds ON rooms.bed_id = beds.bed_id WHERE 1
    ";
    $result = pdo_query($sql);
    return $result;
}
function loadBeds(){
    $sql = "SELECT * FROM beds";
    $result = pdo_query($sql);
    return $result;
}
function updateRooms($roomID,$number,$price,$img,$desc,$bed,$guest,$hotelID)
{
    $sql = "UPDATE rooms
     SET room_id='$roomID',
     room_number='$number',
     room_price='$price',
     room_image='$img',
     room_desc='$desc',
     room_status='0',
     bed_id='$bed',
     service_id=null,
     room_guest='$guest',
     comment_id=null,
     hotel_id='$hotelID'
    WHERE room_id = $roomID";
    pdo_execute($sql);
}
function deleteRooms($roomID)
{
    $sql = "DELETE FROM rooms WHERE room_id = $roomID";
    pdo_execute($sql);
}

function validateDay($lastDateofMonth , $listDate , $currMonth ,$currYear ) {
    $dateStarts = [];
    $dateEnds = [];
    $dateMiddles = [];

   
    foreach ($listDate as $date) {
        $dateStart = explode('/' , $date['date_start']);
        $dateEnd = explode('/' , $date['date_end']);
        
        //date Start and date End
        for ($i = 1; $i <= $lastDateofMonth; $i++) { 
            if ($i == $dateStart[0] && $currMonth === ($dateStart[1]-1) && $currYear == $dateStart[2]) {
                $dateStarts[] =  $i;
            }
            if ( $i == $dateEnd[0] && $currMonth === ($dateEnd[1]-1) && $currYear == $dateEnd[2] ) {
                $dateEnds[] =  $i;  
            }
        }

        //date Middle
        if (($dateStart[1]-1) == $currMonth && $dateStart[2] == $currYear && ($dateEnd[1]-1) == $currMonth) {
            for ($i = 1; $i <= $lastDateofMonth; $i++) { 
                if ($dateStart[0] - $i < 0 && $i < $dateEnd[0]) {
                    $dateMiddles[] = $i;
                }
            }
            for ($i = 1; $i <= $lastDateofMonth; $i++) { 
                if ($dateEnd[0] - $i > 0 && $i > $dateStart[0]) {
                    $dateMiddles[] = $i;
                }
            }
        }
        if ($dateStart[1] != $dateEnd[1] || $dateEnd[2] - $dateStart[2] > 0) { 
            if (($dateStart[1]-1) == $currMonth) {
                for ($i = 1; $i <= $lastDateofMonth; $i++) {
                    if ($dateStart[0] - $i < 0) {
                        $dateMiddles[] = $i;
                    }
                }
            }
            if (($dateEnd[1]-1) == $currMonth) {
                for ($i = 1; $i <= $lastDateofMonth; $i++) {
                    if ($dateEnd[0] - $i > 0) {
                        $dateMiddles[] = $i;
                    }
                }
            }
        }
        if ($dateEnd[1]-1 > $currMonth && $dateStart[1]-1 < $currMonth && $dateEnd[2] == $currYear  && $dateStart[2] == $currYear) {
            if ($dateEnd[1] - $currMonth > 0) {
                for ($i = 1; $i <= $lastDateofMonth; $i++) { 
                    $dateMiddles[] = $i;
                }
            }
        }
        if ($dateEnd[2] - $dateStart[2] > 0) {
            if ($dateEnd[1] - 1 > $currMonth && $dateEnd[2] == $currYear) {
                for ($i = 1; $i <= $lastDateofMonth; $i++) { 
                    $dateMiddles[] = $i;
                }
            }
            if ($dateStart[1] - 1 < $currMonth && $dateStart[2] == $currYear) {
                for ($i = 1; $i <= $lastDateofMonth; $i++) { 
                    $dateMiddles[] = $i;
                }
            }
        }
    
    }

    return [$dateStarts , $dateMiddles , $dateEnds];
}

?>
