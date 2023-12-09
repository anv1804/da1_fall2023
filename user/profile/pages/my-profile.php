<?php
if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $userEmail = $_SESSION["user"]['user_email'];
} else if(isset($_COOKIE['user'])) {
    $user = json_decode($_COOKIE['user'], true);
    // print_r($user);
    $userEmail = $user['user_email'];


}
if(isset($user) && $user['user_role'] == 0) {
    
    $dataUser = loadall_user('', $userEmail);
    $nameUser = "";
    $emailUser = "";
    $numberUser = "";
    $imageUser = "";
    $passUser = "";
    if($dataUser) {
        $nameUser = $dataUser[0]["user_name"];
        $emailUser = $dataUser[0]["user_email"];
        $numberUser = $dataUser[0]["user_number"];
        $imageUser = (string)$dataUser[0]["user_image"];
        $passUser = $dataUser[0]["user_password"];
    }
    if(isset($_POST["submit"])) {
        $currentpassword = $_POST["current-password"];
        $newPassword = $_POST['new-password'];
        $confirmPassword = $_POST['confirm-new-password'];
        if($currentpassword !== $passUser) {
            echo "sai";
        } else {
            if($newPassword !== $confirmPassword) {
                echo "mk không giống";
            } else {
                changePassword($newPassword, $emailUser);

            }
        }
    }
}

?>
<div class="col-lg-9 offset-lg-3 col-md-12 col-sm-12 col-pad">
    <div class="content-area5">
        <div class="dashboard-content">
            <div class="dashboard-header clearfix">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <h4>My Profile</h4>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="breadcrumb-nav">
                            <ul>
                                <li>
                                    <a href="index.php">Index</a>
                                </li>
                                <li>
                                    <a href="dashboard.php">Dashboard</a>
                                </li>
                                <li class="active">My Profile</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-list">
                <h3 class="heading">Profile </h3>
                <div class="dashboard-message contact-1 bdr clearfix">
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="my-photo">
                                <img src="./assets/img/avatar/<?= $imageUser ?>" alt="avatar" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <form action="#" method="GET" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group name">
                                            <label>Your Name</label>
                                            <input type="text" name="name" class="form-control" placeholder=""
                                                value="<?= $nameUser ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group email">
                                            <label>Your Title</label>
                                            <input type="text" name="title" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group subject">
                                            <label>Phone</label>
                                            <input type="text" name="phone" class="form-control" placeholder=""
                                                value="<?= $numberUser ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group number">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" placeholder=""
                                                value="<?= $emailUser ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group message">
                                            <label>Personal info</label>
                                            <textarea class="form-control" name="message"
                                                placeholder="Personal info"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="dashboard-list">
                        <h3 class="heading">Change Password</h3>
                        <div class="dashboard-message contact-2">
                            <form action="profile.php?page=profile" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group name">
                                            <label>Current Password</label>
                                            <input type="password" name="current-password" class="form-control"
                                                placeholder="Current Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group email">
                                            <label>New Password</label>
                                            <input type="password" name="new-password" class="form-control"
                                                placeholder="New Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group subject">
                                            <label>Confirm New Password</label>
                                            <input type="password" name="confirm-new-password" class="form-control"
                                                placeholder="Confirm New Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="send-btn">
                                            <button type="submit" name="submit" value="submit"
                                                class="btn btn-color btn-md btn-message">Change Password</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="dashboard-list">
                        <h3 class="heading">Socials</h3>
                        <div class="dashboard-message contact-2">
                            <form action="#" method="GET" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group name">
                                            <label>Facebook</label>
                                            <input type="text" name="facebook" class="form-control"
                                                placeholder="https://www.facebook.com/">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group email">
                                            <label>Twitter</label>
                                            <input type="text" name="twitter" class="form-control"
                                                placeholder="https://twitter.com/">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group subject">
                                            <label>Vkontakte</label>
                                            <input type="text" name="vkontakte" class="form-control"
                                                placeholder="vk.com">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group number">
                                            <label>Whatsapp</label>
                                            <input type="email" name="whatsapp" class="form-control"
                                                placeholder="https://www.whatsapp.com/">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="send-btn">
                                            <button type="submit" class="btn btn-color btn-md btn-message">Send
                                                Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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