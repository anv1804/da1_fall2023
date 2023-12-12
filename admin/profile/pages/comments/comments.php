<?php
$loadCmt = loadCmt();
$dataCmt = "";
if (isset($loadCmt)) {
    foreach ($loadCmt as $value) {
        $imageHotel = explode(',', $loadCmt[0]['hotel_image']);
        $starRate = $value['comment_rate'];
        $rateCmt = ratingCmt($starRate);
        $dataCmt .= '
            <tr align="center"> 
        <td class="product-thumbnail">
            <a href="#">
                <img style="width:50%;" src="./assets/img/avatar/' . $value['user_image'] . '" alt="avatar">
            </a>
        </td>
            <td><span>' . $value['hotel_name'] . ' </span></td>
         <td class="product-thumbnail">
             <a href="index.php?page=hotels-details&hotelID=' . $value['hotel_id'] . '">
                 <img style="width:60%;" src="./assets/images/hotels/' . $imageHotel[0] . '" alt="avatar">
             </a>
         </td>
         <td class="product-name">
             <span>' . $value['comment_content'] . '</span><br>
         </td>
         <td class="hdn"><span>' . $value['comment_date'] . '</span></td>
         <td class="hdn"><span>' . $value['comment_rate'] . '</span></td>
         <td class="product-remove">
             <form method="post">
             <a href="admin.php?page=delete-comments&cmtID=' . $value['comment_id'] . '"><span class="pull-right new"><i class="fa fa-remove"></i></span></a>
             </form>
         </td>
     </tr>
            ';
    }
}
?>
<div class="col-lg-9 offset-lg-3 col-md-12 col-sm-12 col-pad">
    <div class="content-area5">
        <div class="dashboard-content">
            <div class="dashboard-header clearfix">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <h4>Reviews</h4>
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
                                <li class="active">Reviews</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-list" style="width: 100%;">
                <h3>Reviews List</h3>
                <div class="dashboard-listd">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="shop-table cart">
                                <thead>
                                    <tr align="center">
                                        <th class="product-subtotal">User</th>
                                        <th class="product-price">Hotel</th>
                                        <th class="product-name">Image</th>
                                        <th class="product-description">Content</th>
                                        <th class="product-price">Date</th>
                                        <th class="product-price">Rate</th>
                                        <th class="product-remove">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?= $dataCmt ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

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
<script src="./assets/js/new-js/comment-admin.js"></script>
<!-- Dashboard end -->