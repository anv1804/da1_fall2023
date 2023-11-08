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
                            <div id="bar" class="" style="display: flex;">
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
                                    <a class="nav-link" href="index.php?page=tours" id="navbarDropdownMenuLink2">
                                        Tours
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
                                        <i class="flaticon-supermarket"></i>
                                        <sup style="position: absolute;top:35%;left: 60%;">0</sup>
                                    </a>
                                </li>
                                <li class="nav-item" style="">
                                    <a href="#full-page-search" class="nav-link h-icon">
                                        <i class="flaticon-search"></i>
                                    </a>
                                </li>
                                <?php
                                $user = "";
                                if (isset($_SESSION['role'])) {
                                    $user = '
                                        <li class="nav-item dropdown">
                                        <a href="dashboard.html" class="nav-link">
                                            <img style="width: 36px;" src="./assets/images/user.png" alt="">
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="position: absolute;left:-110%;text-align: center;" >
                                            <li><a class="dropdown-item" href="dashboard.html">Dashboard</a></li>
                                            <li><a class="dropdown-item" href="my-profile.html">My Profile</a></li>
                                            <li><a class="dropdown-item" href="messages.html">Messages</a></li>
                                            <li><a class="dropdown-item" href="bookings.html">Bookings</a></li>
                                            <li><a class="dropdown-item" href="listings.html">Listings</a></li>
                                            <li><a class="dropdown-item" href="reviews.html">Reviews</a></li>
                                            <li><a class="dropdown-item" href="bookmarks.html">Bookmarks</a></li>
                                            <li><a class="dropdown-item" href="add-listing.html" style="color: red;font-weight: bold;">Logout</a></li>
                                        </ul>
                                    </li>
                                        ';
                                }else{
                                    $user = '
                                    <li class="nav-item dropdown">
                                    <a href="index.php?page=login" class="nav-link">
                                        Sign In/Sign Up
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