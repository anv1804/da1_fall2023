
<?php
if (isset($_GET['cmtID'])) {
    $cmtID = $_GET['cmtID'];
    deleteCmts($cmtID);
header('location: admin.php?page=comments');
}
?>
