<?php

$dashboard = dashboard('');
if ($dashboard) {
    echo "<pre>";
    print_r($dashboard);   
    echo "</pre>";
    $curYear = date('Y');
    $yhc  = array();
    foreach ($dashboard as $value) {
        $a1 = explode("/", $value['date_booking']);
        $year = $a1[2];
        if($year ==  $curYear){
            array_push($yhc, $value['book_id']);
        }
    }
    echo "<pre>";
    print_r($yhc);   
    echo "</pre>";
    $price = 0;
    if($yhc){
        foreach ($yhc as $value) {
            $bk = dashboard($value);
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

                                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                                href="#pills-contact" role="tab" aria-controls="pills-contact"
                                                aria-selected="true">Yeah</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active show" id="pills-profile-tab" data-toggle="pill"
                                                href="#pills-profile" role="tab" aria-controls="pills-profile"
                                                aria-selected="false">Month</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                        aria-labelledby="pills-contact-tab">
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
                                    <div class="tab-pane fade active show" id="pills-profile" role="tabpanel"
                                        aria-labelledby="pills-profile-tab">
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


<!-- Dashboard end -->