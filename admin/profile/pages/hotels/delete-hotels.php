<?php
    if (isset($_GET['hotelID'])) {
        $hotelID = $_GET['hotelID'];
        deleteHotels($hotelID);
        header('location: admin.php?page=hotels');
    }
?>