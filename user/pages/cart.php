<?php
$user = "";
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else if (isset($_COOKIE['user'])) {
    $user = json_decode($_COOKIE['user'], true);
}
$dataBook = "";
$modals = "";

if ($user && $user['user_role'] == 0) {
    $userEmail = $user['user_email'];
    $result = user($userEmail);
    $userID = $result[0]['user_id'];
    $book = dataBooking($userID , true);
    // print_r($book);
    if (isset($book)) {
        foreach ($book as $key => $value) {
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
                    <td>' . ($value['book_status'] == '0' ? 'Full payment' : 'Pay deposit') . '</td>
                    <td class="hdn"><span>$' . $value['total_price'] . '</span></td>
                    <td></td>
                    <td class="product-remove">
                        <div class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal' . ($key) . '">Cancel</div>
                    </td>
                </tr>
            ';

            $cancellation_date = DateTime::createFromFormat('d M Y\|H:i', $value['cancellation_date']);
            $modalCancell = '';
            $modalBody = '';

            if ($cancellation_date) {
                $currDate = new DateTime();

                $value['cancellation_date'] = explode('|', $value['cancellation_date']);

                if ($cancellation_date > $currDate) {
                    $modalCancell = '
                        <div style="color:green;font-size:16px";>' . $value['cancellation_date'][0] . ' , ' . $value['cancellation_date'][1] . '</div>
                    ';
                    $modalBody = 'Money will be refunded within the next 24 hours!';
                } elseif ($cancellation_date <= $currDate) {
                    $modalCancell = '
                        <div style="color:red;font-size:16px";>' . $value['cancellation_date'][0] . ' , ' . $value['cancellation_date'][1] . '</div>
                    ';
                    $modalBody = 'The free cancellation deadline has expired. If you continue, you will lose your deposit! The remaining amount will be refunded within the next 24 hours! (If any)';
                }
            } else {
                echo "Không thể chuyển đổi ngày giờ từ chuỗi.";
            }

            $modals .= '
            <div class="modal fade" id="exampleModal' . ($key) . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Warning notice</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ' . $modalCancell . '
                        ' . $modalBody . '
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="index.php?page=cart-cancel&book_id='.$value['book_id'].'" class="btn btn-danger" >Cancel</a>
                    </div>
                </div>
                </div>
            </div>
            ';
        }
    }
}
?>


<!-- Modal -->
<?php if (isset($modals)) {
    echo $modals;
} ?>

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
                    <hr>
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