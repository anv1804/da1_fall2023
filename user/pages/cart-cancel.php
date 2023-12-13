<?php 
    echo $_GET['book_id'];
    cancelBook($_GET['book_id']);
    header('location: ./index.php?page=cart');
?>