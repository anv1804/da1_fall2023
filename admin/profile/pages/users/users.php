<?php
$loadUers = loadUsers();
$dataUsers = "";
if ($loadUers) {
   foreach ($loadUers as $value) {
        $dataUsers .='
        <div class="media dashboard-message" style="width:160vh">
            <div class="pr-4">
                <img src="assets/img/avatar/' . $value['user_image'] . '" alt="user-avatar">
            </div>
            <div class="media-body dashboard-message-text">
                <h5>' . $value['user_name'] . ' <span></span><span class="pull-right new">DELETE</span></h5>
                <ul>
                    <li>ID :<span>' . $value['user_id'] . '</span></li>
                    <li>Phone : <span> <a href="tel:' . $value['user_number'] . '">' . $value['user_number'] . '</a></span></li>
                    <li>Mail : <span><a href="mailto: ' . $value['user_email'] . '">  ' . $value['user_email'] . '</a> </span>
                    </li>
                </ul>
            </div>
        </div>';
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
                    <?= $dataUsers ?>
                </div>
            </div>
            <div class="pagination-box">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                    </ul>
                </nav>
            </div>
        </div>
        <p class="sub-banner-2 text-center">© 2022 Theme Vessel. Trademarks and brands are the property of their
            respective owners.</p>
    </div>
</div>
</div>
</div>
</div>
<script src="assets/js/new-js/user-admin.js"></script>

<!-- Dashboard end -->