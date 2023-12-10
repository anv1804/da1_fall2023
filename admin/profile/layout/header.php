<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/theme-vessel-items/checking-sites-2/trek-html/HTML/main/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Nov 2023 14:14:20 GMT -->

<head>
    <title>Hotel, Travel & Tour Booking Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
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
    <link type="text/css" rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/linearicons/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/new-css/popup.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css"
        href="../../../../../../fonts.googleapis.com/cssf93d.css?family=Raleway:300,400,500,600,300,700">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="assets/css/skins/default.css">

</head>

<body id="top">

    <!-- main header start -->
    <header class="main-header header-2 fixed-header" id="main-header-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-light rounded">
                        <a class="navbar-brand logo pad-0" href="admin.php">
                            <img src="assets/img/logos/black-logo.png" alt="logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto d-lg-none d-xl-none">
                                <li class="nav-item dropdown active">
                                    <a href="admin.php?page=dashboard" class="nav-link">Dashboard</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="admin.php?page=comment" class="nav-link">Comment</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="admin.php?page=bookings" class="nav-link">Bookings</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="admin.php?page=listings" class="nav-link">My Listings</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="reviews.php" class="nav-link">Reviews</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="hotels.php" class="nav-link">Hotels</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="add-listing.php" class="nav-link">Add Listing</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="my-profile.php" class="nav-link">My Profile</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="index.php" class="nav-link">Logout</a>
                                </li>
                            </ul>
                            <div class="navbar-buttons ml-auto d-none d-xl-block d-lg-block">
                                <ul>
                                    <li>
                                        <div class="dropdown btns">
                                            <a class="dropdown-toggle" data-toggle="dropdown">
                                                <img src="assets/img/avatar/avatar.jpg" alt="avatar">
                                                My Account
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="dashboard.php">Dashboard</a>
                                                <a class="dropdown-item" href="messages.php">Messages</a>
                                                <a class="dropdown-item" href="hotels.php">Hotels</a>
                                                <a class="dropdown-item" href="my-profile.php">My profile</a>
                                                <a class="dropdown-item" href="./user/pages/logout.php">Logout</a>
                                            </div>
                                        </div>
                                    </li>
                                
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- main header end -->
    <!-- Dashboard start -->
    <div class="dashboard">

        <div class="container-fluid" style="height: 100%;">
            <div class="row">
                <div class="dashboard-sidebar col-lg-3 col-md-12 col-sm-12 col-pad">
                    <div class="dashboard-nav d-none d-xl-block d-lg-block">
                        <div class="dashboard-nav-inner-2">
                            <h4>Main</h4>
                            <ul>
                                <li class="active"><a href="admin.php?page=dashboard"><i class="flaticon-dashboard"></i>
                                        Dashboard</a></li>
                                <li><a href="admin.php?page=messages"><i class="flaticon-mail"></i> Messages <span
                                            class="nav-tag">2</span></a></li>
                                <li><a href="admin.php?page=bookings"><i class="flaticon-timetable"></i> Bookings</a>
                                </li>
                            </ul>
                            <h4>Listings</h4>
                            <ul>
                                <li><a href="admin.php?page=hotels"><i class="lnr lnr-apartment"></i>Hotels</a></li>
                                <li><a href="admin.php?page=rooms"><i class="lnr lnr-home"></i>Rooms</a></li>
                                <li><a href="admin.php?page=comments"><i class="fa fa-commenting-o"></i>Comments</a>
                                </li>
                                <li><a href="admin.php?page=users"><i class="lnr lnr-user"></i>Users</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
                include 'control/control-admin.php';
                // include 'control/control-crud.php';
                ?>