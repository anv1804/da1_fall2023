<?php
$nameHotel = "";
$cityHotel = "";
$locationHotel = "";
$descHotel = "";
$imageHotel = "";
$oldImage = "";
$img = "";
$file = "";
if (isset($_GET['hotelID'])) {
    $hotelID = $_GET['hotelID'];
    $dataHotels = allHotels('','',$hotelID,'');
    // lấy dữ liệu của khách sạn trên db 
    if ($dataHotels) {
        // print_r($dataHotels);
        $hotelID = $dataHotels[0]['hotel_id'];
        $nameHotel = $dataHotels[0]['hotel_name'];
        $cityHotel = $dataHotels[0]['city_id'];
        $locationHotel = $dataHotels[0]['hotel_location'];
        $descHotel = $dataHotels[0]['hotel_desc'];
        $oldImage = $dataHotels[0]['hotel_image'];
    
    }
    // echo $oldImage;
    // hành động khi ấn nút update
    if (isset($_POST['update'])) {
        $hotelID = $_POST['id'];
        $nameHotel = $_POST['title'];
        $cityHotel = $_POST['city'];
        $locationHotel = $_POST['location'];
        $descHotel = $_POST['desc'];
        $file = $_FILES['file']['name'];
        $isCheck = true;

        // upload images
        $name = array();
        $tmp_name = array();
        $error = array();
        $ext = array();
        $size = array();
        if ($_FILES['file']['name'][0] != "") {
            // echo 1;
            // print_r($_FILES['file']['name']);
            // echo count(($_FILES['file']['name']));
            foreach ($_FILES['file']['name'] as $file) {
                $name[] = $file;
            }
            foreach ($_FILES['file']['tmp_name'] as $file) {
                $tmp_name[] = $file;
            }
            foreach ($_FILES['file']['error'] as $file) {
                $error[] = $file;
            }
            foreach ($_FILES['file']['type'] as $file) {
                $ext[] = $file;
            }
            foreach ($_FILES['file']['size'] as $file) {
                $size[] = round($file / 1024, 2);
            }
            $full = array();
            for ($i = 0; $i < count($name); $i++) {
                if ($error[$i] < 0) {
                    echo "Lỗi: " . $error[$i];
                } else {
                    $temp = preg_split('/[\/\\\\]+/', $name[$i]);
                    $filename = time() . basename($temp[count($temp) - 1]);
                    $upload_dir = "./uploads/images/hotels/";
                    $upload_file = $upload_dir . ($filename);
                    if (file_exists($upload_file)) {
                    } else {
                        if (move_uploaded_file($tmp_name[$i], $upload_file)) {
                        }
                        $name[$i] = $filename;
                        array_push($full, $name[$i]);
                    }
                } //End khoi cau lenh up file va them vao CSDL;
            }
            $imageHotel = implode(',', $full);
            $img = $imageHotel;
            // echo $img;
        }else{
            // $img = explode('-', $oldImage);
            $img = $oldImage;
            // echo $img;
        }
        if ($isCheck) {
            // echo $hotelID . '/' . $nameHotel . '/' . $descHotel . '/' . $locationHotel . '/' . $img . '/' . $cityHotel
            // updateHotels((int)$hotelID, "{$nameHotel}", "{$descHotel}", "{$locationHotel}", "{$img}", (int)$cityHotel);
            updateHotels($hotelID, $nameHotel, $descHotel, $locationHotel, $img, $cityHotel);
            $alert = '
                <div class="overlay" style="position:fixed;z-index: 9;width: 100%;height: 100vh;background-color: rgba(36, 42, 53, 0.7);overflow-y: hidden;">
                    <div class="popup" style="position: absolute;z-index: 10;top:45%;left: 50%;transform: translate(-50%,-50%);">
                        <p class="cookieHeading">Update Complete!</p>
                        <p class="cookieDescription">We use cookies to ensure that we give you the best experience on our
                            website. <br><a href="#">Read cookies policies</a>.</p>
                        <div class="buttonContainer">
                            <button class="declineButton"><a href="admin.php?page=edit-hotels&hotelID=' . $hotelID . '"
                                    style="display:inline-block;">Update</a></button>
                            <button class="acceptButton"><a href="admin.php?page=hotels" style="color:#fff">Continue</a></button>
                        </div>
                    </div>
                </div>
            ';
        }
    }

}
$city = loadCity();
$options = "";
if ($city) {
    foreach ($city as $key => $value) {
        $options .= '
            <option ' . ($cityHotel == $value['city_id'] ? 'selected' : '') . ' value="' . $value['city_id'] . '">' . $value['city_name'] . '</option>
        ';

    }
}
?>
<?php
if (isset($alert)) {
    echo $alert;
}
?>
<div class="col-lg-9 offset-lg-3 col-md-12 col-sm-12 col-pad">
    <div class="content-area5">
        <div class="dashboard-content">
            <div class="dashboard-header clearfix">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <h4>Add New Hotel</h4>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="breadcrumb-nav">
                            <ul>
                                <li>
                                    <a href="admin.php">Index</a>
                                </li>
                                <li>
                                    <a href="index.php?page=dashboard">Dashboard</a>
                                </li>
                                <li class="active">Add Hotel</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-list">
                <h4 class="bg-grea">Basic Information</h4>
                <div class="dashboard-messaged">
                    <div class="search-area contact-2">
                        <div class="search-area-inner">
                            <div class="search-contents ">
                                <form action="admin.php?page=edit-hotels&hotelID=<?= $hotelID ?>" method="post"
                                    enctype="multipart/form-data">
                                    <div class="row pad-20">
                                        <input type="hidden" name="id" class="form-control rei" value="<?= $hotelID ?>">
                                        <!-- Name -->
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label>Hotel Name</label>
                                                <input type="text" name="title" class="form-control rei"
                                                    value="<?= $nameHotel ?>">
                                            </div>
                                        </div>
                                        <!-- City  -->
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <select class="selectpicker search-fields" name="city">
                                                    <?= $options ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" name="location" class="form-control"
                                                    value="<?= $locationHotel ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="heading bg-grea">Gallery</h4>
                                    <div class="row pad-20">
                                        <div class="col-lg-12">
                                            <input id="myDropZone" class="dropzone dropzone-design" multiple="multiple"
                                                name="file[]" size="141" type="file"
                                                placeholder="Số file không được vượt quá 5" />
                                        </div>
                                    </div>
                                    <!-- show image -->
                                    <!-- desc -->
                                    <h4 class="heading bg-grea">Descriptions</h4>
                                    <div class="row pad-20">
                                        <div class="col-lg-12">
                                            <div class="form-group message">
                                                <div class="col-lg-12">
                                                    <input class="form-control" type="text" name="desc"
                                                        value="<?= $descHotel ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="heading bg-grea">Done</h4>
                                    <!-- SUBMIT -->
                                    <div class="row pad-20">
                                        <div class="col-lg-12">
                                            <div class="send-btn" style="margin:auto">
                                                <button type="submit" name="update" value="update"
                                                    class="btn btn-color btn-md btn-message">Update
                                                    Hotel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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