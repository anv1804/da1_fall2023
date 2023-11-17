<?php
$error_message = "";
$message_true = '';
$message_false = '';

if (isset($_POST["submit"]) && ($_POST["submit"])) {
    $email = $_POST["email"];

    $message = forgotPassword($email);
    if ($message) {
        $message_true = "Email sent successfully!";
    }else {
        $message_false = "Email does not exist!";
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
                        
                        <h3>Recover your password</h3>
                        <!-- Form start -->
                        <form action="index.php?page=forgot-password" method="post" id="form-forgot-password">
                            <div class="form-group">
                                <input rules="required|email" type="email" class="form-control" name="email" placeholder="Email Address">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" name="submit" value="submit" class="btn btn-color btn-md btn-block">Send Me Email</button>
                                <span class="form-message <?=$message_true != '' ? 'text-success' : 'text-danger';?>"><?=$message_true;?><?=$message_false;?></span>
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
    new Validator('#form-forgot-password');
</script>