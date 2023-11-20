<?php

function top5Hotels()
{
    $sql = "select * from hotel where 1 order by views desc limit 0,9";
    $listHotels = pdo_query($sql);
    return $listHotels;
    
}
function commentHotel()
{
    $sql = "select * from hotel where 1 order by views desc limit 0,9";
    $listHotels = pdo_query($sql);
    return $listHotels;
}
// function loadall_hotels($keyw = "", $iddm = 0)
// {
//     $sql = "select * from sanpham where 1";
//     // where 1 tức là nó đúng
//     if ($keyw != "") {
//         $sql .= " and name like '%" . $keyw . "%'";
//     }
//     if ($iddm > 0) {
//         $sql .= " and hotel_id ='" . $iddm . "'";
//     }
//     $sql .= " order by id desc";
//     $listsanpham = pdo_query($sql);
//     return $listsanpham;
// }
?>