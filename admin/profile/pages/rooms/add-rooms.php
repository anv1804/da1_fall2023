<?php
if (isset($_POST['submit'])) {

    $number= $_POST['number'];
    $price= $_POST['price'];
    $desc= $_POST['desc'];
    $bed= $_POST['bed'];
    $guest= $_POST['guest'];
    $hotelID= $_POST['hotelID'];

    $alert = "";
    // validate name
    // if (empty($title))
    // upload images
    $name = array();
    $tmp_name = array();
    $error = array();
    $ext = array();
    $size = array();
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
            $upload_dir = "./uploads/rooms/";
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
    $listImages = implode(',', $full);
    // $ccc = explode(',', $listImages);
    // print_r($ccc);
    $sql = "INSERT INTO
     `rooms`(`room_number`, `room_price`, `room_image`, `room_desc`, `room_status`, `bed_id`, `room_guest`, `hotel_id`) 
    VALUES 
    ('{$number}','{$price}','{$listImages}','{$desc}','0','{$bed}','{$guest}','{$hotelID}')";
    pdo_execute($sql);
    $alert = '
        <div class="overlay" style="position:fixed;z-index: 9;width: 100%;height: 100vh;background-color: rgba(36, 42, 53, 0.7);overflow-y: hidden;">
            <div class="popup" style="position: absolute;z-index: 10;top:45%;left: 50%;transform: translate(-50%,-50%);">
                <p class="cookieHeading">Add Complete!</p>
                <p class="cookieDescription">We use cookies to ensure that we give you the best experience on our
                    website. <br><a href="#">Read cookies policies</a>.</p>
                <div class="buttonContainer">
                    <button class="declineButton"><a href="admin.php?page=add-rooms"
                            style="display:inline-block;">Add</a></button>
                    <button class="acceptButton">
                        <a href="admin.php?page=rooms" style="color:#fff">Continue</a>
                    </button>
                </div>
            </div>
        </div>
        ';
}
$fullHotels = allHotels('',$city=1,'','');
$loadBeds = loadBeds();
$hotels = "";
$beds ="";
if ($fullHotels) {
    foreach ($fullHotels as $value) {
        $hotels .= '
                <option value="' . $value['hotel_id'] . '"> ' . $value['hotel_name'] . '</option>
            ';
    }
}
if ($loadBeds) {
    foreach ($loadBeds as $value) {
        $beds .= '
                <option value="' . $value['bed_id'] . '">' . $value['bed_type'] . '</option>
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
                        <h4>Add New ROOM</h4>
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
                                <li class="active">Add Room</li>
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
                                <form action="admin.php?page=add-rooms" method="post" enctype="multipart/form-data">
                                    <div class="row pad-20">
                                        <!-- Name -->
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label>Room Number</label>
                                                <input type="text" name="number" class="form-control rei"
                                                    placeholder="Name Of Hotels" required>
                                            </div>
                                        </div>
                                        <!-- Hotel  -->
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label>Hotel</label>
                                                <select class="selectpicker search-fields" name="hotelID">
                                                    <?= $hotels ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- price -->
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="number" name="price" class="form-control"
                                                    placeholder="Price / 1 Person" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label>Guest</label>
                                                <input type="number" name="guest" class="form-control"
                                                    placeholder="Price / 1 Person" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label>Type Bed</label>
                                                <select class="selectpicker search-fields" name="bed">
                                                    <?= $beds ?>
                                                </select>
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
                                                <textarea class="form-control" name="desc"
                                                    placeholder="Detailed Information" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="heading bg-grea">Done</h4>
                                    <!-- SUBMIT -->
                                    <div class="row pad-20">
                                        <div class="col-lg-12">
                                            <div class="send-btn" style="margin:auto">
                                                <button type="submit" name="submit"
                                                    class="btn btn-color btn-md btn-message">Add
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