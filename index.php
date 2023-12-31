<?php
include './model/pdo.php';
include './model/account.php';
include './model/hotels.php';
include './model/rooms.php';
include './model/users.php';
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else if (isset($_COOKIE['user'])) {
    $user = json_decode($_COOKIE['user'], true);
}
if (isset($user) && $user['user_role'] == 1) {
    header('Location: admin.php');
} else {
    if (isset($user) && $user['user_role'] == 0) {
        $userEmail = $user['user_email'];
        $result = user($userEmail);
        $userID = $result[0]['user_id'];
        include './user/layout/header.php';
        include './user/layout/footer.php';
    } else {
        include './user/layout/header.php';
        include './user/layout/footer.php';
    }

}
?>