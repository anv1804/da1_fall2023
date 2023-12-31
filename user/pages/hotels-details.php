<?php

if (isset($_GET['hotelID'])) {
    $hotelID = $_GET['hotelID'];
    // DATA HOTEL
    $dataHotels = allHotels('', '', $hotelID);
    $nameHotel = "";
    $locationHotel = "";
    $descHotel = "";
    $imageHotels = "";
    $view = "";
    // LOAD DATAS HOTELS
    if ($dataHotels) {
        $nameHotel = $dataHotels[0]['hotel_name'];
        $locationHotel = $dataHotels[0]['hotel_location'];
        $descHotel = $dataHotels[0]['hotel_desc'];
        $imageHotels = explode(',', $dataHotels[0]['hotel_image']);
        $views = $dataHotels[0]['hotel_views'];
    }
    ;
    // ADD VIEWS
    $addView = $views + 1;
    countViews($hotelID, $addView);
    // ALL ROOMS OF HOTEL
    $listRoom = roomsHotels($hotelID);
    $dataRoom = "";
    $numberRoom = "";
    $imageRoom = "";
    $typeBed = "";
    if ($listRoom) {
        foreach ($listRoom as $value) {
            $imageRooms = explode(',', $value['room_image']);
            $dataRoom .= '
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6" >
                    <div class="agent-2" style="border-radius:10px">
                        <div class="agent-photo">
                            <a href="index.php?page=rooms-details&roomID=' . $value["room_id"] . '">
                                <img style="border-radius:10px 10px 0 0" src="./assets/images/rooms/' . $imageRooms[0] . '" alt="room"
                                    class="img-fluid">
                            </a>
                        </div>
                        <div class="agent-details">
                            <h5><a href="index.php?page=rooms-details&roomID=' . $value["room_id"] . '" style="font-weight:bold">Room ' . $value['room_number'] . '</a></h5>
                            <p class="price" style="font-weight:500" >
                              Price: <strong style="font-weight:700">$</strong><span style="color:red;font-weight:700">' .
                $value['room_price'] . '</span>/1 day
                            </p>
                            <ul class="social-list clearfix" style="font-size:13px">
                                <li><a href="#"><i class="fa fa-wifi"></i></a></li>
                                <li><a href="#"><i class="fa fa-s15"></i></a></li>
                                <li><a href="#"><i class="fa fa-shower"></i></a></li>
                                <li><a href="#"><i class="fa fa-tv"></i></a></li>
                            </ul>
                            <ul class="social-list clearfix" style="font-size:15px;padding-top: 10px;color:#ffc107" >
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <br>                       
                            </ul>
                        </div>
                    </div>
                </div>
';
        }
    }
    // TOP HOTELS
    $topHotels = allHotels('', '', '', $top5 = 5);
    $dataTopHotels = "";
    if ($topHotels) {
        foreach ($topHotels as $value) {
            $imageTop = explode(',', $value['hotel_image']);
            $dataTopHotels .= '
            <div class="media mb-4">
                <a class="pr-3" href="index.php?page=hotels-details&hotelID=' . $value['hotel_id'] . '">
                    <img src="./assets/images/hotels/' . $imageTop[0] . '" alt="sub-tours">
                </a>
                <div class="media-body align-self-center">
                    <h5>
                        <a href="index.php?page=hotels-details&hotelID=' . $value['hotel_id'] . '">' . $value['hotel_name'] . '</a>
                    </h5>
                    <div class="listing-post-meta">
                    <i class="fa fa-eye"></i> ' . $value['hotel_views'] . ' | <a href="#">Hotel</a>
                    </div>
                </div>
            </div>
            <hr>
        ';
        }
    }
    // LOAD COMMENTS
    $loadComments = loadComments($hotelID);
    $allComments = "";
    if ($loadComments) {
        foreach ($loadComments as $value) {
            $starRate = $value['comment_rate'];
            $rateCmt = ratingCmt($starRate);
            $allComments .= '
                <div class="media dashboard-message">
                    <div class="pr-4">
                        <img src="./assets/img/avatar/' . $value['user_image'] . '" alt="blog">
                    </div>
                    <div class="media-body dashboard-message-text">
                        <h5> ' . $value['user_name'] . '
                            <span class="pull-right new">Reply</span>
                            <span style="color:#ffc107" class="ratings">
                                
                            </span>  
                            <span>( ' . $value['comment_date'] . ')</span>  
                            <p style="color:#ffc107">' . $rateCmt . '</p>
                        </h5>
                        <p> ' . $value['comment_content'] . '</p>
                        <span class="reply-mail clearfix">Reply : 
                            <a href="mailto:info@themevessel.com"> ' . $value['user_email'] . '</a>
                        </span>
                    </div>
                </div>
            ';
        }
    }
    // INSERT COMMENT
    if (isset($_POST['submit'])) {
        $rating = $_POST['rating'];
        $content = $_POST['content'];
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        } else if (isset($_COOKIE['user'])) {
            $user = json_decode($_COOKIE['user'], true);
        }
        if (isset($user) && $user['user_role'] == 0) {
            $userEmail = $user['user_email'];
            $result = user($userEmail);
            if (isset($result)) {
                $userID = $result[0]['user_id'];
                comment($content, $hotelID, $userID, $rating);
                header('location: index.php?page=hotels-details&hotelID=' . $hotelID . '');
            }

        } else {
            header('location: index.php?page=login');
        }
    }

}
$avgStar = totalRating($hotelID);
if (isset($avgStar)) {
    $starRate0 = "";
    $starRate1 = "";
    $starRate2 = "";

    $star = 5;
    $sum = (int) $avgStar[0]['sum'];
    $count = (int) $avgStar[0]['count'];
    if($sum && $count) {
    $data = $sum / $count;
    if (((floor($data) + 0.25) <= $data) && ($data <= (ceil($data) - 0.25)))  {
        $data = floor($data);
        $starRate0 .= '<i class="fa fa-star-half-o"></i>';
        for ($i = 0; $i < $data; $i++) {
            $starRate1 .= '<i class="fa fa-star"></i>';
        }
        for ($i = 1; $i < $star - $data; $i++) {
            $starRate2 .= '<i class="fa fa-star-o"></i>';
        }
        $stars = (string) $starRate1 . (string) $starRate0 . (string) $starRate2;
    } else {
        for ($i = 0; $i < $data; $i++) {
            $starRate1 .= '<i class="fa fa-star"></i>';
        }
        for ($i = 0; $i < $star - $data; $i++) {
            $starRate0 .= '<i class="fa fa-star-o"></i>';
        }
        $stars = (string) $starRate1 . (string) $starRate0;

    }
}else{
    for ($i = 0; $i < $star; $i++) {
        $starRate2 .= '<i class="fa fa-star-o"></i>';
    }
    $stars = (string)$starRate2;
}
}
?>
<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Hotels Detail</h1>
            <ul class="breadcrumbs">
                <li><a href="index.php">Home</a></li>
                <li class="active">Hotels Detail</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub banner end -->

