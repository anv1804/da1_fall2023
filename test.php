
$dashboard = dashboard();
if ($dashboard) {
    echo "<pre>";
    // print_r($dashboard);
    echo "</pre>";
    $curYear = date('Y');
    $curMon = date('m');
    $curDay = date('d');
    $listY = array();
    $listM = array();
    $listD = array();
    $topBookY = array();
    $topBookM = array();
    $topBookD = array();

    foreach ($dashboard as $value) {
        $a1 = explode("/", $value['date_booking']);
        $year = $a1[2];
        $moneyY = array();
        $priceY = 0;
        if ($year == $curYear) {
            array_push($listY, $value['book_id']);
            array_push($topBookY, $value['hotel_id']);
            if ($listY) {
                foreach ($listY as $value) {
                    $bookID = (int) $value;
                    $bkY = checkBook($bookID);
                    foreach ($bkY as $item) {
                        $priceY = (int) $item['total_price'];
                        array_push($moneyY, $priceY);
                    }
                }
            }
            $countedY = array_count_values($topBookY);
            $max_valueY = max($countedY); //số lần đặt nhiều nhất
            $min_valueY = min($countedY); //số lần đặt ít nhất
            $max_keysY = (int) array_keys($countedY, $max_valueY)[0]; //id khách sạn đc đặ nhiều nhất
            $min_keysY = (int) array_keys($countedY, $min_valueY)[0]; //id khách sạn đc đặ ít nhất
        }
        $costY = array_sum($moneyY) / 24000;

    }
    if ($year == $curYear) {
    $trY = '';
    foreach (array_unique($topBookY) as $value) {
        $dataY = getHotel((int)$value);
        if(isset($dataY)){
        foreach ($dataY as $value) {
            $hotelImages = explode(',', $value['hotel_image']);

            if (isset($dataY)) {
                $trY .= '
                <tr align="center"> 
                <td class="product-thumbnail">
                    <a href="#">
                        <img style="width:100%;" src="./assets/images/hotels/' . $hotelImages[0] . '" alt="avatar">
                    </a>
                </td>
                <td><span>' . $value['hotel_name'] . ' </span></td>
                 <td class="product-name">
                     <span>' . $value['city_id'] . '</span><br>
                 </td>
                 <td class="hdn"><span>' . $value['count'] . '</span></td>
                 <td class="hdn"><span>' . $value['price'] . '</span></td>
             </tr>';
            }
        }
        }
    }
}

    foreach ($dashboard as $value) {
        $a1 = explode("/", $value['date_booking']);
        $year = $a1[2];
        $mon = $a1[1];
        $moneyM = array();
        $priceM = 0;
        if (($mon == $curMon) && ($year == $curYear)) {
            array_push($listM, $value['book_id']);
            array_push($topBookM, $value['hotel_id']);
            if ($listM) {
                foreach ($listM as $value) {
                    $bookID = (int) $value;
                    $bkM = checkBook($bookID);
                    foreach ($bkM as $item) {

                        $priceM = (int) $item['total_price'];
                        array_push($moneyM, $priceM);
                    }
                }
            }
            $countedM = array_count_values($topBookM);
            $max_valueM = max($countedM); //số lần đặt nhiều nhất
            $min_valueM = min($countedM); //số lần đặt ít nhất
            $max_keysM = (int) array_keys($countedM, $max_valueM)[0]; //id khách sạn đc đặ nhiều nhất
            $min_keysM = (int) array_keys($countedM, $min_valueM)[0]; //id khách sạn đc đặ ít nhất


        }
        $costM = array_sum($moneyM) / 24000;
    }
    if (($mon == $curMon) && ($year == $curYear)) {

    $trM = '';
    foreach ($topBookM as $value) {
        $dataM = getHotel((int)$value);
        if(isset($dataM)){
        foreach ($dataM as $value) {
            $hotelImages = explode(',', $value['hotel_image']);

            if (isset($dataM)) {
                $trM .= '
                <tr align="center"> 
                <td class="product-thumbnail">
                    <a href="#">
                        <img style="width:100%;" src="./assets/images/hotels/' . $hotelImages[0] . '" alt="avatar">
                    </a>
                </td>
                <td><span>' . $value['hotel_name'] . ' </span></td>
                 <td class="product-name">
                     <span>' . $value['city_id'] . '</span><br>
                 </td>
                 <td class="hdn"><span>' . $value['count'] . '</span></td>
                 <td class="hdn"><span>' . $value['price'] . '</span></td>
                 
                 
             </tr>';
            }
        }
        }
    }
}
    foreach ($dashboard as $value) {
        $a1 = explode("/", $value['date_booking']);
        $year = $a1[2];
        $mon = $a1[1];
        $day = $a1[0];
        $moneyD = array();
        $priceD = 0;
        if (($day == $curDay) && ($mon == $curMon) && ($year == $curYear)) {
            array_push($listD, $value['book_id']);
            array_push($topBookD, $value['hotel_id']);
            if ($listD) {
                foreach ($listD as $value) {
                    $bookID = (int) $value;
                    $bkD = checkBook($bookID);
                    foreach ($bkD as $item) {

                        $priceD = (int) $item['total_price'];
                        array_push($moneyD, $priceD);
                    }
                }
            }
            $countedD = array_count_values($topBookD);
            $max_valueD = max($countedD); //số lần đặt nhiều nhất
            $min_valueD = min($countedD); //số lần đặt ít nhất
            $max_keysD = (int) array_keys($countedD, $max_valueD)[0]; //id khách sạn đc đặ nhiều nhất
            $min_keysD = (int) array_keys($countedD, $min_valueD)[0]; //id khách sạn đc đặ ít nhất

        }
        $costD = array_sum($moneyD) / 24000;

    }
    $trD = '';
    foreach ($topBookD as $value) {
        $dataD = getHotel((int)$value);
        if(isset($dataD)){
        foreach ($dataD as $value) {
            $hotelImages = explode(',', $value['hotel_image']);

            if (isset($dataD)) {
                $trD .= '
                <tr align="center"> 
                <td class="product-thumbnail">
                    <a href="#">
                        <img style="width:100%;" src="./assets/images/hotels/' . $hotelImages[0] . '" alt="avatar">
                    </a>
                </td>
                <td><span>' . $value['hotel_name'] . ' </span></td>
                 <td class="product-name">
                     <span>' . $value['city_id'] . '</span><br>
                 </td>
                 <td class="hdn"><span>' . $value['count'] . '</span></td>
                 <td class="hdn"><span>' . $value['price'] . '</span></td>
                 
                 
             </tr>';
            }
        }
        }
    }
    // echo 'tổng tiền theo NGày ' . $min_keysD;
}
?>
<div class="col-lg-9 offset-lg-3 col-md-12 col-sm-12 col-pad">
    <div class="content-area5">
        <div class="dashboard-content">
            <div class="dashboard-header clearfix">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="breadcrumb-nav">
                            <ul>
                                <li style="cursor: pointer;" class="active">
                                    Year
                                </li>
                                <li style="cursor: pointer;">Mon</li>
                                <li style="cursor: pointer;">Week</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- aleart -->
            <div class="alert alert-success alert-2" role="alert"
                style="visibility: visible; animation-name: fadeInLeft;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
                HELLO <strong>ADMIN</strong>, WELCOME TO DASHBOARD!
            </div>
            <hr>
            <div class="row">
                <!-- prices -->
                <div class="col-lg-5 col-md-3 col-sm-6">
                    <div class="ui-item bg-success">
                        <div class="left">
                            <h4>$
                                1
                            </h4>
                            <p>
                                Revenue</p>
                        </div>
                        <div class="right">
                            <i class="fa fa-money"></i>
                        </div>
                    </div>
                </div>
                <!-- views -->
                <div class="col-lg-4 col-md-3 col-sm-6">
                    <div class="ui-item bg-warning">
                        <div class="left">
                            <h4>
                                2
                            </h4>
                            <p>Views</p>
                        </div>
                        <div class="right">
                            <i class="fa fa-eye"></i>
                        </div>
                    </div>
                </div>
                <!-- clients -->
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="ui-item bg-active">
                        <div class="left">
                            <h4>
                                3
                            </h4>
                            <p>Bookeds</p>
                        </div>
                        <div class="right">
                            <i class="fa fa-heart-o"></i>
                        </div>
                    </div>
                </div>
                <!-- comments -->
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="ui-item bg-dark">
                        <div class="left">
                            <h4>
                                4
                            </h4>
                            <p>Reviews</p>
                        </div>
                        <div class="right">
                            <i class="lnr lnr-bubble"></i>
                        </div>
                    </div>
                </div>
                <!-- hotels -->
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="ui-item bg-secondary">
                        <div class="left">
                            <h4>
                                5
                            </h4>
                            <p>Hotels</p>
                        </div>
                        <div class="right">
                            <i class="lnr lnr-apartment"></i>
                        </div>
                    </div>
                </div>
                <!-- rooms -->
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="ui-item bg-info">
                        <div class="left">
                            <h4>
                                6
                            </h4>
                            <p>Rooms</p>
                        </div>
                        <div class="right">
                            <i class="lnr lnr-home"></i>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="dashboard-list">
                        <div class="dashboard-message bdr clearfix ">
                            <div class="tab-box-2">
                                <div class="clearfix mb-30 comments-tr">
                                    <span>BOOKING</span>
                                    <ul class="nav nav-pills float-right" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-year-tab" data-toggle="pill"
                                                href="#pills-year" role="tab" aria-controls="pills-year"
                                                aria-selected="false">Year</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                                href="#pills-contact" role="tab" aria-controls="pills-contact"
                                                aria-selected="true">Mon</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active show" id="pills-profile-tab" data-toggle="pill"
                                                href="#pills-profile" role="tab" aria-controls="pills-profile"
                                                aria-selected="false">Day</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content" id="pills-tabContent">
                                    <!-- year -->
                                    <div class="tab-pane fade" id="pills-year" role="tabpanel"
                                        aria-labelledby="pills-year-tab">
                                        <div class="media coment-2">
                                            <div class="col-lg-4">
                                                <div class="ui-item bg-success">
                                                    <div class="left">
                                                        <h4>$
                                                            <?= $costY ?>
                                                        </h4>
                                                        <p>
                                                            Revenue</p>
                                                    </div>
                                                    <div class="right">
                                                        <i class="fa fa-money"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="ui-item bg-success">
                                                    <div class="left">
                                                        <h4>
                                                            <?= count($topBookY) ?>
                                                        </h4>
                                                        <p>
                                                            Booked</p>
                                                    </div>
                                                    <div class="right">
                                                        <i class="lnr lnr-home"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="ui-item bg-success">
                                                    <div class="left">
                                                        <h4>$
                                                            1
                                                        </h4>
                                                        <p>
                                                            Revenue</p>
                                                    </div>
                                                    <div class="right">
                                                        <i class="fa fa-money"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media coment-2">
                                            <div class="pr-4">
                                                <img src="assets/img/avatar/avatar-2.jpg" alt="user-avatar">
                                            </div>
                                            <div class="media-body dashboard-message-text">
                                                <h5>Emma Connor - <span>12 March 2022</span></h5>
                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                    typesetting industry. Lorem</p>
                                                <span class="reply-mail clearfix">Reply : <a
                                                        href="mailto:info@themevessel.com">info@themevessel.com</a></span>
                                            </div>
                                        </div>
                                        <div class="media coment-2">

                                            <table class="shop-table cart">
                                                <thead>
                                                    <tr align="center">

                                                        <th class="product-name">Image</th>
                                                        <th class="product-description">Hotel</th>
                                                        <th class="product-price">City</th>
                                                        <th class="product-subtotal">Booked</th>
                                                        <th class="product-price">Total Price</th>
                                                        <th class="product-remove">Cancellation Cate</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?= $trY ?>
                                                </tbody>
                                            </table>


                                        </div>
                                    </div>
                                    <!-- mon -->
                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                        aria-labelledby="pills-contact-tab">
                                        <div class="media coment-2">
                                            <div class="col-lg-4">
                                                <div class="ui-item bg-success">
                                                    <div class="left">
                                                        <h4>$
                                                            <?= $costM ?>
                                                        </h4>
                                                        <p>
                                                            Revenue</p>
                                                    </div>
                                                    <div class="right">
                                                        <i class="fa fa-money"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="ui-item bg-success">
                                                    <div class="left">
                                                        <h4>
                                                            <?= count($topBookM) ?>
                                                        </h4>
                                                        <p>
                                                            Booked</p>
                                                    </div>
                                                    <div class="right">
                                                        <i class="lnr lnr-home"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="ui-item bg-success">
                                                    <div class="left">
                                                        <h4>$
                                                            1
                                                        </h4>
                                                        <p>
                                                            Revenue</p>
                                                    </div>
                                                    <div class="right">
                                                        <i class="fa fa-money"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media coment-2">
                                            <div class="pr-4">
                                                <img src="assets/img/avatar/avatar.jpg" alt="user-avatar">
                                            </div>
                                            <div class="media-body dashboard-message-text">
                                                <h5>John Antony - <span>12 March 2022</span></h5>
                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                    typesetting industry. Lorem</p>
                                                <span class="reply-mail clearfix">Reply : <a
                                                        href="mailto:info@themevessel.com">info@themevessel.com</a></span>
                                            </div>
                                        </div>
                                        <div class="media coment-2">

                                            <table class="shop-table cart">
                                                <thead>
                                                    <tr align="center">

                                                        <th class="product-name">Image</th>
                                                        <th class="product-description">Hotel</th>
                                                        <th class="product-price">City</th>
                                                        <th class="product-subtotal">Booked</th>
                                                        <th class="product-price">Total Price</th>
                                                        <th class="product-remove">Cancellation Cate</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?= $trM ?>
                                                </tbody>
                                            </table>


                                        </div>
                                    </div>
                                    <!-- day -->
                                    <div class="tab-pane fade active show" id="pills-profile" role="tabpanel"
                                        aria-labelledby="pills-profile-tab">
                                        <div class="media coment-2">
                                            <div class="col-lg-4">
                                                <div class="ui-item bg-success">
                                                    <div class="left">
                                                        <h4>$
                                                            <?= $costD ?>
                                                        </h4>
                                                        <p>
                                                            Revenue</p>
                                                    </div>
                                                    <div class="right">
                                                        <i class="fa fa-money"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="ui-item bg-success">
                                                    <div class="left">
                                                        <h4>
                                                            <?= count($topBookD) ?>
                                                        </h4>
                                                        <p>
                                                            Booked</p>
                                                    </div>
                                                    <div class="right">
                                                        <i class="lnr lnr-home"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="ui-item bg-success">
                                                    <div class="left">
                                                        <h4>$
                                                            1
                                                        </h4>
                                                        <p>
                                                            Revenue</p>
                                                    </div>
                                                    <div class="right">
                                                        <i class="fa fa-money"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media coment-2">
                                            <div class="pr-4">
                                                <img src="assets/img/avatar/avatar.jpg" alt="user-avatar">
                                            </div>
                                            <div class="media-body dashboard-message-text">
                                                <h5>John Antony - <span>12 March 2022</span></h5>
                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                    typesetting industry. Lorem</p>
                                                <span class="reply-mail clearfix">Reply : <a
                                                        href="mailto:info@themevessel.com">info@themevessel.com</a></span>
                                            </div>
                                        </div>
                                        <div class="media coment-2">

                                            <table class="shop-table cart">
                                                <thead>
                                                    <tr align="center">

                                                        <th class="product-name">Image</th>
                                                        <th class="product-description">Hotel</th>
                                                        <th class="product-price">City</th>
                                                        <th class="product-subtotal">Booked</th>
                                                        <th class="product-price">Total Price</th>
                                                        <th class="product-remove">Cancellation Cate</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?= $trD ?>
                                                </tbody>
                                            </table>


                                        </div>
                                        

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="dashboard-list">
                        <div class="dashboard-message bdr clearfix ">
                            <div class="tab-box-2">
                                <div class="clearfix mb-30 comments-tr">
                                    <span>Comments</span>
                                    <ul class="nav nav-pills float-right" id="pills-tab2" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active show" id="pills-profile-tab2" data-toggle="pill"
                                                href="#pills-profile2" role="tab" aria-controls="pills-profile"
                                                aria-selected="false">Pending</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-contact-tab2" data-toggle="pill"
                                                href="#pills-contact2" role="tab" aria-controls="pills-contact"
                                                aria-selected="true">Approved</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content" id="pills-tabContent2">
                                    <div class="tab-pane fade" id="pills-contact2" role="tabpanel"
                                        aria-labelledby="pills-contact-tab2">
                                        <div class="media coment-2">
                                            <div class="col-lg-12 col-md-3 col-sm-6">
                                            </div>
                                        </div>
                                        <div class="media coment-2">
                                            <div class="pr-4">
                                                <img src="assets/img/avatar/avatar-2.jpg" alt="user-avatar">
                                            </div>
                                            <div class="media-body dashboard-message-text">
                                                <h5>Emma Connor - <span>12 March 2022</span></h5>
                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                    typesetting industry. Lorem</p>
                                                <span class="reply-mail clearfix">Reply : <a
                                                        href="mailto:info@themevessel.com">info@themevessel.com</a></span>
                                            </div>
                                        </div>
                                        <div class="media coment-2">
                                            <div class="pr-4">
                                                <img src="assets/img/avatar/avatar-3.jpg" alt="user-avatar">
                                            </div>
                                            <div class="media-body dashboard-message-text">
                                                <h5>Martin Smith - <span>12 March 2022</span></h5>
                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                    typesetting industry. Lorem</p>
                                                <span class="reply-mail clearfix">Reply : <a
                                                        href="mailto:info@themevessel.com">info@themevessel.com</a></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade active show" id="pills-profile2" role="tabpanel"
                                        aria-labelledby="pills-profile-tab2">
                                        <div class="media coment-2">
                                            <div class="pr-4">
                                                <img src="assets/img/avatar/avatar-2.jpg" alt="user-avatar">
                                            </div>
                                            <div class="media-body dashboard-message-text">
                                                <h5>Emma Connor - <span>12 March 2022</span></h5>
                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                    typesetting industry. Lorem</p>
                                                <span class="reply-mail clearfix">Reply : <a
                                                        href="mailto:info@themevessel.com">info@themevessel.com</a></span>
                                            </div>
                                        </div>
                                        <div class="media coment-2">
                                            <div class="pr-4">
                                                <img src="assets/img/avatar/avatar-3.jpg" alt="user-avatar">
                                            </div>
                                            <div class="media-body dashboard-message-text">
                                                <h5>Martin Smith - <span>12 March 2022</span></h5>
                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                    typesetting industry. Lorem</p>
                                                <span class="reply-mail clearfix">Reply : <a
                                                        href="mailto:info@themevessel.com">info@themevessel.com</a></span>
                                            </div>
                                        </div>
                                        <div class="media coment-2">
                                            <div class="pr-4">
                                                <img src="assets/img/avatar/avatar.jpg" alt="user-avatar">
                                            </div>
                                            <div class="media-body dashboard-message-text">
                                                <h5>John Antony - <span>12 March 2022</span></h5>
                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                    typesetting industry. Lorem</p>
                                                <span class="reply-mail clearfix">Reply : <a
                                                        href="mailto:info@themevessel.com">info@themevessel.com</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="sub-banner-2 text-center">© 2022 Theme Vessel. Trademarks and brands are the property of
            their respective owners.</p>
    </div>
</div>
</div>
</div>
</div>