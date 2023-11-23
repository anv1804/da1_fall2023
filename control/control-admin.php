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
        case 'rooms':
            include('./admin/profile/pages/rooms.php');
            break;
        case 'comments':
            include('./admin/profile/pages/comments.php');
            break;

        default:
            include('./admin/profile/pages/dashboard.php');
            break;
    }
} else {
    include('./admin/profile/pages/dashboard.php');
}
?>