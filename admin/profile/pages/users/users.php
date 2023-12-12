<?php
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else if (isset($_COOKIE['user'])) {
    $user = json_decode($_COOKIE['user'], true);
}
if (isset($user) && $user['user_role'] == 1) {
    $userEmail = $user['user_email'];
    $result = user($userEmail);
    $userID = $result[0]['user_id'];
    $loadUers = loadall_user('', '', false, $userID);
    $dataUsers = "";
    if (isset($loadUers)) {
        foreach ($loadUers as $value) {
            $dataUsers .= '
        <tr align="center"> 
            <td><span>' . $value['user_id'] . ' </span></td>
            <td><span>' . $value['user_name'] . ' </span></td>
            <td class="product-thumbnail">
                <a href="#">
                    <img style="width:50%;" src="./assets/img/avatar/' . $value['user_image'] . '" alt="avatar">
                </a>
            </td>
             <td class="product-name">
                 <span>' . $value['user_email'] . '</span><br>
             </td>
             <td class="hdn"><span>' . $value['user_number'] . '</span></td>
             <td class="hdn"><span>' . $value['user_role'] . '</span></td>
             <td class="product-remove">
                 <form method="post">
                 <a href="admin.php?page=delete-users&userID=' . $value['user_id'] . '"><span class="pull-right new"><i class="fa fa-remove"></i></span></a>
                 </form>
             </td>
         </tr>';
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
                        <h4>Users</h4>
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
                                <li class="active">Users</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-list" style="width: 100%;">
                <h3>User List</h3>
                <div class="dashboard-listd">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="shop-table cart">
                                <thead>
                                    <tr align="center">
                                        <th class="product-subtotal">User ID</th>
                                        <th class="product-price">User Name</th>
                                        <th class="product-name">Image</th>
                                        <th class="product-description">Email</th>
                                        <th class="product-price">Phone</th>
                                        <th class="product-price">Role</th>
                                        <th class="product-remove">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?= $dataUsers  ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pagination-box">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                    </ul>
                </nav>
            </div>
        </div>
        <p class="sub-banner-2 text-center">© 2022 Theme Vessel. Trademarks and brands are the property of their
            respective owners.</p>
    </div>
</div>
</div>
</div>
</div>
<script src="assets/js/new-js/user-admin.js"></script>

<!-- Dashboard end -->