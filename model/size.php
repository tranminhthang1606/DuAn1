<?php
function loadall_size()
{
    $sql = "SELECT * FROM `size` order by `ma_size` desc";
    $sanpham = pdo_query($sql);
    return $sanpham;
}
function loadone_size($id){
    $sql = "SELECT * from `size` where `ma_size`='$id'";
    $sanpham = pdo_query_one($sql);
    return $sanpham;
}

function loadall_size_bysp($arrayid)
{
    if (count($arrayid) > 0) {
        $arrayid = implode(",", $arrayid);
        $sql = "SELECT * from `size` where `ma_size` in ($arrayid)";
        $sanpham = pdo_query($sql);
    } else {
        $sanpham = [];
    }
    return $sanpham;
}
?>