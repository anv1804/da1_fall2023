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
function countNoti($userID)
{
    $sql = "SELECT COUNT(book_id) as count FROM `book` WHERE user_id = $userID and cancel_hidden = 0";
    $result = pdo_query_one($sql);
    return $result;
}
function countCmt($hotelID)
{
    $sql = "SELECT COUNT(comment_id) as count FROM `comment` WHERE hotel_id = $hotelID";
    $result = pdo_query_one($sql);
    return $result;
}
function loadComments($hotelID)
{
    $sql = "SELECT user_image,user_name,comment_date,comment_content,user_email,comment_rate FROM comment 
    INNER JOIN users ON comment.user_id = users.user_id 
    INNER JOIN hotels ON comment.hotel_id = hotels.hotel_id 
    WHERE comment.hotel_id = $hotelID";
    $data = pdo_query($sql);
    return $data;
}
function totalRating($hotelID)
{
    $sql = "SELECT count(comment_id) as count, sum(comment_rate) as sum FROM `comment` WHERE hotel_id = $hotelID";
    $result = pdo_query($sql);
    return $result;
}
function comment($content, $hotelID, $userID, $rating)
{
    $date = date('Y-m-d');
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
function insertBook($book_id , $user_id , $room_id, $hotel_id , $total_price , $book_status , $completed_id , $cancellation_date)
{
    $sql = "INSERT INTO `book`(`book_id`, `user_id`, `room_id`, `hotel_id`, `total_price`, `book_status`, `completed_id`, `cancellation_date`)
     VALUES ('$book_id','$user_id','$room_id','$hotel_id','$total_price','$book_status','$completed_id','$cancellation_date')";
    pdo_execute($sql);
}
function checkBookIdSql($book_id) {
    $sql = "SELECT * FROM `book` WHERE book_id = '$book_id'";
    $result = pdo_query_one($sql);
    if (!empty($result)) {
        return false;
    }
    return true;
}
function dataBooking($userID  , $enable = '')
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
    date_end ,
    book_status,
    cancellation_date,
    book_id,
    book.completed_id
    FROM `book` 
    INNER JOIN hotels 
    ON book.hotel_id = hotels.hotel_id 
    INNER JOIN rooms 
    ON book.room_id = rooms.room_id 
    INNER JOIN completed 
    ON book.completed_id = completed.completed_id WHERE book.user_id = $userID";
    if ($enable != '') {
        $sql .= " and cancel_hidden = 0";
    }
    $data = pdo_query($sql);
    return $data;
}
function dashboard($bookID=""){
    $sql = "SELECT *
    FROM `book` 
    INNER JOIN completed ON book.completed_id = completed.completed_id";
    if($bookID != ""){
        $sql.= "WHERE book_id = $bookID";
    }
    $result = pdo_query($sql);
    return $result;
}
function countH(){
    $sql = "SELECT 
    count(hotels.hotel_id) as total_hotel,
    count(rooms.room_id) as total_room,
    sum(hotel_view) as total_view,
    count(comment.comment_id) as total_comment,
    sum(comment.comment_rate)/count(comment.comment_id) as avg_rate
    FROM `hotels` 
    INNER JOIN `rooms` ON hotel.room_id = rooms.room_id
    INNER JOIN comment ON hotels.hotel_id = comment.hotel_id
    INNER JOIN users ON comment.user_id = users.user_id";
    $result = pdo_query_one($sql);
    return $result;
}
function cancelBook($book_id){
    $sql = "UPDATE `book` SET `cancel_hidden`= 1 WHERE book_id = $book_id";
    pdo_execute($sql);
}
function cancelCompleted($Completed_id){
    $sql = "DELETE FROM `completed` WHERE Completed_id = $Completed_id";
    pdo_execute($sql);
}

?>