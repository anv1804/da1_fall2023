<?php 
    $error_message = "";
    if (isset($_POST["submit"]) && ($_POST["submit"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $checkRemember = '';
        if (isset($_POST['remember'])) {
            $checkRemember = $_POST['remember'];
        }
        $checkLogin = login($email, $password, $checkRemember);
        if ($checkLogin) {
            echo '<script type="text/javascript">window.location.href = "./index.php?page=home";</script>';
        }else {
            $error_message = "Account or password is incorrect!";
        }
    }

?>


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
                        <form action="index.php?page=login" method="post" id="form-login">
                            <div class="form-group" id="inputEmail">
                                <input rules="required|email" type="email" class="form-control" name="email" placeholder="Email Address">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group" style="display: flex;position: relative;">
                                <input rules="required|password" id="inputPass" type="Password" class="form-control" name="password"
                                    placeholder="Password">
                                <label id="showpass"
                                    style="position: absolute;right: 1%;top: 3%;">
                                    <input type="checkbox" style="display: none;">
                                    <span id="icon-hide" style="cursor: pointer" class="fa fa-eye" onclick="showPassword()"></span>
                                    <span id="icon-show" style="display:none;cursor: pointer;" class="fa fa-eye-slash"onclick="showPassword()"></span>
                                </label>
                                <span class="form-message" style="min-height:39px"></span>
                            </div>
                            <div class="checkboxs" style="margin:4px 0 20px">
                                <div class="form-check checkbox-theme float-left" style="margin-left:20px">
                                    <input class="form-check-input" name="remember" type="checkbox" value="yes" id="instant-book">
                                    <label class="form-check-label" for="instant-book">
                                        Remember me
                                    </label>
                                </div>
                                <a href="index.php?page=forgot-password" class="link-not-important pull-right">Forgot
                                    Password</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" name="submit" value="submit" class="btn btn-color btn-md btn-block">login</button>
                                <span class="form-message" style="color:red;"><?=$error_message?></span>
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
<script src="./assets/js/validate-js/validator2_0.js"></script>
<script>
    new Validator('#form-login');
</script>