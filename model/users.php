<?php
function loadUsers()
{
    $sql = "SELECT * FROM users WHERE user_role = 0";
    $result = pdo_query($sql);
    return $result;
}
function getID($userEmail)
{
    $sql = "SELECT user_id FROM users WHERE 1 AND user_email = '$userEmail'";
    $result = pdo_query_one($sql);
    return $result;
}
function loadComments($hotelID)
{
    $sql = "SELECT * FROM comment 
    INNER JOIN users ON comment.user_id = users.user_id 
    INNER JOIN hotels ON comment.hotel_id = hotels.hotel_id 
    WHERE 1 AND comment.hotel_id = $hotelID";
    $data = pdo_query($sql);
    return $data;
}
function totalRating($hotelID, $total = '' , $avg = '')
{
    if ($total != '') {
        $sql = "SELECT COUNT(comment_rate) AS countRating FROM comment
    WHERE comment.hotel_id = $hotelID";
    }
    if ($avg != '') {
        $sql = "SELECT comment_rate FROM comment
        WHERE comment.hotel_id = $hotelID";
    }
    $data = pdo_query($sql);
    return $data;
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
?>