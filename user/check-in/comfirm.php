<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P Travel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../assets/css/new-css/check-in.css">
</head>

<body>
    <div id="check-in">
        <header>
            <div class="container">
                <div class="header-inner">
                    <div class="img-logo">
                        <img src="../../assets/img/logos/black-logo.png" alt="logo">
                    </div>
                    <div class="nav-header-right">
                        <div class="dot-number">1</div>
                        <span>Book</span>
                        <div class="line"></div>
                        <div class="dot-number active">2</div>
                        <span>Confirm</span>
                        <div class="line"></div>
                        <div class="dot-number">3</div>
                        <span>Bill</span>
                    </div>
                </div>
            </div>
        </header>


        <?php
        session_start();
        ob_start();
        include '../../model/pdo.php';
        include '../../model/rooms.php';
        include '../../model/hotels.php';
        include '../../model/users.php';

        function convertDay($day) {
            $dateObject = date_create_from_format("d/m/Y", $day);

            // Kiểm tra xem có lỗi không
            if(!$dateObject) {
                return false;
            } else {
                // Định dạng lại theo yêu cầu
                return $dateObject->format("D, j M Y");
            }
        }

        function createBookId($long = 10) {
            $characters = '0123456789';
            $book_id = '';
        
            // Tạo mã đặt phòng ngẫu nhiên
            for ($i = 0; $i < $long; $i++) {
                $book_id .= $characters[rand(0, strlen($characters) - 1)];
            }
        
            // Kiểm tra tính duy nhất
            // Nếu mã đã tồn tại, gọi lại hàm
            if (checkBookId($book_id)) {
                return createBookId($long);
            }
        
            return $book_id;
        }

        function checkBookId($book_id) {
            $listBookId = allBookId();
            $listBookId = call_user_func_array('array_merge', $listBookId);
            if (isset($listBookId) && in_array($book_id, $listBookId)) {
                return true; 
            } else {
                $_SESSION['book']['book_id'] = $book_id;
                return false; 
            }
        }

        if (!isset($_SESSION['book']['book_id'])) {
            createBookId();
        }

        if(isset($_SESSION['book']) && ($_SESSION['book'])) {
            $book = $_SESSION['book'];

            $dateCheckInOut = [];

            $book['date_start'] = explode('|' , $book['date_start']);
            $book['date_end'] = explode('|' , $book['date_end']);

            $dateCheckInOut[] = convertDay($book['date_start'][0]);
            $dateCheckInOut[] = convertDay($book['date_end'][0]);

            $user = [];
            if(isset($_SESSION['user'])) {
                $user = $_SESSION['user'];
            } else {
                $user = json_decode($_COOKIE['user'], true);
            }

            $user = user($user['user_email']);
            $room = allRooms($book['room_id']);
            $hotel = allHotels('', '', $room[0]['hotel_id']);

            $imageRoom = explode(',', $room[0]['room_image']);

            $day1 = DateTime::createFromFormat("d/m/Y", $book['date_start'][0]);
            $day2 = DateTime::createFromFormat("d/m/Y", $book['date_end'][0]);

            $numberOfNight = $day1->diff($day2)->days;
            $totalPrice = (int)$numberOfNight * (int)$room[0]['room_price'] + 9;
            $convertTotalPrice = number_format(($totalPrice * 24000), 0, ',', '.');
            $convertTotalPriceOf20 = number_format((($totalPrice * 24000)/5), 0, ',', '.');
        }

        if(isset($_POST['next']) && ($_POST['next'])) {

            if ($_POST['type-price'] == 1) {
                $_SESSION['book']['book_price'] = $totalPrice*24000;
            }else {
                $_SESSION['book']['book_price'] = ($totalPrice * 24000)/5;
            }
            header('location: ./pay_now.php');
        }

        ?>



        <div class="body-check-in">

            <div class="title">Add card information</div>
            <div class="subTitle">Please make sure all information on this page is correct before proceeding to payment.
            </div>

            <div class="body-check-in-body">
                <div class="row">
                    <div class="col-8">

                        <div class="notification-body">
                            <ion-icon name="information-circle-outline"></ion-icon>
                            <div class="info-content">
                                <div class="info-detail">
                                    The methods below are only used to reserve rooms for you. You will not be charged
                                    unless you do not show up, cancel a room labeled "Cancellation policy applies", or
                                    cancel after the prescribed free cancellation period.
                                </div>
                            </div>
                        </div>

                        <form action="./comfirm.php" method="post" id="form-check-in">
                            <div class="title" style="margin-top:16px;">Payment methods</div>
                            <div class="type-price">
                                <label class="input-type-price" for="type-price">
                                    <label class="wapper">
                                        <input type="radio" checked="checked" name="type-price" id="type-price" value="1">
                                        <div class="checkmark"></div>
                                    </label>
                                    <div class="type-price-text">Full payment (100% price -> <?= $convertTotalPrice; ?> VND)</div>
                                </label>
                                <label class="input-type-price" for="type-price2">
                                    <label class="wapper">
                                        <input type="radio" name="type-price" id="type-price2" value="2">
                                        <div class="checkmark"></div>
                                    </label>
                                    <div class="type-price-text">Deposit payment  (20% of price -> <?= $convertTotalPriceOf20 ?> VND)</div>
                                </label>
                            </div>

                            <div class="title" style="margin-top:24px;margin-bottom:8px;">Payment with</div>
                            <div class="type-price">
                                <label class="input-type-price" for="type-price">
                                    <label class="wapper">
                                        <input type="radio" checked="checked">
                                        <div class="checkmark"></div>
                                    </label>
                                    <div class="type-price-text">MOMO</div>
                                    <img src="../../assets/img/brands/momo.png" alt="">
                                </label>
                            </div>

                            <div class="title">Price details</div>
                            <div class="notification-body">
                                <ion-icon name="information-circle-outline"></ion-icon>
                                <div class="info-content">
                                    <div class="info-detail">
                                        Each hotel may accept different payment methods.
                                    </div>
                                </div>
                            </div>
                            <div class="price-detail">
                                <a style="width:100%;text-decoration: none;color: rgb(3, 18, 26);" data-bs-toggle="collapse" href="#collapseExample"
                                role="button" aria-expanded="true" aria-controls="collapseExample" class="collapse-price">
                                    <div class="total-amount">
                                        <div class="title">Total amount</div>
                                        <div class="total">
                                            <ion-icon name="chevron-down-outline"></ion-icon>
                                            <div class="total-amount-number">$
                                                <?= $totalPrice ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <div class="notification">
                                    <ion-icon name="information-circle-outline"></ion-icon>
                                    <div class="info-content">
                                        <div class="info-detail">
                                            Please note that your children might be charged when check-in at the hotel.
                                            Please call the hotel before your check-in date for further information.
                                        </div>
                                    </div>
                                </div>

                                <div class="collapse show w-100" id="collapseExample">
                                    <div class="price-detail-body">
                                        <div class="price">
                                            <div class="price-title">
                                                (1x)
                                                <?= $room[0]['room_number']; ?> (
                                                <?= $numberOfNight ?> night)
                                            </div>
                                            <div class="price-number">$
                                                <?= $room[0]['room_price'] ?>
                                            </div>
                                        </div>
                                        <div class="price">
                                            <div class="price-title">
                                                Taxes and fees
                                            </div>
                                            <div class="price-number">$9</div>
                                        </div>
                                        <div class="price convert">
                                            <div class="price-title">
                                                Convert to Vietnamese Dong
                                            </div>
                                            <div class="price-number">$
                                                <?= $totalPrice ?> ->
                                                <?= $convertTotalPrice; ?> VND
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <button class="button" type="submit" name="next" value="pay"
                                style="vertical-align:middle"><span>Pay</span></button>
                        </form>
                    </div>
                    <div class="col-4">
                        <div class="info-room">
                            <div class="book-id">
                                <p>Reservation code:</p>
                                <span><?=$_SESSION['book']['book_id']?></span>
                            </div>
                            <div class="info-hotel">
                                <ion-icon name="business"></ion-icon>
                                <div class="hotel-name">
                                    <?= $hotel[0]['hotel_name']; ?>
                                </div>
                            </div>
                            <div class="check-in-out">
                                <div class="chek">
                                    <div class="title">Check in:</div>
                                    <div class="check-day">
                                        <?= $dateCheckInOut[0] ?> ,
                                        From <?=$book['date_start'][1] ?>
                                    </div>
                                </div>
                                <div class="chek">
                                    <div class="title">Check out:</div>
                                    <div class="check-day">
                                        <?= $dateCheckInOut[1] ?> ,
                                        Before <?=$book['date_end'][1] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="room-detail">
                                <div class="room-name">
                                    <p class="amount-room">(1x)</p> <?=$room[0]['room_number'];?>
                                </div>
                                <div class="room-des">
                                    <div class="type-room">
                                        <p>Guest/Room</p>
                                        <span>2 guests</span>
                                    </div>
                                    <div class="type-bed">
                                        <p>Type bed</p>
                                        <span>2 single beds</span>
                                    </div>
                                </div>
                                <div class="img-hotel">
                                    <div class="img">
                                        <img src="../../assets/images/rooms/<?= $imageRoom[0]; ?>">
                                    </div>

                                    <div class="room-sevices">
                                        <div class="sevice">
                                            <ion-icon name="restaurant-outline"></ion-icon>
                                            <p>Breakfast not included</p>
                                        </div>

                                        <div class="sevice active">
                                            <ion-icon name="wifi-outline"></ion-icon>
                                            <p>Free WiFi</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="sevices">
                                    <div class="sevice active">
                                        <ion-icon name="newspaper-outline"></ion-icon>
                                        <p>Free cancellation</p>
                                    </div>
                                    <div class="sevice active">
                                        <ion-icon name="calendar-outline"></ion-icon>
                                        <p>Can reschedule</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="info-room info-book">
                            <div class="info-book-title">Contact details (for E-Ticket / Confirmation Voucher)</div>
                            <div class="info-book-inner">
                                <div class="user-name"><?=$_SESSION['book']['book_name']?></div>
                                <div class="number-phone">+84<?=$_SESSION['book']['book_number']?></div>
                                <div class="book-email"><?=$_SESSION['book']['book_email']?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script>
    const elementTotalPrice = document.querySelector('#form-check-in .collapse-price');
    const btnArrowPrice = elementTotalPrice.querySelector('.total-amount .total ion-icon');
    
    elementTotalPrice.onclick = () => {
        if (elementTotalPrice.getAttribute('aria-expanded') == 'true') {
            btnArrowPrice.style.transform = 'rotate(180deg)';
        }else {
            btnArrowPrice.style.transform = 'rotate(0deg)';
        }
    }
    
</script>

</html>