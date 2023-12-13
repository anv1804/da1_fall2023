<?php
    if (isset($_GET['roomID'])) {
        $roomID = $_GET['roomID'];
        deleteRooms($roomID);
        header('location: admin.php?page=rooms');
    }
?>