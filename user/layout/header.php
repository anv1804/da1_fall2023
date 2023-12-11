<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Tag Manager -->
    <!-- End Google Tag Manager -->
    <title>PTravel - BookingHotels</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <!-- Google Font Link for Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/css/magnific-popup.css">
    <link type="text/css" rel="stylesheet" href="assets/css/jquery.selectBox.css">
    <link type="text/css" rel="stylesheet" href="assets/css/dropzone.css">
    <link type="text/css" rel="stylesheet" href="assets/css/slick.css">
    <link type="text/css" rel="stylesheet" href="assets/css/rangeslider.css">
    <link type="text/css" rel="stylesheet" href="assets/css/animate.min.css">
    <link type="text/css" rel="stylesheet" href="assets/css/daterangepicker.css">
    <link type="text/css" rel="stylesheet" href="assets/css/leaflet.css">
    <link type="text/css" rel="stylesheet" href="assets/css/map.css">
    <link type="text/css" rel="stylesheet" href="assets/css/new-css/rating.css">
    <link type="text/css" rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/linearicons/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css"
        href="../../../../../../fonts.googleapis.com/cssf93d.css?family=Raleway:300,400,500,600,300,700">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="assets/css/skins/default.css">
    <link rel="stylesheet" href="./assets/css/new-css/new-css.css">
    <link rel="stylesheet" href="./assets/css/new-css/calendar.css">

</head>
<style>
    @media (min-width: 756px) {
        #bar {
            display: flex;
            padding-left: 10%;
            margin: auto;
        }

    }
</style>

<body id="top">
    <!-- main header start -->
    <header class="main-header sticky-header header-with-top" id="main-header-2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-light rounded">
                        <a class="navbar-brand logo navbar-brand d-flex mr-auto" href="index.php">
                            <img src="./assets/images/logo.png" alt="logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fa fa-bars"></span>
                        </button>
                        <div class="navbar-collapse collapse w-100" id="navbar">
                            <ul class="navbar-nav"
                                style="align-items: center;display: flex; flex:1;justify-content: space-between ;">
                                <div id="bar" class="">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php?page=home" id="navbarDropdownMenuLink">
                                            Home
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php?page=about" id="navbarDropdownMenuLink2">
                                            About
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php?page=hotels" id="navbarDropdownMenuLink4">
                                            Hotels
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php?page=blog" id="navbarDropdownMenuLink5">
                                            Blog
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php?page=contact" id="navbarDropdownMenuLink5">
                                            Contact
                                        </a>
                                    </li>
                                </div>
                                <div class="" style="display: flex;align-items: center;justify-content: space-around;">
                                    <li class="nav-item" style="position:relative;margin-right: 10px;">
                                        <a href="index.php?page=cart" class="nav-link h-icon">
                                            <i class="fa fa-calendar"></i>
                                            <?php
                                            if (isset($_SESSION['user'])) {
                                                $user = $_SESSION['user'];
                                            } else if (isset($_COOKIE['user'])) {
                                                $user = json_decode($_COOKIE['user'], true);
                                            }
                                            if (isset($user) && $user['user_role'] == 0) {
                                                $userEmail = $user['user_email'];
                                                $result = user($userEmail);
                                                $userID = $result[0]['user_id'];
                                                $counts = countNoti($userID);
                                                if(isset($counts)){
                                                    $count = (int)$counts['count'];
                                                }else{
                                                    $count = 0;
                                                }
                                                
                                            }else{
                                                    $count = 0;
                                                }
                                            ?>
                                            <sup style="position: absolute;top:35%;left: 60%;">
                                                <?= $count ?>
                                            </sup>
                                        </a>
                                    </li>
                                    <li class="nav-item" style="">
                                        <a href="#full-page-search" class="nav-link h-icon">
                                            <i class="flaticon-search"></i>
                                        </a>
                                    </li>
                                    <?php
                                    $user = "";
                                    if (isset($_SESSION['user']) || isset($_COOKIE['user'])) {
                                        if (isset($_SESSION['user'])) {
                                            $user = $_SESSION['user'];
                                            $userEmail = $user['user_email'];
                                        } else {
                                            $user = json_decode($_COOKIE['user'], true);
                                            $userEmail = $user['user_email'];
                                        }
                                        $acc = user($userEmail);
                                        if ($acc[0]['user_image'] !== '') {
                                            $avatar = $acc[0]['user_image'];
                                        } else if ($acc[0]['user_image'] === '') {
                                            $avatar = 'user.png';
                                        }
                                        if ($user["user_role"] == '0') {

                                            $user = '
                                        <li class="nav-item dropdown">
                                            <a href="profile.php" class="nav-link">
                                                <img style="width: 36px;border-radius:50%" src="./assets/img/avatar/' . $avatar . '" alt="">
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="position: absolute;left:-110%;text-align: center;" >
                                                <li><a class="dropdown-item" href="profile.php?page=profile">My Profile</a></li>
                                                <li><a class="dropdown-item" href="messages.html">Messages</a></li>
                                                <li><a class="dropdown-item" href="bookings.html">Bookings</a></li>
                                                <li><a class="dropdown-item" href="listings.html">Listings</a></li>
                                                <li><a class="dropdown-item" href="reviews.html">Reviews</a></li>
                                                <li><a class="dropdown-item" href="bookmarks.html">Bookmarks</a></li>
                                                <li><a class="dropdown-item" href="./user/pages/logout.php" style="color: red;font-weight: bold;">Logout <span class="fa fa-sign-in"></span></a></li>
                                            </ul>
                                        </li>
                                            ';
                                        } else {
                                            $user = '
                                            <li class="nav-item dropdown">
                                                <a href="dashboard.html" class="nav-link">
                                                <img style="width: 36px;border-radius:50%" src="./assets/img/avatar/' . $avatar . '" alt="">
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="position: absolute;left:-110%;text-align: center;" >
                                                    <li><a class="dropdown-item" href="admin.php">Dashboard</a></li>
                                                    <li><a class="dropdown-item" href="my-profile.html">My Profile</a></li>
                                                    <li><a class="dropdown-item" href="messages.html">Messages</a></li>
                                                    <li><a class="dropdown-item" href="bookings.html">Bookings</a></li>
                                                    <li><a class="dropdown-item" href="listings.html">Listings</a></li>
                                                    <li><a class="dropdown-item" href="reviews.html">Reviews</a></li>
                                                    <li><a class="dropdown-item" href="bookmarks.html">Bookmarks</a></li>
                                                    <li><a class="dropdown-item" href="./user/pages/logout.php" style="color: red;font-weight: bold;">Logout <span class="fa fa-sign-in"></span></a></li>
                                                </ul>
                                            </li>
                                                ';
                                        }
                                    } else {
                                        $user = '
                                    <li class="nav-item dropdown">
                                    <a href="index.php?page=login" class="nav-link">
                                        Sign In <span class="fa fa-sign-in"></span>
                                    </a>
                                </li>
                                    ';
                                    }
                                    ?>
                                    <?= $user ?>

                                </div>
                                <!-- <li class="nav-item">
                                <a href="login.html" class="nav-link h-icon">
                                    <i class="flaticon-logout"></i>
                                </a>
                            </li> -->
                                <!-- <li class="nav-item dropdown">
                                <a class="open-offcanvas nav-link h-icon" href="#">
                                    <span></span>
                                    <span class="flaticon-bullet"></span>
                                </a>
                            </li> -->
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <?php
    include './control/control-header.php';
    ?>