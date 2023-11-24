<?php
    if (isset($_GET['roomID'])) {
        $roomID = $_GET['roomID'];
        deleteRooms($ID);
        header('location: admin.php?page=rooms');
    }
?>