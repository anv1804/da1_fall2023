<?php
$loadHotels = allHotels();
$dataHotels = "";
$hotelID = 1;
$countRooms = countRooms();
if ($loadHotels) {
    foreach ($loadHotels as $key => $value) {
        $dataHotels .= '
            <tr class="responsive-table">
                <td class="listing-photoo">
                    <img src="assets/img/' . $value['hotel_image'] . '" alt="listing-photo" class="img-fluid">
                </td>
                <td class="title-container">
                    <h2><a href="#">' . $value['hotel_name'] . '</a></h2>
                    <h5 class="d-none d-xl-block d-lg-block d-md-block"><i class="fa fa-map-marker"></i>
                    ' . $value['hotel_location'] . '
                    </h5>
                    <h6 class="table-property-price">' . $value['hotel_desc'] . '</h6>
                </td>
                <td class="expire-date"><span style="color: red;font-size:18px;font-weight:550"> ' . $countRooms[$key][1] . '</span> ROOMS</td>
                <td class="action">
                    <a href="#"><i class="fa fa-pencil"></i> Edit</a>
                    <a href="#"><i class="fa  fa-eye-slash"></i> Hide</a>
                    <a href="#" class="delete"><i class="fa fa-remove"></i> Delete</a>
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
                        <h4>All Hotels</h4>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="breadcrumb-nav">
                            <ul>
                                <li>
                                    <a href="admin.php">Index</a>
                                </li>
                                <li>
                                    <a href="admin.php?page=dashboard">Dashboard</a>
                                </li>
                                <li class="active">Hotels</li>
                                <li>
                                    <a class="btn btn-md bomd btn-round" href="add-listing.php">Add New Hotel</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-list">
                <h3>Hotels</h3>
                <table class="manage-table">
                    <tbody>
                        <?= $dataHotels ?>
                    </tbody>
                </table>
            </div>
        </div>
        <p class="sub-banner-2 text-center">© 2022 Theme Vessel. Trademarks and brands are the property of their
            respective owners.</p>
    </div>
</div>
</div>
</div>
</div>