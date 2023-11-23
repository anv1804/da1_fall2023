
?>
<div class="col-lg-9 offset-lg-3 col-md-12 col-sm-12 col-pad">
    <div class="content-area5">
        <div class="dashboard-content">
            <div class="dashboard-header clearfix">
                <?php if(isset($alert)){
                    echo $alert;
                    }?>
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
                                                <input type="text" name="title" class="form-control rei"
                                                    placeholder="Name Of Hotels" required>
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
                                        </div>
                                    </div>
                                    <!-- show image -->
                                    <div class="row pad-20">
                                        <div class="col-lg-4 col-md-3 col-sm-3">
                                            <div class="form-group">
                                                <label>Image 1</label>
                                                <input type="text" name="address" class="form-control form-1"
                                                    placeholder="Address" readonly>
                                                <div>
                                                    <img src="./assets/img/property-1.jpg" alt="" class="ui-item"
                                                        style="border: 1px solid #f8f9fa">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-3 col-sm-3">
                                            <div class="form-group">
                                                <label>Image 1</label>
                                                <input type="text" name="address" class="form-control form-1"
                                                    placeholder="Address" readonly>
                                                <div>
                                                    <img src="./assets/img/property-1.jpg" alt="" class="ui-item"
                                                        style="border: 1px solid #f8f9fa">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-3 col-sm-3">
                                            <div class="form-group">
                                                <label>Image 1</label>
                                                <input type="text" name="address" class="form-control form-1"
                                                    placeholder="Address" readonly>
                                                <div>
                                                    <img src="./assets/img/property-1.jpg" alt="" class="ui-item"
                                                        style="border: 1px solid #f8f9fa">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-3 col-sm-3">
                                            <div class="form-group">
                                                <label>Image 1</label>
                                                <input type="text" name="address" class="form-control form-1"
                                                    placeholder="Address" readonly>
                                                <div>
                                                    <img src="./assets/img/property-1.jpg" alt="" class="ui-item"
                                                        style="border: 1px solid #f8f9fa">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-3 col-sm-3">
                                            <div class="form-group">
                                                <label>Image 1</label>
                                                <input type="text" name="address" class="form-control form-1"
                                                    placeholder="Address" readonly>
                                                <div>
                                                    <img src="./assets/img/property-1.jpg" alt="" class="ui-item"
                                                        style="border: 1px solid #f8f9fa">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-3 col-sm-3">
                                            <div class="form-group">
                                                <label>Image 1</label>
                                                <input type="text" name="address" class="form-control form-1"
                                                    placeholder="Address" readonly>
                                                <div>
                                                    <img src="./assets/img/property-1.jpg" alt="" class="ui-item"
                                                        style="border: 1px solid #f8f9fa">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                    <h4 class="heading bg-grea">Amenities</h4>
                                    <div class="row pad-20">
                                        <div class="col-lg-3 col-md-3 col-sm-6">
                                            <?= $checks ?>
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