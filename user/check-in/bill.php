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
                        <div class="dot-number success">1</div>
                        <span>Book</span>
                        <div class="line"></div>
                        <div class="dot-number success">2</div>
                        <span>Confirm</span>
                        <div class="line"></div>
                        <div class="dot-number active">3</div>
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

        function convertDay($day)
        {
            $dateObject = date_create_from_format("d/m/Y", $day);

            // Kiểm tra xem có lỗi không
            if (!$dateObject) {
                return false;
            } else {
                // Định dạng lại theo yêu cầu
                return $dateObject->format("D, j M Y");
            }
        }


        if (isset($_SESSION['book']) && ($_SESSION['book'])) {
            $book = $_SESSION['book'];

            $dateCheckInOut = [];

            $dateCheckInOut[] = convertDay($book['date_start']);
            $dateCheckInOut[] = convertDay($book['date_end']);

            $user = [];
            if (isset($_SESSION['user'])) {
                $user = $_SESSION['user'];
            } else {
                $user = json_decode($_COOKIE['user'], true);
            }

            $user = user($user['user_email']);
            $room = allRooms($book['room_id']);
            $hotel = allHotels('', '', $room[0]['hotel_id']);

            $imageRoom = explode(',', $room[0]['room_image']);
            $imageHotel = explode(',', $hotel[0]['hotel_image']);

            $day1 = DateTime::createFromFormat("d/m/Y", $book['date_start']);
            $day2 = DateTime::createFromFormat("d/m/Y", $book['date_end']);

            $numberOfNight = $day1->diff($day2)->days;
            $totalPrice = (int) $numberOfNight * (int) $room[0]['room_price'] + 9;
            $convertTotalPrice = number_format(($totalPrice * 24000), 0, ',', '.');
            $convertTotalPriceOf20 = number_format((($totalPrice * 24000) / 5), 0, ',', '.');
        }

        ?>



        <div class="body-check-in">

            <div class="title mb-5">Send payment slip</div>

            <div class="body-check-in-body">
                <div class="row">
                    <div class="col-8">

                        <div class="info-bill">
                            <div class="info-bill-header">
                                <div class="img-bill-header"><img
                                        src="../../assets/images/hotels/<?= $imageHotel[0]; ?>" alt="">
                                </div>

                                <div class="info-bill-text">
                                    <div class="info-hotel">
                                        <ion-icon name="business"></ion-icon>
                                        <div class="hotel-name">
                                            <?= $hotel[0]['hotel_name']; ?>
                                        </div>
                                    </div>

                                    <div class="info-book">
                                        <div class="check-day">
                                            Check in: 
                                            <p><?= $dateCheckInOut[0] ?></p>
                                            <span>From 14:00</span>
                                        </div>
                                        <div class="check-day">
                                            Check out: 
                                            <p><?= $dateCheckInOut[1] ?></p>
                                            <span>Before 12:00</span>
                                        </div>
                                        <div class="amount-night">
                                            Number of nights stay:
                                            <p><?= $numberOfNight ?> nights</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="info-bill-body">
                                <div class="room-name">
                                     <?=$room[0]['room_number'];?>
                                </div>
                                <div class="room-des-body">
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
                                    <div class="img-room">
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
                                </div>
                            </div>
                        </div>

                        <form action="./comfirm.php" method="post" id="form-check-in">

                            <div class="title">Price details</div>

                            <div class="price-detail">
                                <div class="total-amount">
                                    <div class="title">Total amount</div>
                                    <div class="total">
                                        <ion-icon name="chevron-down-outline"></ion-icon>
                                        <div class="total-amount-number">$
                                            <?= $totalPrice ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="notification">
                                    <ion-icon name="information-circle-outline"></ion-icon>
                                    <div class="info-content">
                                        <div class="info-detail">
                                            Please note that your children might be charged when check-in at the hotel.
                                            Please call the hotel before your check-in date for further information.
                                        </div>
                                    </div>
                                </div>

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

                        </form>
                    </div>
                    <div class="col-4">
                        <!-- <div class="info-room">
                            <div class="book-id">
                                <p>Reservation code:</p>
                                <span><?= $_SESSION['book']['book_id'] ?></span>
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
                                        <?= $dateCheckInOut[0] ?>
                                    </div>
                                </div>
                                <div class="chek">
                                    <div class="title">Check out:</div>
                                    <div class="check-day">
                                        <?= $dateCheckInOut[1] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="room-detail">
                                <div class="room-name">
                                    <p class="amount-room">(1x)</p> <?= $room[0]['room_number']; ?>
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
                        </div> -->
                        <div class="info-room info-book">
                            <div class="info-book-title">Contact details (for E-Ticket / Confirmation Voucher)</div>
                            <div class="info-book-inner">
                                <div class="user-name">
                                    <?= $_SESSION['book']['book_name'] ?>
                                </div>
                                <div class="number-phone">+84
                                    <?= $_SESSION['book']['book_number'] ?>
                                </div>
                                <div class="book-email">
                                    <?= $_SESSION['book']['book_email'] ?>
                                </div>
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

</script>

</html>