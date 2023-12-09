<?php
 if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else if(isset($_COOKIE['user'])) {
    $user = json_decode($_COOKIE['user'], true);
}
if(isset($user)&&$user['user_role']==0){

include './model/pdo.php';
include './model/account.php';
include './model/hotels.php';


include './user/profile/layout/header.php';
include './user/profile/layout/footer.php';
    
}else{
    header('location: admin.php');
}
?>