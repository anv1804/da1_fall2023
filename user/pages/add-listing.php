
<!-- Dashboard start -->
<div class="dashboard">
    <div class="container-fluid">
        <div class="row">
            <div class="dashboard-sidebar col-lg-3 col-md-12 col-sm-12 col-pad">
                <div class="dashboard-nav d-none d-xl-block d-lg-block">
                    <div class="dashboard-nav-inner-2">
                        <h4>Main</h4>
                        <ul>
                            <li><a href="dashboard.html"><i class="flaticon-dashboard"></i> Dashboard</a></li>
                            <li><a href="messages.html"><i class="flaticon-mail"></i> Messages <span class="nav-tag">2</span></a></li>
                            <li><a href="bookings.html"><i class="flaticon-timetable"></i> Bookings</a></li>
                        </ul>

                        <h4>Listings</h4>
                        <ul>
                            <li><a href="listings.html"><i class="flaticon-bullet"></i>My Listing</a></li>
                            <li><a href="reviews.html"><i class="flaticon-star"></i>Reviews</a></li>
                            <li><a href="bookmarks.html"><i class="flaticon-heart"></i>Bookmarks</a></li>
                            <li class="active"><a href="add-listing.html"><i class="flaticon-plus"></i>Add Listing</a></li>
                        </ul>

                        <h4>Account</h4>
                        <ul>
                            <li><a href="my-profile.html"><i class="flaticon-user"></i>My Profile</a></li>
                            <li><a href="index.html"><i class="flaticon-logout"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 offset-lg-3 col-md-12 col-sm-12 col-pad">
                <div class="content-area5">
                    <div class="dashboard-content">
                        <div class="dashboard-header clearfix">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"><h4>Add Listing</h4></div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="breadcrumb-nav">
                                        <ul>
                                            <li>
                                                <a href="index.html">Index</a>
                                            </li>
                                            <li>
                                                <a href="dashboard.html">Dashboard</a>
                                            </li>
                                            <li class="active">Add Listing</li>
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
                                            <form method="GET">
                                                <div class="row pad-20">
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="form-group">
                                                            <label>Listing Title</label>
                                                            <input type="text" name="name" class="form-control" placeholder="Name Of your Business">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="form-group">
                                                            <label>Category</label>
                                                            <select class="selectpicker search-fields" name="Category">
                                                                <option>Hotels</option>
                                                                <option>Shops</option>
                                                                <option>Restaurants</option>
                                                                <option>Eat & Drink</option>
                                                                <option>Hotels</option>
                                                                <option>Fitness</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="form-group">
                                                            <label>Keywords</label>
                                                            <input type="text" name="name" class="form-control" placeholder="Keywords should be separated by commas">
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4 class="heading bg-grea">Gallery</h4>
                                                <div class="row pad-20">
                                                    <div class="col-lg-12">
                                                        <div id="myDropZone" class="dropzone dropzone-design">
                                                            <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4 class="heading bg-grea">Location / Contacts</h4>
                                                <div class="row pad-20">
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text" name="address" class="form-control" placeholder="Address">
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
                                                            <input type="email" name="email" class="form-control" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label>Phone</label>
                                                            <input type="text" name="name" class="form-control" placeholder="Phone">
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4 class="heading bg-grea">Detailed Information</h4>
                                                <div class="row pad-20">
                                                    <div class="col-lg-12">
                                                        <div class="form-group message">
                                                            <textarea class="form-control" name="message" placeholder="Detailed Information"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4 class="heading bg-grea">Amenities</h4>
                                                <div class="row pad-20">
                                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                                        <div class="form-group">
                                                            <div class="form-check checkbox-theme">
                                                                <input class="form-check-input" type="checkbox" value="" id="alarm">
                                                                <label class="form-check-label" for="alarm">
                                                                    Elevator in building
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check checkbox-theme">
                                                                <input class="form-check-input" type="checkbox" value="" id="central-heating">
                                                                <label class="form-check-label" for="central-heating">
                                                                    Wireless Internet
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                                        <div class="form-group">
                                                            <div class="form-check checkbox-theme">
                                                                <input class="form-check-input" type="checkbox" value="" id="friendly">
                                                                <label class="form-check-label" for="friendly">
                                                                    Friendly workspace
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check checkbox-theme">
                                                                <input class="form-check-input" type="checkbox" value="" id="book">
                                                                <label class="form-check-label" for="book">
                                                                    Instant Book
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                                        <div class="form-group">
                                                            <div class="form-check checkbox-theme">
                                                                <input class="form-check-input" type="checkbox" value="" id="free-parking">
                                                                <label class="form-check-label" for="free-parking">
                                                                    Free Parking
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check checkbox-theme">
                                                                <input class="form-check-input" type="checkbox" value="" id="swimming-pool">
                                                                <label class="form-check-label" for="swimming-pool">
                                                                    Swimming Pool
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                                        <div class="form-group">
                                                            <div class="form-check checkbox-theme">
                                                                <input class="form-check-input" type="checkbox" value="" id="laundry-room">
                                                                <label class="form-check-label" for="laundry-room">
                                                                    Laundry Room
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check checkbox-theme">
                                                                <input class="form-check-input" type="checkbox" value="" id="window-covering">
                                                                <label class="form-check-label" for="window-covering">
                                                                    Window Covering
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4 class="heading bg-grea">Socials</h4>
                                                <div class="row pad-20">
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-group name">
                                                            <label>Facebook</label>
                                                            <input type="text" name="facebook" class="form-control" placeholder="https://www.facebook.com/">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-group email">
                                                            <label>Twitter</label>
                                                            <input type="text" name="twitter" class="form-control" placeholder="https://twitter.com/">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-group subject">
                                                            <label>Vkontakte</label>
                                                            <input type="text" name="vkontakte" class="form-control" placeholder="vk.com">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-group number">
                                                            <label>Whatsapp</label>
                                                            <input type="email" name="whatsapp" class="form-control" placeholder="https://www.whatsapp.com/">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-group subject">
                                                            <label>Youtube</label>
                                                            <input type="text" name="youtube" class="form-control" placeholder="https://www.youtube.com/">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-group number">
                                                            <label>Linkedin</label>
                                                            <input type="email" name="whatsapp" class="form-control" placeholder="https://www.linkedin.com/">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="send-btn">
                                                            <button type="submit" class="btn btn-color btn-md btn-message">Save Listing</button>
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
                    <p class="sub-banner-2 text-center">© 2022 Theme Vessel. Trademarks and brands are the property of their respective owners.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Dashboard end -->
