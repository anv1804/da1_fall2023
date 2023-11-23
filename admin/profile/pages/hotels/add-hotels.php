<?php
if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $city = $_POST['city'];
    $desc= $_POST['desc'];
    $location= $_POST['location'];


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
            $filename = $temp[count($temp) - 1];
            $upload_dir = "./assets/images/";
            $upload_file = $upload_dir . $filename;
            if (file_exists($upload_file)) {
                echo 'File đã tồn tại';
            } else {
                if (move_uploaded_file($tmp_name[$i], $upload_file)) {

                }
                array_push($full, $name[$i]);
            }
        } //End khoi cau lenh up file va them vao CSDL;
    }
    //    $abc = array($full);
    $listImages = implode(',', $full);
    $ccc = explode(',', $listImages);
    print_r($ccc);
    // $sql = "INSERT INTO `hotels`() `hotel_image`='{$listImages}'";
    // $sql = "INSERT INTO `hotels`
    //         (`hotel_id`, `hotel_name`, `hotel_desc`, `hotel_location`, `hotel_image`, `hotel_rate`, `hotel_views`, `city_id`) 
    //         VALUES 
    //         (null,$name,$desc,$location,'{$listImages}',0,0,$city)";
    // pdo_execute($sql);
    //End vong lap for cho tat ca cac file;
    echo '</p>';
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
$services = loadServices();
$checks = "";
if ($services) {
    foreach ($services as $value) {
        $checks .= '
                <div class="form-group">
                    <div class="form-check checkbox-theme">
                        <input class="form-check-input" type="checkbox" value="" id="' . $value['service_id'] . '">
                        <label class="form-check-label" for="' . $value['service_id'] . '">
                           ' . $value['service_name'] . '
                        </label>
                    </div>
                </div>
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
                                <form action="admin.php?page=add-hotels" method="post" enctype="multipart/form-data">
                                    <div class="row pad-20">
                                        <!-- Name -->
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label>Hotel Name</label>
                                                <input type="text" name="title" class="form-control"
                                                    placeholder="Name Of Hotels">
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
                                                    placeholder="Location detail">
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="heading bg-grea">Gallery</h4>
                                    <div class="row pad-20">
                                        <div class="col-lg-12">
                                            <input id="myDropZone" class="dropzone dropzone-design" multiple="multiple"
                                                name="file[]" size="141" type="file"
                                                placeholder="Số file không được vượt quá 5" />
                                            <!-- <div id="myDropZone" class="dropzone dropzone-design">
                                                <div class="dz-default dz-message"><span>Drop files here to
                                                        upload</span></div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <h4 class="heading bg-grea">Location</h4>
                                    <div class="row pad-20">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" name="address" class="form-control"
                                                    placeholder="Address">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" name="name" class="form-control" placeholder="Phone">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- show image -->
                                    <div class="row pad-20">
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" name="address" class="form-control"
                                                    placeholder="Address">
                                                <div >
                                                    <img src="./assets/img/property-1.jpg" alt="" class="ui-item" style="border: 1px solid #f8f9fa">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" name="address" class="form-control"
                                                    placeholder="Address">
                                                <div class="ui-item bg-success">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" name="address" class="form-control"
                                                    placeholder="Address">
                                                <div class="ui-item bg-success">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" name="address" class="form-control"
                                                    placeholder="Address">
                                                <div class="ui-item bg-success">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" name="address" class="form-control"
                                                    placeholder="Address">
                                                <div class="ui-item bg-success">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="heading bg-grea">Descriptions</h4>
                                    <div class="row pad-20">
                                        <div class="col-lg-12">
                                            <div class="form-group message">
                                                <textarea class="form-control" name="desc"
                                                    placeholder="Detailed Information"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="heading bg-grea">Amenities</h4>
                                    <div class="row pad-20">
                                        <div class="col-lg-3 col-md-3 col-sm-6">
                                            <?= $checks ?>
                                        </div>
                                    </div>
                                    <h4 class="heading bg-grea">Socials</h4>
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
<script type="text/javascript">
    const ipnFileElement = document.querySelector('input')
    const resultElement = document.querySelector('.preview')
    const validImageTypes = ['image/gif', 'image/jpeg', 'image/png']

    ipnFileElement.addEventListener('change', function (e) {
        const files = e.target.files
        const file = files[0]
        const fileType = file['type']

        if (!validImageTypes.includes(fileType)) {
            resultElement.insertAdjacentHTML(
                'beforeend',
                '<span class="preview-img">Chọn ảnh đi :3</span>'
            )
            return
        }

        const fileReader = new FileReader()
        fileReader.readAsDataURL(file)

        fileReader.onload = function () {
            const url = fileReader.result
            resultElement.insertAdjacentHTML(
                'beforeend',
                `<img src="${url}" alt="${file.name}" class="preview-img" />`
            )
        }
    })

</script>
<!-- Dashboard end -->