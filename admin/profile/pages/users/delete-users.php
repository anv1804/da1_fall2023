
<?php
if (isset($_GET['userID'])) {
    $userID = $_GET['userID'];
    deleteUsers($userID);
header('location: admin.php?page=users');
}
?>
