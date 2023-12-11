<?php
$hotel_name = '';
if (isset($_POST['search']) && ($_POST['search'])) {
    $hotel_name = $_POST['hotel_name'];
}
$listHotel_id = '';
$listHotel_id_string = '';
if (isset($_GET['listHotels']) && ($_GET['listHotels'] != '[]')) {
    $listHotel_id = $_GET['listHotels'];
    $listHotel_id_string = $listHotel_id;
    $listHotel_id = json_decode($listHotel_id, true);
    $allHotels = allHotels('', '', '', '', $listHotel_id);
} else if (isset($_GET['listHotels']) && ($_GET['listHotels'] == '[]')) {
    $allHotels = allHotels('', '', 0);
} else {
    $allHotels = allHotels($hotel_name);
}
$dataHotels = "";
if ($allHotels) {

    foreach ($allHotels as $value) {
        $hotelID = $value['hotel_id'];
        $avgStar = totalRating($hotelID);
        $CMT = countCmt($hotelID);
        if(isset($CMT)){
            $countCmt = (int)$CMT['count'];
        }else{
            $countCmt = 0;
        }
        ;
        if (isset($avgStar)) {
            $starRate0 = "";
            $starRate1 = "";
            $starRate2 = "";
            $star = 5;
            $sum = (int) $avgStar[0]['sum'];
            $count = (int) $avgStar[0]['count'];
            if ($sum && $count) {
                $data = $sum / $count;
                if (((floor($data) + 0.25) <= $data) && ($data <= (ceil($data) - 0.25))) {
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
            } else {
                for ($i = 0; $i < $star; $i++) {
                    $starRate2 .= '<i class="fa fa-star-o"></i>';
                }
                $stars = (string) $starRate2;
            }
        }
        $hotelImages = explode(',', $value['hotel_image']);
        $dataHotels .= '
        <div class="item-box-3">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-5 col-pad">
                    <div class="item-thumbnail">
                        <a href="index.php?page=hotels-details&hotelID=' . $value['hotel_id'] . '" class="item-img">
                            <div class="tag">HOTEL</div>
                            <div class="price-ratings-box">
                                <p class="price">
                                    From <span>$66</span> Per Person
                                </p>
                                <div class="ratings">
                                    ' . $stars . '
                                    <span> ( '. $countCmt .' Review)</span>
                                </div>
                            </div>
                            <div class="love">
                                <i class="flaticon-heart"></i>
                            </div>
                            <img src="./assets/images/hotels/' . $hotelImages[0] . '" alt="hotel-list" class="img-fluid">
                        </a>
                    </div>
                </div>
            <div class="col-xl-7 col-lg-6 col-md-7 col-pad">
            <div class="detail">
                <!-- title -->
                    <h1 class="title">
                        <a href="index.php?page=hotels-details&hotelID=' . $value['hotel_id'] . '">' . $value['hotel_name'] . '</a>
                    </h1>
                    <!-- Location -->
                    <div class="location">
                        <a href="index.php?page=hotels-details&hotelID=' . $value['hotel_id'] . '">
                            <i class="flaticon-localization"></i>
                            ' . $value['hotel_location'] . '
                        </a>
                    </div>
                    <!-- Paragraph -->
                    </div>
                    <div class="ftr">
                        <div class="pull-left">
                            <i class="flaticon-user"></i> Jhon Doe
                        </div>
                        <div class="pull-right">
                        ' . $value['hotel_views'] . ' <i class="fa fa-eye" style="opacity: 0.7;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
    }
}
$category = category();
$dataCategory = "";
$cityList = "";
if ($category) {
    foreach ($category as $value) {
        $dataCategory .= '
            <li><a href="#">' . $value['city_name'] . '<span>(' . $value['countCity'] . ')</span></a></li>
    ';

        $cityList .= '<option value="' . $value['city_id'] . '">' . $value['city_name'] . '</option>';
    }

}
if (array_key_exists('button1', $_POST)) {
    mopup();
}
function mopup()
{
    echo "This is Button1 that is selected";
    $noti = '
                <div class="alert alert-success alert-1" role="alert"
                    style="visibility: visible; animation-name: fadeInLeft;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    HELLO <strong>ADMIN</strong>, WELCOME TO DASHBOARD!
                </div>
            ';
}
?>
<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Hotels Listing</h1>
            <ul class="breadcrumbs">
                <li><a href="index.php">Home</a></li>
                <li class="active">Hotels Listing</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub banner end -->

<!-- Hotels list rightside start -->
<div class="hotels-list-rightside content-area-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="option-bar d-none d-xl-block d-lg-block d-md-block d-sm-block">
                    <div class="row clearfix">
                        <div class="col-xl-4 col-lg-5 col-md-5 col-sm-5">
                            <h4>
                                <span class="heading-icon">
                                    <i class="fa fa-caret-right icon-design"></i>
                                    <i class="fa fa-th-list"></i>
                                </span>
                                <span class="heading">Hotels List</span>
                            </h4>
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-7 col-sm-7">
                            <div class="sorting-options clearfix">
                                <a href='index.php?page=hotels&listHotels=<?= $listHotel_id_string ?>'
                                    class='change-view-btn active-view-btn'><i class='fa fa-th-list'></i></a>
                                <a href='index.php?page=hotels2&listHotels=<?= $listHotel_id_string ?>'
                                    class='change-view-btn'><i class="fa fa-th-large"></i></a>

                            </div>
                            <form class="search-area" style="display: flex;">
                                <select class="selectpicker search-fields" name="location">
                                    <?= $cityList ?>
                                </select>
                                <button class="change-view-btn" type="submit" name="submit1" style="margin-left: 13px;">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="subtitle">
                    <!-- 20 Result Found -->
                </div>
                <?= $dataHotels ?>
                <div class="pagination-box">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar ml-20">

                    <!-- Tour search start -->
                    <div class="widget search-box">
                        <h5 class="sidebar-title">Search Hotel</h5>
                        <form class="form-search" action="index.php?page=hotels" method="post">
                            <input type="text" name="hotel_name" class="form-control" placeholder="Search">
                            <button type="submit" name="search" value="search" class="btn"><i
                                    class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <!-- Recent posts start -->
                    <div class="widget recent-posts">
                        <h4 class="sidebar-title">Recent Posts</h4>
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
                    <!-- Categories start -->
                    <div class="widget categories">
                        <h5 class="sidebar-title">Hotels of City</h5>
                        <ul>
                            <?= $dataCategory ?>
                        </ul>
                    </div>
                    <!-- Rating start -->
                    <div class="widget rating">
                        <h5 class="sidebar-title">Rating</h5>

                        <form class="inline-search-area" method="post">
                            <div class="form-group mb-0">
                                <div class="form-check checkbox-theme">
                                    <input class="form-check-input" type="submit" name="button1" value=""
                                        id="instant-book">
                                    <label class="form-check-label" for="instant-book">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </label>
                                </div>
                                <div class="form-check checkbox-theme">
                                    <input class="form-check-input" type="checkbox" value="" id="superb">
                                    <label class="form-check-label" for="superb">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </label>
                                </div>
                                <div class="form-check checkbox-theme">
                                    <input class="form-check-input" type="checkbox" value="" id="travel">
                                    <label class="form-check-label" for="travel">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </label>
                                </div>
                                <div class="form-check checkbox-theme">
                                    <input class="form-check-input" type="checkbox" value="" id="good">
                                    <label class="form-check-label" for="good">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </label>
                                </div>
                                <div class="form-check checkbox-theme">
                                    <input class="form-check-input" type="checkbox" value="" id="pleasant">
                                    <label class="form-check-label" for="pleasant">
                                        <i class="fa fa-star"></i>
                                    </label>
                                </div>
                                <div class="form-check checkbox-theme">
                                    <input class="form-check-input" type="checkbox" value="" id="travel good">
                                    <label class="form-check-label" for="travel good">
                                        All
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Hosted start -->
                    <div class="widget hosted">
                        <h5 class="sidebar-title">Hosted by</h5>

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
<!-- Hotels list rightside end -->
<script src="./assets/js/new-js/pagination.js"></script>