<?php
// pdo_query();
if (isset($data)) {
    foreach ($data as $tours) {
        $row .= '
        <div class="slick-slide-item col-lg-4 col-sm-4">
        <div class="item-box">
            <div class="item-thumbnail">
                <a href="tours-details.php?id=' . $value['tour-id'] . '" class="item-img">
                    <div class="tag">Historic</div>
                    <div class="price-ratings-box">
                        <p class="price">From <span>$69</span> Per Person</p>
                        <div class="ratings">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <span>( 7 Reviews )</span>
                        </div>
                    </div>
                    <div class="love">
                        <i class="flaticon-heart"></i>
                    </div>
                    <img src="assets/img/property-3.jpg" alt="tours" class="img-fluid">
                </a>
            </div>
            <div class="detail">
                <h1 class="title">
                    <a href="tours-details.html">Australia Sydney City</a>
                </h1>
                <div class="location">
                    <a href="tours-details.html">
                        <i class="flaticon-localization"></i>2726 Shinn Street, New York
                    </a>
                </div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
            </div>
            <div class="footer clearfix">
                <div class="pull-left">
                    <i class="flaticon-user"></i> Jhon Doe
                </div>
                <div class="pull-right">
                    <i class="flaticon-timetable"></i> 6 days
                </div>
            </div>
        </div>
    </div>
        ';
    }
}
?>
<script src="./assets/js/new-js/calendar.js"></script>
<!-- Form search -->
<?php
if (isset($_POST['submit']) && ($_POST['submit'])) {
    $listHotels = [];
    $hotel = $_POST['hotel'] ? $_POST['hotel'] : '';
    $dates = $_POST['dates'] ? $_POST['dates'] : '';
    $guest = $_POST['guest'] ? $_POST['guest'] : '';
    if ($hotel) {
        $hotels = allHotels($hotel);
        if ($hotels) {
            foreach ($hotels as $hotel) {
                $listHotels[] = $hotel[0];
            }
        }
    }
    if ($guest) {
        $guest = explode(',', $guest);
        if ($listHotels) {
            foreach ($listHotels as $key => $hotel) {
                $countHotel = countRooms($hotel);
                if ($guest[2] > $countHotel[0][1]) {
                    unset($listHotels[$key]);
                }
            }
        } else {
            $countHotels = countRooms();
            foreach ($countHotels as $countHotel) {
                if ($guest[2] <= $countHotel[1]) {
                    $listHotels[] = $countHotel[0];
                }
            }
        }
    }
    if ($dates) {
        if ($listHotels) {
            $countHotels = [];
            foreach ($listHotels as $hotel) {
                $countHotels[] = countRooms($hotel);
            }
            // print_r($countHotels[1][0]);
            // echo $countHotels[1][0][1];
            foreach ($listHotels as $key => $hotel) {
                $listRooms = roomsHotels($hotel);
                if ($listRooms) {
                    foreach ($listRooms as $room) {
                        // print_r($room);

                        $listDate = loadAllDate($room[0]);
                        // print_r($listDate);
                        if ($listDate) {
                            // print_r($listDate);

                            $dates = explode(' - ', $dates);

                            $amountRoom = validateDay($listDate, $dates);
                            // echo $amountRoom;

                            if ($amountRoom != 0) {
                                if ($countHotels[$key][0][0] == $hotel) {
                                    $countHotels[$key][0][1] -= $amountRoom;
                                    // echo $countHotels[$key][0][1];
                                    if ($guest[2] > $countHotels[$key][0][1]) {
                                        unset($listHotels[$key]);
                                    }
                                }
                            }

                        }
                    }
                }
            }
        }
    }
    // print_r($listHotels);
    $listHotels = array_values($listHotels);
    $listHotels = json_encode($listHotels);
    // echo $listHotels;
    echo "<script type='text/javascript'>window.location.href = './index.php?page=hotels&listHotels=$listHotels';</script>";

}
// POPULAR ROOM 
$topRoom = topRooms();
if (isset($topRoom)) {
    // echo "<pre>";
    // print_r($topRoom);
    // echo "</pre>";
    $topRooms = "";
    if ($topRoom) {
        foreach ($topRoom as $value) {
            $roomImages = explode(",", $value["room_image"]);
            $topRooms .= '
        <div class="slick-slide-item col-lg-4 col-sm-4">
        <div class="item-box">
            <div class="item-thumbnail">
                <a href="index.php?page=rooms-details&roomID=' . $value['room_id'] . '" class="item-img">
                    <div class="tag">Historic</div>
                    <div class="price-ratings-box">
                        <p class="price">From <span>$69</span> Per Person</p>
                        <div class="ratings">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <span>( 7 Reviews )</span>
                        </div>
                    </div>
                    <div class="love">
                        <i class="flaticon-heart"></i>
                    </div>
                    <img src="assets/images/rooms/' . $roomImages[0] . '" alt="tours" class="img-fluid">
                </a>
            </div>
            <div class="detail">
                <h1 class="title">
                    <a href="index.php?page=rooms-details&roomID=' . $value['room_id'] . ' ">' . $value['room_desc'] . '' . $value['hotel_name'] . ' </a>
                </h1>
                <div class="location">
                    <a href="index.php?page=rooms-details&roomID=' . $value['room_id'] . '">
                        <i class="flaticon-localization"></i>
                        ' . $value['hotel_location'] . '
                    </a>
                </div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
            </div>
            <div class="footer clearfix">
                <div class="pull-left">
                    <i class="flaticon-user"></i> Jhon Doe
                </div>
                <div class="pull-right">
                ' . $value['hotel_views'] . '<i class="flaticon-timetable"></i> 6 days
                </div>
            </div>
        </div>
    </div>
        ';
        }
    }
}
?>


