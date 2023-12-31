<?php
if (isset($_GET['roomID'])) {
    $roomID = $_GET['roomID'];
    $result = allRooms($roomID);
    $numberRoom = "";
    $guestRoom = "";
    $descRoom = "";
    $imageRoom = "";
    $nameHotel = "";
    $location = "";

    if ($result) {
        $location = $result[0]['hotel_location'];
        $nameHotel = $result[0]['hotel_name'];
        $numberRoom = $result[0]['room_number'];
        $guestRoom = $result[0]['room_guest'];
        $descRoom = $result[0]['room_desc'];
        $imageRoom = explode(',', $result[0]['room_image']);
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
                                        <?= $numberRoom ?> -
                                        <?= $nameHotel ?>
                                    </h3>
                                    <div class="dd">
                                        <span>
                                            <i class="fa fa-map-marker text-danger">

                                                <?= $location ?>
                                            </i>
                                        </span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- main slider carousel items -->
                    <div class="carousel-inner">
                        <div class="active item carousel-item" data-slide-number="0">
                            <img style="width: 100%;height: 100%" src="./assets/images/rooms/<?= $imageRoom[0] ?>"
                                class="img-fluid" alt="photo-4">
                        </div>
                        <div class="item carousel-item" data-slide-number="1">
                            <img style="width: 100%;height: 100%" src="./assets/images/rooms/<?= $imageRoom[1] ?>"
                                class="img-fluid" alt="photo-4">
                        </div>
                        <div class="item carousel-item" data-slide-number="2">
                            <img style="width: 100%;height: 100%" src="./assets/images/rooms/<?= $imageRoom[2] ?>"
                                class="img-fluid" alt="photo-4">
                        </div>
                        <div class="item carousel-item" data-slide-number="4">
                            <img style="width: 100%;height: 100%" src="./assets/images/rooms/<?= $imageRoom[3] ?>"
                                class="img-fluid" alt="photo-4">
                        </div>
                        <div class="item carousel-item" data-slide-number="5">
                            <img style="width: 100%;height: 100%" src="./assets/images/rooms/<?= $imageRoom[4] ?>"
                                class="img-fluid" alt="photo-4">
                        </div>
                    </div>
                    <!-- main slider carousel nav controls -->
                    <ul class="carousel-indicators smail-item list-inline nav nav-justified">
                        <li class="list-inline-item active">
                            <a id="carousel-selector-0" class="selected" data-slide-to="0"
                                data-target="#itemDetailsSlider">
                                <img style="width: 100%;height: 100%" src="./assets/images/rooms/<?= $imageRoom[0] ?>"
                                    class="img-fluid" alt="photo-5">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-1" data-slide-to="1" data-target="#itemDetailsSlider">
                                <img style="width: 100%;height: 100%" src="./assets/images/rooms/<?= $imageRoom[1] ?>"
                                    class="img-fluid" alt="photo-5">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-2" data-slide-to="2" data-target="#itemDetailsSlider">
                                <img style="width: 100%;height: 100%" src="./assets/images/rooms/<?= $imageRoom[2] ?>"
                                    class="img-fluid" alt="photo-5">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-3" data-slide-to="3" data-target="#itemDetailsSlider">
                                <img style="width: 100%;height: 100%" src="./assets/images/rooms/<?= $imageRoom[3] ?>"
                                    class="img-fluid" alt="photo-5">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-4" data-slide-to="4" data-target="#itemDetailsSlider">
                                <img style="width: 100%;height: 100%" src="./assets/images/rooms/<?= $imageRoom[4] ?>"
                                    class="img-fluid" alt="photo-5">
                            </a>
                        </li>
                    </ul>
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
                <!-- Room status -->
                <?php
                $room_id = $_GET['roomID'];
                $listDate = loadAllDate($room_id);
                $rowDate = '';
                if ($listDate) {
                    foreach ($listDate as $date) {
                        $rowDate .= '
                                <li>' . $date['date_start'] . ' - ' . $date['date_end'] . '</li>
                            ';
                    }
                }
                $listDateJson = json_encode($listDate);
                ?>
                <script>
                    const listDate = JSON.parse('<?php echo addslashes($listDateJson); ?>');
                    // console.log(listDate);
                </script>

                <div class="video mb-40" id="room-status" style="position: relative;">
                    <h3 class="heading">Room status</h3>
                    <div class="wrapper">
                        <div>
                            <header>
                                <div class="icons">
                                    <span id="prev" class="material-symbols-rounded">chevron_left</span>
                                    <!-- <span id="next" class="material-symbols-rounded">chevron_right</span> -->
                                </div>
                                <p class="current-date"></p>
                            </header>
                            <div class="calendar">
                                <ul class="weeks">
                                    <li>Sun</li>
                                    <li>Mon</li>
                                    <li>Tue</li>
                                    <li>Wed</li>
                                    <li>Thu</li>
                                    <li>Fri</li>
                                    <li>Sat</li>
                                </ul>
                                <ul class="days"></ul>
                            </div>
                        </div>
                        <div>
                            <header>
                                <p class="current-date"></p>
                                <div class="icons">
                                    <!-- <span id="prev" class="material-symbols-rounded">chevron_left</span> -->
                                    <span id="next" class="material-symbols-rounded">chevron_right</span>
                                </div>
                            </header>
                            <div class="calendar">
                                <ul class="weeks">
                                    <li>Sun</li>
                                    <li>Mon</li>
                                    <li>Tue</li>
                                    <li>Wed</li>
                                    <li>Thu</li>
                                    <li>Fri</li>
                                    <li>Sat</li>
                                </ul>
                                <ul class="days"></ul>
                            </div>
                        </div>
                    </div>

                    <div style="overflow-x: auto;">
                        <ul class="list-date">
                            <?= $rowDate; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar ml-20">
                    <!-- Search area2 start -->
                    <div class="widget search-area2 d-none d-xl-block d-lg-block">
                        <h5 class="sidebar-title">Book This Room</h5>

                        <?php
                        function convertTime($time)
                        {
                            $time = explode(' ', $time);
                            if ($time[1] == "am") {
                                return $time[0];
                            } else {
                                $time = explode(':', $time[0]);
                                $time[0] += 12;
                                return implode(':', $time);
                            }
                        }
                        ;

                        if (isset($_POST['purchase']) && ($_POST['purchase'])) {


                            $dates = $_POST['dates'];
                            $timeCheckIn = $_POST['time-check-in'];
                            $timeCheckOut = $_POST['time-check-out'];

                            $timeCheckIn = convertTime($timeCheckIn);
                            $timeCheckOut = convertTime($timeCheckOut);
                            echo $timeCheckIn, $timeCheckOut;
                            $day = explode(' - ', $dates);
                            $date = date('m-d-Y');
                            $dayStart = explode('/', $day[0]);
                            $dayEnd = explode('/', $day[1]);
                            $dateStart = $dayStart[1] . '/' . $dayStart[0] . '/' . $dayStart[2] . '|' . $timeCheckIn;
                            $dateEnd = $dayEnd[1] . '/' . $dayEnd[0] . '/' . $dayEnd[2] . '|' . $timeCheckOut;
                            
                            if (isset($_SESSION['book'])) {
                                $_SESSION['book'] = [];
                            }
                            $_SESSION['book'] = ['room_id' => $room_id, 'date_start' => $dateStart, 'date_end' => $dateEnd];

                            echo "<script type='text/javascript'>window.location.href = './user/check-in/check-in.php';</script>";
                        }

                        ?>



                        <form class="inline-search-area" method="post"
                            action="index.php?page=rooms-details&roomID=<?= $roomID ?>" id="form-purchase">
                            <div class="form-group search-col">
                                <input type="text" name="dates" placeholder="WHEN... (m-d-y)" required
                                    class="datetimes-left form-control" />
                                <i class="flaticon-timetable icon-append"></i>
                                <span class="form-message text-danger"></span>
                            </div>
                            <div class="form-group">
                                <div class="form-group-time d-flex" style="justify-content:space-between;">
                                    <div class="form-time check-in" style="flex-basis:48%">
                                        <label for="check-in" style="font-size:14px;margin:0;">Check in:</label>
                                        <input type="text" class="time-pickable form-control" name="time-check-in"
                                            id="check-in" value="07:00 am" readonly>
                                    </div>
                                    <div class="form-time check-out" style="flex-basis:48%">
                                        <label for="check-out" style="font-size:14px;margin:0;">Check out:</label>
                                        <input type="text" class="time-pickable form-control" name="time-check-out"
                                            id="check-out" value="07:00 am" readonly>
                                    </div>
                                </div>
                                <span class="form-message text-danger"></span>
                            </div>
                            <div class="form-group search-col">
                                <select class="selectpicker search-fields btn-block form-control bdr" name="guest">
                                    <option> Room for
                                        <?= $guestRoom ?> Persons
                                    </option>
                                </select>
                                <i class="fa fa-users icon-append"></i>
                            </div>
                            <div class="form-group search-col" style="margin-top:20px">
                                <?php
                                if (isset($_SESSION['user']) || isset($_COOKIE['user'])) {
                                    echo '
                                            <button type="submit" style="margin-bottom: 8px;" name="purchase" value="purchase"
                                            class="btn-theme btn-md btn-block">Purchase</button>
                                        ';
                                } else {
                                    echo '
                                            <a style="margin-bottom: 8px;" name="purchase" value="purchase"
                                            class="btn-theme btn-md btn-block" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Purchase</a>
                                        ';
                                }
                                ?>

                            </div>

                            <!-- modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Notification</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            You are not logged into your account yet. <br/>
                                            Please log in to use this function!
                                        </div>
                                        <div class="modal-footer">
                                            <a href="./index.php?page=register" class="btn btn-success">Sign Up</a>
                                            <a href="./index.php?page=login" class="btn btn-primary">Sign In</a>
                                        </div>
                                    </div>
                                </div>
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
<script src="./assets/js/new-js/calendar.js"></script>
<script src="./assets/js/new-js/time-pickable.js"></script>