<?php
function allRooms($room_id)
{
    $sql = "SELECT * FROM rooms INNER JOIN hotels ON rooms.hotel_id = hotels.hotel_id";
    if ($room_id != 0) {
        $sql .= " and room_id = '" . $room_id . "'";
    }
    $result = pdo_query($sql);
    return $result;
}
function roomsHotels($hotelID)
{
    $sql = "SELECT * FROM rooms INNER JOIN hotels ON rooms.hotel_id = hotels.hotel_id WHERE rooms.hotel_id = $hotelID";
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
        $sql .= ' HAVING hotels.hotel_id = ' . $hotel_id;
    }

    $count_category_id = pdo_query($sql);
    return $count_category_id;
}

function loadAllDate($room_id = 0 , $enable = 'true')
{
    $sql = "SELECT 
    completed.room_id,
    date_booking,
    date_start,
    date_end ,
    completed.completed_id
    FROM `book` 
    INNER JOIN completed 
    ON book.completed_id = completed.completed_id WHERE 1";
    if ($enable != '') {
        $sql .= " and cancel_hidden = 0";
    }
    if ($room_id != 0) {
        $sql .= " and book.room_id = '" . $room_id . "'";
    }

    return pdo_query($sql);
}

function fullRooms()
{
    $sql = "SELECT * FROM rooms 
    INNER JOIN hotels ON rooms.hotel_id = hotels.hotel_id 
    INNER JOIN beds ON rooms.bed_id = beds.bed_id WHERE 1
    ";
    $result = pdo_query($sql);
    return $result;
}
function loadBeds()
{
    $sql = "SELECT * FROM beds";
    $result = pdo_query($sql);
    return $result;
}
function updateRooms($roomID, $number, $price, $img, $desc, $bed, $guest, $hotelID)
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

function validateDay($listDate, $dates)
{

    $amountRoom = 0;

    $aboutDays1 = array('dayStart' => $dates[0], 'dayEnd' => $dates[1]);
    $dayStart1_converted = DateTime::createFromFormat('m/d/Y', $aboutDays1['dayStart'])->format('Y-m-d');
    $dayEnd1_converted = DateTime::createFromFormat('m/d/Y', $aboutDays1['dayEnd'])->format('Y-m-d');
    // echo $dayStart1_converted .' , '. $dayEnd1_converted;

    foreach ($listDate as $date) { 
        $date['date_start'] = explode('|' , $date['date_start']);
        $date['date_end'] = explode('|' , $date['date_end']);
        $aboutDays2 = array('dayStart' => $date['date_start'][0], 'dayEnd' => $date['date_end'][0]);
    
    
        $dayStart2_converted = DateTime::createFromFormat('d/m/Y', $aboutDays2['dayStart'])->format('Y-m-d');
        $dayEnd2_converted = DateTime::createFromFormat('d/m/Y', $aboutDays2['dayEnd'])->format('Y-m-d');

        // echo $dayStart2_converted .' , '. $dayEnd2_converted;

        if (
                ($dayStart1_converted < $dayEnd2_converted && $dayStart2_converted < $dayEnd1_converted) || 
                ($dayStart2_converted < $dayEnd1_converted && $dayEnd2_converted > $dayStart1_converted)
            ) {
            $amountRoom += 1;
            // echo $amountRoom;
        }
    }

    return $amountRoom;

}
function topRooms()
{
    $sql = "SELECT * FROM rooms
    INNER JOIN hotels WHERE rooms.hotel_id = hotels.hotel_id
   ORDER BY hotel_views DESC LIMIT 6 ";
    $result = pdo_query($sql);
    return $result;
}

function allBookId() {
    $sql = "SELECT book_id FROM `book` WHERE cancel_hidden = 0";
    return pdo_query($sql);
}



?>
