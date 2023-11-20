<?php
function getID($userEmail)
{
    $sql = "SELECT user_id FROM users WHERE user_email = $userEmail";
    $result = pdo_query_one($sql);
    return $result;
}
function comment($content, $hotelID, $userID, $rating)
{
    $date = date('Y-m-d');
    $sql = "INSERT INTO comment
    (`comment_content`,
     `comment_date`, 
     `hotel_id`, 
     `room_id`, 
     `user_id`, 
     `comment_rate`)
     VALUES 
     ($content,
     $date,
     $hotelID,
     null,
     $userID,
     $rating";
    pdo_execute($sql);
}
?>