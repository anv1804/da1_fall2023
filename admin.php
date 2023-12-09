<?php
 if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else if(isset($_COOKIE['user'])) {
    $user = json_decode($_COOKIE['user'], true);
}
if(isset($user)&&$user['user_role']==1){

include './model/pdo.php';
include './model/account.php';
include './model/hotels.php';
include './model/rooms.php';
include './model/users.php';
include './model/comment.php';


include './admin/profile/layout/header.php';
include './admin/profile/layout/footer.php';
}
else{
    header('location:index.php');
}
?>