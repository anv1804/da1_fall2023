<!-- Bg img start -->
<div class="bg-img overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-content-box">
                    <!-- Logo -->
                    <a href="index.php">
                        <img src="./assets/images/logo.png" class="cm-logo" alt="logo">
                    </a>
                    <!-- details -->
                    <div class="details">
                        <!-- Name -->
                        <h3>Sign into your account</h3>
                        <!-- Form start -->
                        <form action="index.php?page=login" method="post">
                            <div class="form-group" id="inputEmail">
                                <input type="email" class="form-control" name="email" placeholder="Email Address">
                            </div>
                            <div class="form-group2" style="display: flex;position: relative;">
                                <input id="inputPass" type="Password" class="form-control" name="password"
                                    placeholder="Password">
                                <label id="showpass"
                                    style="position: absolute;right: 5%;top: 50%; transform: translateY(-50%);">
                                    <input type="checkbox" style="display: none;">
                                    <span id="icon-hide" style="cursor: pointer" class="fa fa-eye" onclick="showPassword()"></span>
                                    <span id="icon-show" style="display:none;cursor: pointer;" class="fa fa-eye-slash"onclick="showPassword()"></span>
                                </label>
                            </div>
                            <div class="checkboxs form-group">
                                <div class="form-check checkbox-theme float-left">
                                    <input class="form-check-input" type="checkbox" value="" id="instant-book">
                                    <label class="form-check-label" for="instant-book">
                                        Remember me
                                    </label>
                                </div>
                                <a href="index.php?page=forgot-password" class="link-not-important pull-right">Forgot
                                    Password</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-color btn-md btn-block">login</button>
                            </div>
                        </form>
                        <!-- Form end -->
                    </div>
                    <!-- Sub Footer -->
                    <div class="sub-footer">
                        <span>Don't have an account? <a href="index.php?page=register">Register here</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bg img end -->