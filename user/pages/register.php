<?php
$error_message = "";
if (isset($_POST["submit"]) && ($_POST["submit"])) {
    $fullname = $_POST['fullname'];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $user = loadall_user( "", $email);
    if (empty($user)) {
        $checkLogin = register($fullname, $email, $password);
        if ($checkLogin) {
            echo '<script type="text/javascript">window.location.href = "./index.php?page=home";</script>';
            exit;   
        }
    } else {
        $error_message = "User name or email already exists!";
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
                        <img src="./assets/img/logos/logo.png" class="cm-logo" alt="logo">
                    </a>
                    <!-- details -->
                    <div class="details">
                        <!-- Name -->
                        <h3>Create an account</h3>
                        <!-- Form start -->
                        <form action="index.php?page=register" method="POST" id="form-register">
                            <div class="form-group">
                                <input rules="required" type="text" name="fullname" class="form-control"
                                    placeholder="Full Name">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group">
                                <input rules="required|email" type="email" class="form-control" name="email"
                                    placeholder="Email Address">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group">
                                <input rules="required|password|min:8" type="Password" class="form-control password"
                                    name="password" placeholder="Password">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group">
                                <input rules="required|comfirm-password" type="password" name="confirm_Password"
                                    class="form-control" placeholder="Confirm Password">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" value="submit" name="submit"
                                    class="btn btn-color btn-md btn-block">Signup</button>
                                <span class="form-message" style="color:red;">
                                    <?= $error_message ?>
                                </span>
                            </div>
                        </form>
                        <!-- Form end -->
                    </div>
                    <!-- Sub Footer -->
                    <div class="sub-footer">
                        <span>Already a member? <a href="index.php?page=login">Login here</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bg img end -->
<script src="./assets/js/validate-js/validator2_0.js"></script>
<script>
    new Validator('#form-register');
</script>
