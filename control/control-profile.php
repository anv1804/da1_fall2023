<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'profile':
            include('./user/profile/pages/my-profile.php');
            break;
        case 'dashboard':
            include './user/profile/pages/dashboard.php';
            break;
        case 'messages':
            include './user/profile/pages/messages.php';
            break;
        case 'bookings':
            include './user/profile/pages/bookings.php';
            break;
        case 'listings':
            include './user/profile/pages/listings.php';
            break;
        case 'reviews':
            include './user/profile/pages/reviews.php';
            break;
        case 'bookmarks':
            include './user/profile/pages/bookmarks.php';
            break;
        case 'add-listing':
            include './user/profile/pages/add-listing.php';
            break;
        case 'comment':
            include './user/profile/pages/comment.php';
            break;
        default:
            include('./user/profile/pages/dashboard.php');

            break;
    }
} else {
    include('./user/profile/pages/dashboard.php');

}
?>