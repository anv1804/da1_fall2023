<?php
if (isset($_GET['roomID'])) {
    $roomID = $_GET['roomID'];
    $sql = "SELECT * FROM rooms WHERE room_id=$roomID";
    $result = pdo_query($sql);
    $numberRoom = "";
    $guestRoom = "";
    $descRoom = "";
    $imageRoom = "";
    if ($result) {
        $numberRoom = $result[0]['room_number'];
        $guestRoom = $result[0]['room_guest'];
        $descRoom = $result[0]['room_desc'];
        $imageRoom = $result[0]['room_image'];
    }
    ;
}
?>
<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Room Detail</h1>
            <ul class="breadcrumbs">
                <li><a href="index.php">Home</a></li>
                <li class="active"> Room Detail</li>
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
                                        ROOM NUMBER
                                        <?= $numberRoom ?>
                                    </h3>
                                    <div class="dd">
                                        <span>
                                            <i class="lnr lnr-users">
                                                Room for
                                                <?= $guestRoom ?> Person
                                            </i>
                                        </span>
                                        <span class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
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
                            <img src="assets/img/property-11.jpg" class="img-fluid" alt="photo-4">
                        </div>
                        <div class="item carousel-item" data-slide-number="1">
                            <img src="assets/img/property-9.jpg" class="img-fluid" alt="photo-4">
                        </div>
                        <div class="item carousel-item" data-slide-number="2">
                            <img src="assets/img/property-10.jpg" class="img-fluid" alt="photo-4">
                        </div>
                        <div class="item carousel-item" data-slide-number="4">
                            <img src="assets/img/property-8.jpg" class="img-fluid" alt="photo-4">
                        </div>
                        <div class="item carousel-item" data-slide-number="5">
                            <img src="assets/img/property-12.jpg" class="img-fluid" alt="photo-4">
                        </div>
                    </div>
                    <!-- main slider carousel nav controls -->
                    <ul class="carousel-indicators smail-item list-inline nav nav-justified">
                        <li class="list-inline-item active">
                            <a id="carousel-selector-0" class="selected" data-slide-to="0"
                                data-target="#itemDetailsSlider">
                                <img src="assets/img/property-11.jpg" class="img-fluid" alt="photo-5">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-1" data-slide-to="1" data-target="#itemDetailsSlider">
                                <img src="assets/img/property-9.jpg" class="img-fluid" alt="photo-5">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-2" data-slide-to="2" data-target="#itemDetailsSlider">
                                <img src="assets/img/property-10.jpg" class="img-fluid" alt="photo-5">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-3" data-slide-to="3" data-target="#itemDetailsSlider">
                                <img src="assets/img/property-8.jpg" class="img-fluid" alt="photo-5">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-4" data-slide-to="4" data-target="#itemDetailsSlider">
                                <img src="assets/img/property-12.jpg" class="img-fluid" alt="photo-5">
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Search area2 start -->
                <div class="widget-2 search-area2 d-lg-none d-xl-none">
                    <h5 class="sidebar-title">Book the tour</h5>
                    <form class="inline-search-area" method="GET">
                        <div class="form-group search-col">
                            <input type="text" class="form-control" placeholder="Hotel, City.....">
                            <i class="flaticon-localization icon-append"></i>
                        </div>
                        <div class="form-group search-col">
                            <input type="text" name="dates" placeholder="When..." class="datetimes form-control" />
                            <i class="flaticon-timetable icon-append"></i>
                        </div>
                        <div class="form-group search-col">
                            <select class="selectpicker search-fields btn-block form-control bdr" name="guest">
                                <option>Guests</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                            <i class="flaticon-down icon-append"></i>
                        </div>
                        <div class="form-group">
                            <p>Radius around selected destination</p>
                            <div class="range-slider">
                                <div data-min="0" data-max="100" data-unit="Km" data-min-name="min_price"
                                    data-max-name="max_price" class="range-slider-ui ui-slider" aria-disabled="false">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="form-group search-col">
                            <a href="cart-1.html" class="btn-theme btn-md btn-block">Purchase</a>
                        </div>
                        <div class="form-group search-col mb-0">
                            <a href="wishlist.html" class="btn btn-md-outline btn-block">Add to wishlist</a>
                        </div>
                    </form>
                </div>
                <!-- description start -->
                <div class="description mb-40">
                    <h3 class="heading">Description</h3>
                    <p>
                        <?= $descRoom ?>
                    </p>
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
                            <div class="media dashboard-message">
                                <div class="pr-4">
                                    <img src="assets/img/avatar/avatar.jpg" alt="blog">
                                </div>
                                <div class="media-body dashboard-message-text">
                                    <h5>John Antony - <span>12 March 2022</span> <span
                                            class="pull-right new">Reply</span></h5>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since</p>
                                    <span class="reply-mail clearfix">Reply : <a
                                            href="mailto:info@themevessel.com">info@themevessel.com</a></span>
                                </div>
                            </div>
                            <div class="media dashboard-message">
                                <div class="pr-4">
                                    <img src="assets/img/avatar/avatar-2.jpg" alt="blog">
                                </div>
                                <div class="media-body dashboard-message-text">
                                    <h5>Karen Paran - <span>12 March 2022</span> <span
                                            class="pull-right new">Reply</span></h5>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since</p>
                                    <span class="reply-mail clearfix">Reply : <a
                                            href="mailto:info@themevessel.com">info@themevessel.com</a></span>
                                </div>
                            </div>
                            <ul>
                                <li>
                                    <div class="media dashboard-message">
                                        <div class="pr-4">
                                            <img src="assets/img/avatar/avatar-3.jpg" alt="blog">
                                        </div>
                                        <div class="media-body dashboard-message-text">
                                            <h5>Daniel Deve - <span>12 March 2022</span> <span
                                                    class="pull-right new">Reply</span></h5>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has been the industry's standard dummy text
                                                ever</p>
                                            <span class="reply-mail clearfix">Reply : <a
                                                    href="mailto:info@themevessel.com">info@themevessel.com</a></span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- Contact-1 start -->
                <div class="contact-1 hedin-mb-20">
                    <h2>Leave a Comment</h2>
                    <div class="container">
                        <div class="row">
                            <form action="#" method="GET" enctype="multipart/form-data">
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
                                            <textarea class="form-control" name="message"
                                                placeholder="Write message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <div class="send-btn mb-30">
                                            <button type="submit" name="submit"
                                                class="btn btn-color btn-md btn-message">Send
                                                Message</button>
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
                    <!-- Search area2 start -->
                    <div class="widget search-area2 d-none d-xl-block d-lg-block">
                        <h5 class="sidebar-title">Book This Room</h5>
                        <form class="inline-search-area" method="post">
                            <div class="form-group search-col">
                                <input type="text" name="dates" placeholder="When..."
                                    class="datetimes-left form-control" />
                                <i class="flaticon-timetable icon-append"></i>
                            </div>
                            <div class="form-group search-col">
                                <select class="selectpicker search-fields btn-block form-control bdr" name="guest">
                                    <option> Room for <?= $guestRoom ?> Persons</option>
                                </select>
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="form-group">
                                <p>Radius around selected destination</p>
                                <div class="range-slider">
                                    <div data-min="0" data-max="100" data-unit="Km" data-min-name="min_price"
                                        data-max-name="max_price" class="range-slider-ui ui-slider"
                                        aria-disabled="false"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="form-group search-col">
                                <a href="cart-1.html" class="btn-theme btn-md btn-block">Purchase</a>
                            </div>
                            <div class="form-group search-col mb-0">
                                <a href="wishlist.html" class="btn btn-md-outline btn-block">Add to wishlist</a>
                            </div>
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