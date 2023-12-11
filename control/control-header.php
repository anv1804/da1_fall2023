<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    
    switch ($page) {
        case 'home':
            include('./user/pages/home.php');
            break;
        case 'about':
            include('./user/pages/about.php');
            break;
        case 'hotels':
            include('./user/pages/hotels.php');
            break;
        case 'hotels2':
            include('./user/pages/hotels2.php');
            break;
        case 'hotels-details':
            include('./user/pages/hotels-details.php');
            break;
        case 'rooms-details':
            include('./user/pages/rooms-details.php');
            break;
        case 'blog':
            include('./user/pages/blog.php');
            break;
        case 'contact':
            include('./user/pages/contact.php');
            break;
        case 'cart':
            include('./user/pages/cart.php');
            break;
        case 'login':
            include('./user/pages/login.php');
            break;
        case 'register':
            include('./user/pages/register.php');
            break;
        case 'forgot-password':
            include('./user/pages/forgot-password.php');
            break;
        default:
            include('./user/pages/home.php');
            break;
    }
} else {
    include('./user/pages/home.php');

}
?>