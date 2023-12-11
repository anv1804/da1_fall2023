<?php
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else if (isset($_COOKIE['user'])) {
    $user = json_decode($_COOKIE['user'], true);
}
if (array_key_exists('button1', $_POST)) {
    mopup();
}
function mopup()
{
    echo "This is Button1 that is selected";
    $noti = '
                <div class="alert alert-success alert-1" role="alert"
                    style="visibility: visible; animation-name: fadeInLeft;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    HELLO <strong>ADMIN</strong>, WELCOME TO DASHBOARD!
                </div>
            ';
}
if (isset($user) && $user['user_role'] == 0) {
    $userEmail = $user['user_email'];
    $result = user($userEmail);
    if (isset($result)) {
        $userID = $result[0]['user_id'];
    }
    $dataBook = "";
    $book = dataBooking($userID);
    if (isset($book)) {
        foreach ($book as $value) {
            $imageRoom = explode(',', $book[0]['room_image']);
            $dataBook .= '
                <tr align="center"> 
                       
                       <td><span>' . $value['hotel_name'] . ' </span></td>
                       <td><span>' . $value['room_number'] . ' </span></td>
                    <td class="product-thumbnail">
                        <a href="index.php?page=rooms-details&roomID=' . $value['room_id'] . '">
                            <img style="width:60%;" src="./assets/images/rooms/' . $imageRoom[0] . '" alt="avatar">
                        </a>
                    </td>
                    <td class="product-name">
                        <span>Booking Date : ' . $value['date_booking'] . '</span><br>
                        <span>Start date : ' . $value['date_start'] . '</span><br>
                        <span>End date :  ' . $value['date_end'] . '</span><br>
                    </td>
                    <td>Booking</td>
                    <td class="hdn"><span>$' . $value['total_price'] . '</span></td>
                    <td></td>
                    <td class="product-remove">
                        <form method="post">
                            <button style="border:none;background:transparent" type="submit" name="button1"> <i class="fa fa-remove"></i></button>
                        </form>
                    </td>
                </tr>
            ';
        }
    }
}
?>
<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Booking</h1>
            <ul class="breadcrumbs">
                <li><a href="index.php">Home</a></li>
                <li class="active">Booking</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub banner end -->

<!-- Cart start -->
<div class="cart content-area-7">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                
                <table class="shop-table cart">
                    <thead>
                        <tr align="center">
                            <th class="product-price">Hotel</th>
                            <th class="product-price">Room Number</th>
                            <th class="product-name">Image</th>
                            <th class="product-description">Infomation</th>
                            <th class="product-price">Status</th>
                            <th class="product-subtotal">Total</th>
                            <th class="product-remove">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($dataBook)) {
                            echo $dataBook;
                        } ?>
                    </tbody>
                </table>
            </div>
            <!-- <div class="col-lg-4">
                <div class="cart-total-box ml-20">
                    <h5>Cart Totals</h5>
                    <hr>
                    <ul>
                        <li>
                            Subtotal<span class="pull-right">$170.00</span>
                        </li>
                        <li>
                            Charge<span class="pull-right">$34.00</span>
                        </li>
                        <li>
                            Local Delivery <span class="pull-right">$334</span>
                        </li>
                        <li>
                            Hotel Rate<span class="pull-right">$2140</span>
                        </li>
                    </ul>
                    <hr>
                    <p>
                        Grand Total<span class="pull-right">$22874</span>
                    </p>
                    <br>
                    <a href="#" class="btn btn-dark btn-block btn-md">Update Cart</a>
                    <a href="cart-2.html" class="btn btn-color btn-block btn-md">Checkout</a>
                </div>
            </div> -->
        </div>
    </div>
</div>
<!-- Cart end -->