<!-- Banner start -->
<div class="banner" id="banner">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active item-bg">
                <img class="d-block w-100 h-100" src="assets/img/banner-1.jpg" alt="banner">
                <div class="carousel-caption banner-slider-inner d-flex"></div>
            </div>
        </div>
    </div>

    <div class="banner-inner-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 data-animation="animated fadeInDown delay-05s">Find Anything You Want</h1>
                    <p data-animation="animated fadeInUp delay-10s">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit
                    </p>
                </div>
            </div>
            <form class="row inline-search-area search-area" action="index.php?page=home" method="post"
                id="form-search">
                <div class="col-lg-3 search-col">
                    <input type="text" name="hotel" class="form-control first-input" placeholder="Hotel, City.....">
                    <i class="flaticon-localization icon-append"></i>
                </div>
                <div class="col-lg-3 search-col">
                    <input type="text" name="dates" placeholder="When..." class="datetimes form-control" />
                    <i class="flaticon-timetable icon-append"></i>
                </div>
                <div class="col-lg-4 search-col">
                    <input type="text" name="guest" placeholder="Guest" class="form-control last-input" hidden />

                    <div class="form-guest">
                        <i class="fa fa-users"></i>
                        <div class="form-content"><span>2</span> adults, <span>0</span> children, <span>1</span> room
                        </div>
                        <i class="flaticon-down icon-append icon-search3"></i>
                    </div>
                    <div class="overlay"></div>
                    <div class="form-guest-inner">
                        <div class="form-guest-body">
                            <div class="form-guest-choose">
                                <div class="form-guest-info">
                                    <i class="fa fa-user"></i>
                                    <div class="form-guest-text">Adults</div>
                                </div>

                                <div class="form-guest-btns">
                                    <div class="form-guest-btn btn-pver active"><i class="fa fa-minus"></i></div>
                                    <div class="form-guest-btn-quantity">2</div>
                                    <div class="form-guest-btn btn-next active"><i class="fa fa-plus"></i></div>
                                </div>
                            </div>

                            <div class="form-guest-choose">
                                <div class="form-guest-info">
                                    <i class="fa fa-child"></i>
                                    <div class="form-guest-text">Children</div>
                                </div>

                                <div class="form-guest-btns">
                                    <div class="form-guest-btn btn-pver"><i class="fa fa-minus"></i></div>
                                    <div class="form-guest-btn-quantity">0</div>
                                    <div class="form-guest-btn btn-next active"><i class="fa fa-plus"></i></div>
                                </div>
                            </div>

                            <div class="form-guest-choose">
                                <div class="form-guest-info">
                                    <i class="fa fa-bed"></i>
                                    <div class="form-guest-text">Room</div>
                                </div>

                                <div class="form-guest-btns">
                                    <div class="form-guest-btn btn-pver"><i class="fa fa-minus"></i></div>
                                    <div class="form-guest-btn-quantity">1</div>
                                    <div class="form-guest-btn btn-next active"><i class="fa fa-plus"></i></div>
                                </div>
                            </div>

                            <div class="form-guest-close">
                                <div class="form-guest-btn-clear">Clear</div>
                                <div class="form-guest-btn-apply">Apply</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 search-col">
                    <button type="submit" value="submit" name="submit"
                        class="btn-theme btn-md btn-block">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- banner end -->

