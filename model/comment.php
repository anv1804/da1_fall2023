<?php
 function loadCmt(){
    $sql = "SELECT * FROM comment 
    INNER JOIN hotels ON comment.hotel_id = hotels.hotel_id 
    INNER JOIN users ON comment.user_id = users.user_id";
    $result = pdo_query($sql);
    return $result;
 }
 function deleteCmts($cmtID)
 {
     $sql = "DELETE FROM comment WHERE comment_id = $cmtID";
     pdo_execute($sql);
 }
?>