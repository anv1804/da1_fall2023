<?php
$loadHotels = allHotels('', $city = 1, '');
$countRooms = countRooms();
$dataHotels = "";
if ($loadHotels) {
    foreach ($loadHotels as $key => $value) {
        $hotelImages = explode(',', $value['hotel_image']);
        $dataHotels .= '
            <tr class="responsive-table">
                <td class="listing-photoo">
                    <img src="./assets/images/hotels/' . $hotelImages[0] . '" alt="listing-photo" class="img-fluid">
                </td>
                <td class="title-container">
                    <h2><a href="#">' . $value['hotel_name'] . '</a></h2>
                    <h5 class="d-none d-xl-block d-lg-block d-md-block"><i class="fa fa-map-marker"></i>
                    ' . $value['hotel_location'] . ' / ' . $value['city_name'] . '
                    </h5>
                </td>
                <td class="expire-date"><span style="color: red;font-size:18px;font-weight:550"> ' . $countRooms[$key][1] . '</span> ROOMS</td>
                <td class="action">
                    <a href="admin.php?page=edit-hotels&hotelID=' . $value['hotel_id'] . '"><i class="fa fa-pencil"></i> Edit</a>        
                    <a href="admin.php?page=delete-hotels&hotelID=' . $value['hotel_id'] . '"
                    onclick="return confirm("Are you sure you want to delete?")" class="delete">
                        <i class="fa fa-remove"></i> 
                        Delete
                    </a>

        ';
    }
}
$city = loadCity();
$options = "";
if ($city) {
    foreach ($city as $value) {
        $options .= '
                <option value="' . $value['city_id'] . '">' . $value['city_name'] . '</option>
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
                                    <a class="btn btn-md bomd btn-round" href="admin.php?page=add-hotels">Add New
                                        Hotel</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <form action="" class="row" style="display:flex;align-items: center;margin-top: 25px;">
                    <div class="col-lg-2 col-md-4">
                        <div class="form-group">
                            <select class="selectpicker search-fields" name="location">
                                <option value="0">All</option>
                                <?= $options ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control rei" placeholder="Name Of Hotels"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" style="padding:5px;" class="btn btn-color btn-md btn-message" name="submit"
                            value="SEARCH">
                    </div>
                </form>
                <hr>
            </div>
            <div class="subtitle">
                <!-- 20 Result Found -->
            </div>
            <div class="dashboard-list">
                <h3>Hotels</h3>
                <table class="manage-table">
                    <tbody>
                        <?= $dataHotels ?>
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
<script src="./assets/js/new-js/hotel-admin.js"></script>