<!-- Featured item start -->
<div class="featured-item content-area-2">
    <div class="container">
        <div class="main-title">
            <h1>Popular Rooms</h1>
            <p>Best Room In This Week</p>
        </div>
        <div class="slick-slider-area">
            <div class="row slick-carousel"
                data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                <?= $topRooms ?>
            </div>
        </div>
        <div class="slick-prev slick-arrow-buton">
            <i class="fa fa-angle-left"></i>
        </div>
        <div class="slick-next slick-arrow-buton">
            <i class="fa fa-angle-right"></i>
        </div>
    </div>
</div>
</div>
<!-- Featured item end -->

<!-- Recently item start -->
<div class="recently-item content-area-2 bg-grea">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="main-title t-l">
                    <h2>Popular Hotels</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 align-self-center">
                <ul class="list-inline-listing filters filteriz-navigation p-r">
                    <li class="active btn filtr-button filtr" data-filter="all">All</li>
                    <li data-filter="1" class="btn btn-inline filtr-button filtr">Tours</li>
                    <li data-filter="2" class="btn btn-inline filtr-button filtr">Hotels</li>
                    <li data-filter="3" class="btn btn-inline filtr-button filtr">Eat & Drink</li>
                </ul>
            </div>
        </div>
        <div class="row filter-portfolio">
            <div class="cars">
                <div class="col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="3, 2">
                    <div class="item-box-2">
                        <a href="tours-details.html">
                            <img src="assets/img/property-7.jpg" alt="hotels" class="img-fluid">
                        </a>
                        <div class="tag button alt featured">Historic</div>
                        <div class="item-info">
                            <h3><a href="hotels-details.html">Radisson hotel</a></h3>
                            <h6><i class="flaticon-localization"></i> 2726 Shinn Street, New York</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="1, 3, 2">
                    <div class="item-box-2">
                        <a href="tours-details.html">
                            <img src="assets/img/property-8.jpg" alt="hotels" class="img-fluid">
                        </a>
                        <div class="tag button alt featured">Historic</div>
                        <div class="item-info">
                            <h3><a href="hotels-details.html">Sonargaon Dhaka Hotel</a></h3>
                            <h6><i class="flaticon-localization"></i> 2726 Shinn Street, New York</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="2, 1">
                    <div class="item-box-2">
                        <a href="tours-details.html">
                            <img src="assets/img/property-9.jpg" alt="hotels" class="img-fluid">
                        </a>
                        <div class="tag button alt featured">Historic</div>
                        <div class="item-info">
                            <h3><a href="hotels-details.html">Amazing Hotel</a></h3>
                            <h6><i class="flaticon-localization"></i> 2726 Shinn Street, New York</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="3, 2">
                    <div class="item-box-2">
                        <a href="tours-details.html">
                            <img src="assets/img/property-10.jpg" alt="hotels" class="img-fluid">
                        </a>
                        <div class="tag button alt featured">Historic</div>
                        <div class="item-info">
                            <h3><a href="hotels-details.html">Bangali Hotel</a></h3>
                            <h6><i class="flaticon-localization"></i> 2726 Shinn Street, New York</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="1, 3, 2">
                    <div class="item-box-2">
                        <a href="tours-details.html">
                            <img src="assets/img/property-11.jpg" alt="hotels" class="img-fluid">
                        </a>
                        <div class="tag button alt featured">Historic</div>
                        <div class="item-info">
                            <h3><a href="hotels-details.html">Relaxing Hotel</a></h3>
                            <h6><i class="flaticon-localization"></i> 2726 Shinn Street, New York</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="2, 1">
                    <div class="item-box-2">
                        <a href="tours-details.html">
                            <img src="assets/img/property-12.jpg" alt="hotels" class="img-fluid">
                        </a>
                        <div class="tag button alt featured">Historic</div>
                        <div class="item-info">
                            <h3><a href="hotels-details.html">Luxury Hotel</a></h3>
                            <h6><i class="flaticon-localization"></i> 2726 Shinn Street, New York</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Recently item end -->

