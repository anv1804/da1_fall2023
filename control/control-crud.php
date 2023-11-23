<?php
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'add-hotels':
            include('./admin/profile/pages/hotels/add-hotels.php');
            break;
    }
}
?>