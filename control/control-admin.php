<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'dashbroad':
            include('./admin/profile/pages/dashboard.php');
            break;
        case 'hotels':
            include('./admin/profile/pages/hotels/hotels.php');
            break;
        case 'add-hotels':
            include('./admin/profile/pages/hotels/add-hotels.php');
            break;
        case 'edit-hotels':
            include('./admin/profile/pages/hotels/edit-hotels.php');
            break;
        case 'delete-hotels':
            include('./admin/profile/pages/hotels/delete-hotels.php');
            break;
        case 'rooms':
            include('./admin/profile/pages/rooms/rooms.php');
            break;
        case 'add-rooms':
            include('./admin/profile/pages/rooms/add-rooms.php');
            break;
        case 'edit-rooms':
            include('./admin/profile/pages/rooms/edit-rooms.php');
            break;
        case 'delete-rooms':
            include('./admin/profile/pages/rooms/delete-rooms.php');
            break;
        case 'comments':
            include('./admin/profile/pages/comments/comments.php');
            break;
            case 'delete-comments':
                include('./admin/profile/pages/comments/delete-comments.php');
                break;
        default:
            include('./admin/profile/pages/dashboard.php');
            break;
    }
} else {
    include('./admin/profile/pages/dashboard.php');
}
?>