<!-- services start -->
<div class="services content-area-2">
    <div class="container">
        <div class="main-title">
            <h1>How it works</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInLeft delay-04s">
                <div class="services-info-3">
                    <i class="flaticon-map"></i>
                    <h5>Find Interesting Place</h5>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                        been the</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 d-none d-xl-block d-lg-block wow fadeInUp delay-04s">
                <div class="services-info-3">
                    <i class="flaticon-mail"></i>
                    <h5>Contact a Few Owners</h5>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                        been the</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInRight delay-04s">
                <div class="services-info-3">
                    <i class="flaticon-user"></i>
                    <h5>Make a Reservation</h5>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                        been the</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- services end -->

<!-- Simple content start -->
<div class="simple-content overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="simple-text">
                    <h1>Visit The Best Places In Your City</h1>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                        been the industry's standard dummy text ever since the 1500s, when an.</p>
                    <a href="#" class="btn btn-md btn-color">Read more</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Simple content end -->

<!-- Blog start -->
<div class="blog content-area-2">
    <div class="container">
        <div class="main-title">
            <h1>Latest Blogs</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 wow fadeInLeft delay-04s">
                <div class="blog-1">
                    <div class="blog-photo">
                        <img class="blog-theme img-fluid" src="assets/img/blog/blog-3.jpg" alt="small-blog">
                        <div class="profile-user">
                            <img src="assets/img/avatar/avatar-2.jpg" alt="blog-user">
                        </div>
                    </div>
                    <div class="detail">
                        <div class="post-meta clearfix">
                            <ul>
                                <li>
                                    <strong><a href="#">Teseira</a></strong>
                                </li>
                                <li class="mr-0"><span>May 31, 2021</span></li>
                                <li class="float-right mr-0"><a href="#"><i class="flaticon-comment"></i></a>14k
                                </li>
                                <li class="float-right"><a href="#"><i class="flaticon-timetable"></i></a>5k</li>
                            </ul>
                        </div>
                        <h3>
                            <a href="blog-single-sidebar-right.html">Secure Travel Tips</a>
                        </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>


                        <a href="blog-single-sidebar-right.html" class="btn-read-more">Read more</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp delay-04s d-none d-xl-block d-lg-block">
                <div class="blog-1">
                    <div class="blog-photo">
                        <img class="blog-theme img-fluid" src="assets/img/blog/blog-2.jpg" alt="small-blog">
                        <div class="profile-user">
                            <img src="assets/img/avatar/avatar.jpg" alt="blog-user">
                        </div>
                    </div>
                    <div class="detail">
                        <div class="post-meta clearfix">
                            <ul>
                                <li>
                                    <strong><a href="#">Antony</a></strong>
                                </li>
                                <li class="mr-0"><span>May 31, 2021</span></li>
                                <li class="float-right mr-0"><a href="#"><i class="flaticon-comment"></i></a>14k
                                </li>
                                <li class="float-right"><a href="#"><i class="flaticon-timetable"></i></a>5k</li>
                            </ul>
                        </div>
                        <h3>
                            <a href="blog-single-sidebar-right.html">Travel Guideline Agents</a>
                        </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>


                        <a href="blog-single-sidebar-right.html" class="btn-read-more">Read more</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInRight delay-04s">
                <div class="blog-1">
                    <div class="blog-photo">
                        <img class="blog-theme img-fluid" src="assets/img/blog/blog-1.jpg" alt="small-blog">
                        <div class="profile-user">
                            <img src="assets/img/avatar/avatar-3.jpg" alt="blog-user">
                        </div>
                    </div>
                    <div class="detail">
                        <div class="post-meta clearfix">
                            <ul>
                                <li>
                                    <strong><a href="#">John Doe</a></strong>
                                </li>
                                <li class="mr-0"><span>May 31, 2021</span></li>
                                <li class="float-right mr-0"><a href="#"><i class="flaticon-comment"></i></a>14k
                                </li>
                                <li class="float-right"><a href="#"><i class="flaticon-timetable"></i></a>5k</li>
                            </ul>
                        </div>
                        <h3>
                            <a href="blog-single-sidebar-right.html">Travel Insuranve Benefits</a>
                        </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>


                        <a href="blog-single-sidebar-right.html" class="btn-read-more">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog end -->

<!-- intro section start -->
<div class="intro-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-12">
                <div class="intro-text">
                    <h3>Do You Have Questions ?</h3>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <a href="contact.html" class="btn btn-md">Get in Touch</a>
            </div>
        </div>
    </div>
</div>
<!-- intro section end -->
<script src="./assets/js/new-js/search-guest.js"></script>