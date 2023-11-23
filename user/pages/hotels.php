<?php
$hotel_name =''; 
if (isset($_POST['search']) && ($_POST['search'])) {
    $hotel_name = $_POST['hotel_name'];
}       

$allHotels = allHotels($hotel_name);
$dataHotels = "";
if ($allHotels) {
    foreach ($allHotels as $value) {
        // print_r($value['hotel_image']);
        $hotelImages = explode(',',$value['hotel_image']);
        // print_r($hotelImages);
        $dataHotels .= '
        <div class="item-box-3">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-5 col-pad">
                    <div class="item-thumbnail">
                        <a href="index.php?page=hotels-details&hotelID=' . $value['hotel_id'] . '" class="item-img">
                            <div class="tag">Historic</div>
                            <div class="price-ratings-box">
                                <p class="price">
                                    From <span>$69</span> Per Person
                                </p>
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
                            <img src="assets/img/' . $hotelImages[0] . '" alt="hotel-list" class="img-fluid">
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
                    <p>
                    ' . $value['hotel_desc'] . '
                    </p>
                    </div>
                    <div class="ftr">
                        <div class="pull-left">
                            <i class="flaticon-user"></i> Jhon Doe
                        </div>
                        <div class="pull-right">
                            <i class="flaticon-timetable"></i> 6 days
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
    }
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
                                <a href="index.php?page=hotels" class="change-view-btn active-view-btn"><i
                                        class="fa fa-th-list"></i></a>
                                <a href="index.php?page=hotels2" class="change-view-btn"><i
                                        class="fa fa-th-large"></i></a>
                            </div>
                            <div class="search-area">
                                <select class="selectpicker search-fields" name="location">
                                    <option>High to Low</option>
                                    <option>Low to High</option>
                                </select>
                            </div>
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
                            <!-- <li class="page-item"><a class="page-link" href="#"><span aria-hidden="true">«</span></a>
                            </li>
                            <li class="page-item"><a class="page-link active" href="tours-list-rightside.html">1</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="tours-list-leftside.html">2</a></li>
                            <li class="page-item"><a class="page-link" href="tours-list-fullwidth.html">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><span aria-hidden="true">»</span></a>
                            </li> -->
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
                            <button type="submit" name="search" value="search" class="btn"><i class="fa fa-search"></i></button>
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
                        <h5 class="sidebar-title">Categories</h5>
                        <ul>
                            <li><a href="#">All<span>(12)</span></a></li>
                            <li><a href="#">Adventure Tour<span>(5)</span></a></li>
                            <li><a href="#">Historical Tour<span>(63)</span></a></li>
                            <li><a href="#">Honeymoon<span>(23)</span></a></li>
                            <li><a href="#">Other<span>(7)</span></a></li>
                        </ul>
                    </div>
                    <!-- Rating start -->
                    <div class="widget rating">
                        <h5 class="sidebar-title">Rating</h5>
                        <form class="inline-search-area" method="GET">
                            <div class="form-group mb-0">
                                <div class="form-check checkbox-theme">
                                    <input class="form-check-input" type="checkbox" value="" id="instant-book">
                                    <label class="form-check-label" for="instant-book">
                                        Awesome Tours 10+(20)
                                    </label>
                                </div>
                                <div class="form-check checkbox-theme">
                                    <input class="form-check-input" type="checkbox" value="" id="superb">
                                    <label class="form-check-label" for="superb">
                                        Super 15+(20)
                                    </label>
                                </div>
                                <div class="form-check checkbox-theme">
                                    <input class="form-check-input" type="checkbox" value="" id="travel">
                                    <label class="form-check-label" for="travel">
                                        Travel & Tour 15+(20)
                                    </label>
                                </div>
                                <div class="form-check checkbox-theme">
                                    <input class="form-check-input" type="checkbox" value="" id="good">
                                    <label class="form-check-label" for="good">
                                        Good 12+(20)
                                    </label>
                                </div>
                                <div class="form-check checkbox-theme">
                                    <input class="form-check-input" type="checkbox" value="" id="pleasant">
                                    <label class="form-check-label" for="pleasant">
                                        Pleasant 14+(20)
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