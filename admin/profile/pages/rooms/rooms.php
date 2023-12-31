<?php
$loadRooms = fullRooms();
$dataRooms = "";
if ($loadRooms) {
    // print_r($loadRooms);
    foreach ($loadRooms as $key => $value) {
        $roomImages = explode(',', $value['room_image']);
        $dataRooms .= '
            <tr class="responsive-table">
                <td class="listing-photoo">
                    <img src="./assets/images/rooms/' . $roomImages[0] . '" alt="listing-photo" class="img-fluid">
                </td>
                <td class="title-container">
                    <h2><a href="#">ROOM NUMBER ' . $value['room_number'] . '</a></h2>
                    <h5 class="d-none d-xl-block d-lg-block d-md-block"><i class="lnr lnr-apartment"></i>
                    ' . $value['hotel_name'] . ' 
                    </h5>
                    <h5 class="table-property-price">
                        <i class="lnr lnr-map-marker"></i>
                        ' . $value['hotel_location'] . '
                    </h5>
                    <h5 class="table-property-price">
                        <i class="lnr lnr-users"></i>
                        Room for ' . $value['room_guest'] . ' Guest
                    </h5>
                </td>
                <td class="expire-date">$<span style="color: red;font-size:18px;font-weight:550">' . $value['room_price'] . '</span>/ 1 DAY</td>
                <td class="action">
                    <a href="admin.php?page=edit-rooms&roomID=' . $value['room_id'] . '"><i class="fa fa-pencil"></i> Edit</a>        
                    <a href="admin.php?page=delete-rooms&roomID=' . $value['room_id'] . '"
                    onclick="return confirm("Are you sure you want to delete?")" class="delete">
                        <i class="fa fa-remove"></i> 
                        Delete
                    </a>

        ';
    }
}
$fullHotels = allHotels('', $city = 1, '', '');
$hotels = "";
if ($fullHotels) {
    foreach ($fullHotels as $value) {
        $hotels .= '
                <option value="' . $value['hotel_id'] . '"> ' . $value['hotel_name'] . '</option>
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
                        <h4>All Rooms</h4>
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
                                <li class="active">Rooms</li>
                                <li>
                                    <a class="btn btn-md bomd btn-round" href="admin.php?page=add-rooms">Add New
                                        Room</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <form action="" class="row" style="display: flex;align-items: center">
                    <div class="col-lg-3 col-md-4">
                        <div class="form-group">
                            <select class="selectpicker search-fields" name="location">
                                <option value="0">All</option>
                                <?= $hotels ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4" style="display: flex;align-items: center">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control rei" placeholder="Name Of Hotels"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="submit" style="padding:5px;" class="btn btn-color btn-md btn-message"
                                name="submit" value="SEARCH">
                        </div>
                    </div>

                </form>
                <hr>
            </div>
            <div class="dashboard-list">
                <h3>Rooms</h3>
                <table class="manage-table">
                    <tbody>
                        <?= $dataRooms ?>
                    </tbody>
                </table>
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
<script src="./assets/js/new-js/room-admin.js"></script>