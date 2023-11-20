<?php
function allHotels()
{
<<<<<<< HEAD
    $sql = "SELECT * FROM hotels";
    $listHotels = pdo_query($sql);
    return $listHotels;
}
=======
    $sql = "SELECT * FROM hotels WHERE 1";
    $result = pdo_query($sql);
    return $result;
}

>>>>>>> d68d04204b8886ab2e7e8d58b890df66b2a8fa29
?>