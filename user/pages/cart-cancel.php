<?php 
    cancelBook($_GET['book_id']);
    cancelCompleted($_GET['completed_id']);
    header('location: ./index.php?page=cart');
?>