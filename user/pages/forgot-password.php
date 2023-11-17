
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
                        <form action="index.php?page=forgot-password" method="GET" id="form-forgot-password">
                            <div class="form-group">
                                <input rules="required|email" type="email" class="form-control" name="email" placeholder="Email Address">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-color btn-md btn-block">Send Me Email</button>
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