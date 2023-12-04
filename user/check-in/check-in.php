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
                        <div class="dot-number active">1</div>
                        <span>Book</span>
                        <div class="line"></div>
                        <div class="dot-number">2</div>
                        <span>Review</span>
                        <div class="line"></div>
                        <div class="dot-number">3</div>
                        <span>Pay</span>
                        <div class="line"></div>
                        <div class="dot-number">4</div>
                        <span>Send payment slip</span>
                    </div>
                </div>
            </div>
        </header>


        <?php 
            include '../../model/pdo.php';
            include '../../model/account.php';
            include '../../model/rooms.php';


            
            if (isset($_GET['room_id']) && ($_GET['room_id'])) {
                $room_id = $_GET['room_id'];
                $room = allRooms($room_id);
                // $user = '';
                // if (isset($_SESSION['user'])) {
                //     $user = $_SESSION['user'];
                // } else {
                //     $user = json_decode($_COOKIE['user'], true);
                // }
                
                // print_r($room);
                // $_SESSION['room'] = ['payment' => $room[0][]

            }
        ?>



        <div class="body-check-in">

            <div class="title">Book hotel room</div>
            <div class="subTitle">Please make sure all information on this page is correct before proceeding to payment.
            </div>

            <div class="body-check-in-body">
                <div class="row">
                    <div class="col-8">

                        <div class="user-info">
                            <div class="img"><img src="../../assets/img/avatar/avatar.png" alt=""></div>
                            <div class="info">
                                <div class="user-name">Login with name Le Do</div>
                                <div class="user-email">lemindo9124@gmail.com (Email)</div>
                            </div>
                        </div>

                        <div class="info-notification">
                            <div class="info-header">
                                <img src="../../assets/img/avatar/warning.png" alt="">
                                <div class="title">Infomation notification</div>
                            </div>
                            <div class="info-body">
                                <div class="notification">
                                    <ion-icon name="information-circle-outline"></ion-icon>
                                    <div class="info-content">
                                        <div class="info-title">Additional Policies</div>
                                        <div class="info-detail">
                                            Please note that your children might be charged when check-in at the hotel.
                                            Please
                                            call the hotel before your check-in date for further information.
                                        </div>
                                    </div>
                                </div>

                                <div class="notification">
                                    <ion-icon name="information-circle-outline"></ion-icon>
                                    <div class="info-content">
                                        <div class="info-title">General Check-In Instructions</div>
                                        <div class="info-detail">
                                            Please note that your children might be charged when check-in at the hotel.
                                            Please call the hotel before your check-in date for further information.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form action="./pay_now.php" method="post" id="form-check-in">
                            <div class="title">Contact detail</div>
                            <div class="contact-details">

                                <div class="form-group">
                                    <label for="user-name">Name</label>
                                    <input rules="required" type="text" name="user-name" id="user-name">
                                    <div class="form-message"></div>
                                </div>
                                <div class="form-number-email">
                                    <div class="form-group">
                                        <label for="number-phone">Number phone</label>
                                        <input rules="required" type="text" name="number-phone" id="number-phone">
                                        <div class="form-message"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input rules="required|email" type="email" name="email" id="email">
                                        <div class="form-message"></div>
                                    </div>
                                </div>

                            </div>

                            <div class="title">Price details</div>
                            <div class="price-detail">
                                <div class="total-amount">
                                    <div class="title">Total amount</div>
                                    <div class="total">
                                        <ion-icon name="chevron-down-outline"></ion-icon>
                                        <div class="total-amount-number">$1235</div>
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
                            
                            </div>

                            <button class="button" name="payUrl" value="pay" style="vertical-align:middle"><span>Pay</span></button>
                        </form>
                    </div>
                    <div class="col-4">
                        <div class="info-room">
                            <div class="info-hotel">
                                <ion-icon name="business-outline"></ion-icon>
                                <div class="hotel-name">Millennium Hanoi Hotel</div>
                            </div>
                            <div class="check-in-out">
                                <div class="chek">
                                    <div class="title">Check in</div>
                                    <div class="check-day">12/12/2004</div>
                                </div>
                                <div class="chek">
                                    <div class="title">Check out</div>
                                    <div class="check-day">14/12/2004</div>
                                </div>
                            </div>
                            <div class="room-detail">
                                <div class="room-name"><p class="amount-room">(1x)</p> Deluxe Twin Room</div>
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
                                    <img src="" alt="">
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
<script src="../../assets/js/validator2_0.js"></script>
<script>
    new Validator('#form-check-in');
</script>
</html>