<!-- Item details page start -->
<div class="item-details-page content-area-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div id="itemDetailsSlider" class="carousel item-details-sliders slide mb-40">
                    <div class="heading-item">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="title">
                                    <h3>
                                        <?= $nameHotel ?>
                                    </h3>
                                    <div class="dd">
                                        <span>
                                            <i class="fa fa-map-marker">
                                                <?= $locationHotel ?>
                                            </i>
                                        </span>
                                        <span class="ratings">
                                            <?= $stars ?>
                                            <span>( 7 Reviews )</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- main slider carousel items -->
                    <div class="carousel-inner">
                        <div class="active item carousel-item" data-slide-number="0">
                            <img style="object-fit: width: 100%;height: 100%;;"
                                src="./assets/images/hotels/<?= $imageHotels[0] ?>" class="img-fluid" alt="photo-4">
                        </div>
                        <div class="item carousel-item" data-slide-number="1">
                            <img style="object-fit: width: 100%;height: 100%;;"
                                src="./assets/images/hotels/<?= $imageHotels[1] ?>" class="img-fluid" alt="photo-4">
                        </div>
                        <div class="item carousel-item" data-slide-number="2">
                            <img style="object-fit: width: 100%;height: 100%;;"
                                src="./assets/images/hotels/<?= $imageHotels[2] ?>" class="img-fluid" alt="photo-4">
                        </div>
                        <div class="item carousel-item" data-slide-number="4">
                            <img style="object-fit: width: 100%;height: 100%;;"
                                src="./assets/images/hotels/<?= $imageHotels[3] ?>" class="img-fluid" alt="photo-4">
                        </div>
                        <div class="item carousel-item" data-slide-number="5">
                            <img style="object-fit: width: 100%;height: 100%;;"
                                src="./assets/images/hotels/<?= $imageHotels[4] ?>" class="img-fluid" alt="photo-4">
                        </div>
                    </div>
                    <!-- main slider carousel nav controls -->
                    <ul class="carousel-indicators smail-item list-inline nav nav-justified">
                        <li class="list-inline-item active">
                            <a id="carousel-selector-0" class="selected" data-slide-to="0"
                                data-target="#itemDetailsSlider">
                                <img style="object-fit: width: 100%;height: 100%;;"
                                    src="./assets/images/hotels/<?= $imageHotels[0] ?>" class="img-fluid" alt="photo-5">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-1" data-slide-to="1" data-target="#itemDetailsSlider">
                                <img style="object-fit: width: 100%;height: 100%;;"
                                    src="./assets/images/hotels/<?= $imageHotels[1] ?>" class="img-fluid" alt="photo-5">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-2" data-slide-to="2" data-target="#itemDetailsSlider">
                                <img style="object-fit: width: 100%;height: 100%;;"
                                    src="./assets/images/hotels/<?= $imageHotels[2] ?>" class="img-fluid" alt="photo-5">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-3" data-slide-to="3" data-target="#itemDetailsSlider">
                                <img style="object-fit: width: 100%;height: 100%;;"
                                    src="./assets/images/hotels/<?= $imageHotels[3] ?>" class="img-fluid" alt="photo-5">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-4" data-slide-to="4" data-target="#itemDetailsSlider">
                                <img style="object-fit: width: 100%;height: 100%;;"
                                    src="./assets/images/hotels/<?= $imageHotels[4] ?>" class="img-fluid" alt="photo-5">
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- description start -->
                <div class="description mb-40">
                    <h3 class="heading">Description</h3>
                    <p>
                        <?= $descHotel ?>
                    </p>
                </div>
                <!-- Location start -->
                <div class="location mb-40">
                    <h3 class="heading">Room</h3>
                    <div class="agent content-area-4">
                        <div class="container">
                            <div class="main-title">
                                <h1><span>Our </span>Room</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <div class="row">
                                <?= $dataRoom ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Amenities start -->
                <div class="amenities af mb-40">
                    <h3 class="heading">Services</h3>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <ul>
                                <li>
                                    <i class="flaticon-check"></i>
                                    Dolorem mediocritatem
                                </li>
                                <li>
                                    <i class="flaticon-check"></i>
                                    Security cameras
                                </li>
                                <li>
                                    <i class="flaticon-check"></i>
                                    Prima causae
                                </li>
                                <li>
                                    <i class="flaticon-check"></i>
                                    Singulis indoctum
                                </li>
                                <li>
                                    <i class="flaticon-check"></i>
                                    Timeam inimicus
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <ul>
                                <li>
                                    <i class="flaticon-check"></i>
                                    Oportere democritum
                                </li>
                                <li>
                                    <i class="flaticon-check"></i>
                                    Onsite management
                                </li>
                                <li>
                                    <i class="flaticon-check"></i>
                                    Street parking
                                </li>
                                <li>
                                    <i class="flaticon-check"></i>
                                    Cetero inermis
                                </li>
                                <li>
                                    <i class="flaticon-check"></i>
                                    Mea appareat
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <ul>
                                <li>
                                    <i class="flaticon-check"></i>
                                    Alarm system
                                </li>
                                <li>
                                    <i class="flaticon-check"></i>
                                    Door attendant
                                </li>
                                <li>
                                    <i class="flaticon-check"></i>
                                    Elevator
                                </li>
                                <li>
                                    <i class="flaticon-check"></i>
                                    Depanneur in building
                                </li>
                                <li>
                                    <i class="flaticon-check"></i>
                                    Janitor
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- vedio start -->
                <div class="video mb-40">
                    <h3 class="heading">Vedio</h3>
                    <iframe src="https://www.youtube.com/embed/m5_AKjDdqaU"></iframe>
                </div>

                <!-- Comments section start -->
                <div class="comments-section-2 clearfix mb-40">
                    <h2 class="comments-title">Comments Section</h2>
                    <ul class="comments">
                        <li>
                            <?= $allComments ?>
                        </li>
                    </ul>
                </div>
                <!-- Contact-1 start -->
                <div class="contact-1 hedin-mb-20">
                    <h2>Leave a Comment</h2>
                    <div class="container">
                        <div class="row">
                            <form action="index.php?page=hotels-details&hotelID=<?= $hotelID ?>" method="post"
                                enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="rating">
                                            <input type="radio" id="star5" name="rating" value="5">
                                            <label for="star5"></label>
                                            <input type="radio" id="star4" name="rating" value="4">
                                            <label for="star4"></label>
                                            <input type="radio" id="star3" name="rating" value="3">
                                            <label for="star3"></label>
                                            <input type="radio" id="star2" name="rating" value="2">
                                            <label for="star2"></label>
                                            <input type="radio" id="star1" name="rating" value="1">
                                            <label for="star1"></label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group message">

                                            <textarea class=" form-control" name="content" placeholder="Write message"
                                                id="" cols=" 30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <div class="send-btn mb-30">
                                            <button type="submit" name="submit"
                                                class="btn btn-color btn-md btn-message">Send
                                                Message
                                                <i class="fa fa-send"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar ml-20">
                    <div class="widget recent-posts">
                        <h4 class="sidebar-title">TOP Hotels</h4>
                        <?= $dataTopHotels ?>
                    </div>
                    <!-- Recent posts start -->
                    <div class="widget recent-posts">
                        <h4 class="sidebar-title">Recent Post</h4>
                        <div class="media mb-4">
                            <a class="pr-3" href="tours-details.html">
                                <img src="assets/img/sub-tours/sub-tours.jpg" alt="sub-tours">
                            </a>
                            <div class="media-body align-self-center">
                                <h5>
                                    <a href="tours-details.html">Sonargaon Dhaka Hotel</a>
                                </h5>
                                <div class="listing-post-meta">
                                    Oct 27, 2021 | <a href="#">Hotel</a>
                                </div>
                            </div>
                        </div>
                        <div class="media mb-4">
                            <a class="pr-3" href="tours-details.html">
                                <img src="assets/img/sub-tours/sub-tours-2.jpg" alt="sub-tours">
                            </a>
                            <div class="media-body align-self-center">
                                <h5>
                                    <a href="tours-details.html">Paris Temple Tour</a>
                                </h5>
                                <div class="listing-post-meta">
                                    Nov 23, 2021 | <a href="#">Travel</a>
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <a class="pr-3" href="tours-details.html">
                                <img src="assets/img/sub-tours/sub-tours-3.jpg" alt="sub-tours">
                            </a>
                            <div class="media-body align-self-center">
                                <h5>
                                    <a href="tours-details.html">Tour travel Tick</a>
                                </h5>
                                <div class="listing-post-meta">
                                    Jun 17, 2021 | <a href="#">Travel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Opening hours start -->
                    <div class="widget opening-hours">
                        <h5 class="sidebar-title">Opening Hours</h5>
                        <ul>
                            <li>Monday <span>10 AM - 6 PM</span></li>
                            <li>Tuesday <span>10 AM - 6 PM</span></li>
                            <li>Wednesday <span>10 AM - 6 PM</span></li>
                            <li>Thursday <span>10 AM - 6 PM</span></li>
                            <li>Friday <span>10 AM - 6 PM</span></li>
                            <li>Saturday <span>10 AM - 6 PM</span></li>
                            <li>Sunday <span>Closed</span></li>
                        </ul>
                    </div>
                    <!-- Hosted start -->
                    <div class="widget hosted">
                        <h5 class="sidebar-title">Hosted by</h5>
                        <div class="media">
                            <a href="tours-details.html">
                                <img src="assets/img/avatar/avatar-2.jpg" alt="teseira">
                            </a>
                            <div class="media-body align-self-center">
                                <h3><a href="tours-details.html">Teseira Jakey</a></h3>
                                <div class="star">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>( 7 Reviews )</span>
                                </div>
                            </div>
                        </div>
                        <ul class="contact-info">
                            <li>
                                <i class="flaticon-localization"></i>20/F Green Road, Dhanmondi
                            </li>
                            <li>
                                <i class="flaticon-mail"></i><a
                                    href="mailto:info@themevessel.com">info@themevessel.com</a>
                            </li>
                            <li>
                                <i class="flaticon-phone"></i><a href="tel:+0477-85x6-552">+0477 85x6 552</a>
                            </li>
                        </ul>

                        <div class="social-list clearfix">
                            <ul>
                                <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" class="rss-bg"><i class="fa fa-rss"></i></a></li>
                                <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Item details page start -->