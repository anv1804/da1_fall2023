<?php
function loadUsers($userID)
{
    $sql = "SELECT * FROM users WHERE user_id != $userID";
    $result = pdo_query($sql);
    return $result;
}
function user($userEmail)
{
    $sql = "SELECT * FROM users WHERE user_email = '$userEmail'";
    $result = pdo_query($sql);
    return $result;
}
function getID($userEmail)
{
    $sql = "SELECT user_id FROM users WHERE user_email = '$userEmail'";
    $result = pdo_query_one($sql);
    return $result;
}
function loadComments($hotelID)
{
    $sql = "SELECT * FROM comment 
    INNER JOIN users ON comment.user_id = users.user_id 
    INNER JOIN hotels ON comment.hotel_id = hotels.hotel_id 
    WHERE comment.hotel_id = $hotelID";
    $data = pdo_query($sql);
    return $data;
}
function totalRating($hotelID, $total = '', $avg = '')
{
    if ($total != '') {
        $sql = "SELECT COUNT(comment_rate) AS countRating FROM comment
    WHERE comment.hotel_id = $hotelID";
        $data = pdo_query($sql);
        return $data;

    }
    if ($avg != '') {
        $sql = "SELECT comment_rate FROM comment
        WHERE comment.hotel_id = $hotelID";
        $data = pdo_query($sql);
        return $data;

    }

}
function comment($content, $hotelID, $userID, $rating)
{
    $date = date('d-m-Y');
    $sql = "INSERT INTO `comment`
    (`comment_id`, `comment_content`, `comment_date`, `hotel_id`, `room_id`, `user_id`, `comment_rate`) 
    VALUES 
    (null,'$content','$date','$hotelID',null,$userID,$rating)";
    pdo_execute($sql);
}
function ratingCmt($starRate)
{
    $starRate0 = "";
    $starRate1 = "";
    $star = 5;
    for ($i = 0; $i < $starRate; $i++) {
        $starRate1 .= '<i class="fa fa-star"></i>';
    }
    for ($i = 0; $i < $star - $starRate; $i++) {
        $starRate0 .= '<i class="fa fa-star-o"></i>';
    }
    $starRate = (string) $starRate1 . (string) $starRate0;
    return $starRate;
}

function deleteUsers($userID)
{
    $sql = "DELETE FROM users WHERE user_id = $userID";
    pdo_execute($sql);
}
function booking($date, $dateStart, $dateEnd, $roomID)
{
    $sql = "INSERT INTO `completed`
    (`completed_id`, `date_booking`, `date_start`, `date_end`, `room_id`) 
    VALUES (null,'$date','$dateStart','$dateEnd','$roomID')";
    pdo_execute($sql);
}
function loadComplete($room_id, $dateStart)
{
    $sql = "SELECT completed_id FROM completed WHERE room_id = $room_id and date_start = '$dateStart'";
    return pdo_query_one($sql);
}
function dataBooking($userID)
{
    $sql = "SELECT 
    book.room_id,
    room_image,
    room_number,
    hotel_name,
    hotels.hotel_id,
    hotel_location,
    total_price,
    date_booking,
    date_start,
    date_end 
    FROM `book` 
    INNER JOIN hotels 
    ON book.hotel_id = hotels.hotel_id 
    INNER JOIN rooms 
    ON book.room_id = rooms.room_id 
    INNER JOIN completed 
    ON book.completed_id = completed.completed_id WHERE book.user_id = $userID";
    $data = pdo_query($sql);
    return $data;
}

function insertBook($book_id , $user_id , $room_id, $hotel_id , $total_price , $book_status , $completed_id , $cancellation_date)
{
    $sql = "INSERT INTO `book`(`book_id`, `user_id`, `room_id`, `hotel_id`, `total_price`, `book_status`, `completed_id`, `cancellation_date`)
     VALUES ('$book_id','$user_id','$room_id','$hotel_id','$total_price','$book_status','$completed_id','$cancellation_date')";
    pdo_execute($sql);
}
function checkBookIdSql($book_id) {
    $sql = "SELECT * FROM `book` WHERE book_id = '$book_id'";
    $result = pdo_query_one($sql);
    if ($result) {
        return false;
    }
    return true;
}
?>