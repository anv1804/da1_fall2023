<?php
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
    }
    $dataBook = "";
    $book = dataBooking($userID);
    if (isset($book)) {
        foreach ($book as $value) {
            $imageRoom = explode(',', $book[0]['room_image']);
            $dataBook .= '
                        <div class="col-sm-12 col-md-12">
                            <div class="media dashboard-message " style="">
                                <div class="pr-4">
                                    <img style="width:70px;height:70px;border-radius:50%" src="./assets/images/rooms/' . $imageRoom[0] . '" alt="user-avatar">
                                </div>
                                <div class="media-body dashboard-message-text">
                               
                                <h5> 
                                    <a href="index.php?page=hotels-details&hotelID='.$value['hotel_id'].'">' . $value['hotel_name'] . ' </a>
                                    <span class="pull-right new"> 
                                        <a style="color:#fff" href="index.php?page=rooms-details&roomID='.$value['room_id'].'">View Room</a>
                                    </span>
                                </h5>
                                    <ul>
                                        <li>Room Number :<span> ' . $value['room_number'] . '</span></li>
                                        <li>Hotel Location : <span>' . $value['hotel_location'] . '</span></li>
                                        <li>Booking Date : <span> ' . $value['date_booking'] . '</span></li>
                                        <li>Start date : <span>' . $value['date_start'] . '</span></li>
                                        <li>End date : <span> ' . $value['date_end'] . '</span></li>
                                        <li>Price : <span>$' . $value['total_price'] . ' </span></li>
                                        <li>Booking details :<span> 4 Peoples</span></li>
                                        <li>Mail : <span><a href="mailto:info@themevessel.com"> info@themevessel.com</a>
                                            </span></li>
                                        <li>Phone : <span> <a href="tel:+79617036705">+79617036705</a></span></li>
                                    </ul>
                                    <div class="buttons">
                                        <a href="#" class="btn-1 btn-gray"><i class="fa fa-fw fa-check-circle-o"></i>
                                            Approve</a>
                                        <a href="#" class="btn-1 btn-gray"><i class="fa fa-fw fa-times-circle-o"></i>
                                            Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
            ';
        }
    }
}

?>
<div class="col-lg-9 offset-lg-3 col-md-12 col-sm-12 col-pad">
    <div class="content-area5">
        <div class="dashboard-content">
            <div class="dashboard-header clearfix">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <h4>Bookings</h4>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="breadcrumb-nav">
                            <ul>
                                <li>
                                    <a href="index.php">Index</a>
                                </li>
                                <li>
                                    <a href="dashboard.php">Dashboard</a>
                                </li>
                                <li class="active">Bookings</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-list" style="width: 100%;">
                <h3>Bookings List</h3>
                <div class="dashboard-listd">
                    <div class="row">
                        <?= $dataBook ?>
                    </div>



                </div>
            </div>
        </div>
        <p class="sub-banner-2 text-center">© 2022 Theme Vessel. Trademarks and brands are the property of their
            respective owners.</p>
    </div>
</div>
</div>
</div>
</div>
<!-- Dashboard end -->