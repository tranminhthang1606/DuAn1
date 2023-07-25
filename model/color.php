<?php
function loadall_color()
{
    $sql = "SELECT * FROM `color` order by `ma_mau` desc";
    $sanpham = pdo_query($sql);
    return $sanpham;
}
function loadone_color($id)
{
    $sql = "SELECT * from `color` where `ma_mau`='$id'";
    $sanpham = pdo_query_one($sql);
    return $sanpham;
}
function loadall_color_bysp($arrayid)
{
    if (count($arrayid) > 0) {
        $arrayid = implode(",", $arrayid);
        $sql = "SELECT * from `color` where `ma_mau` in ($arrayid)";
        $sanpham = pdo_query($sql);
    } else {
        $sanpham = [];
    }
    return $sanpham;
}

?>