<?php
function loadall_danhmuc()
{
    $sql = "SELECT * FROM `danh_muc` order by `ma_dm` ";
    $danhmuc = pdo_query($sql);
    return $danhmuc;
}
function insert_danhmuc($tendanh_muc)
{
    $sql = "INSERT INTO `danh_muc` (`ten_dm`) VALUES ('$tendanh_muc')";
    pdo_execute($sql);
}
function delete_danhmuc($id)
{
    $sql = "DELETE FROM danh_muc WHERE `danh_muc`.`ma_dm` = '$id'";
    pdo_execute($sql);
}

function update_danhmuc($id, $tendanh_muc)
{
    $sql = "UPDATE `danh_muc` SET `ten_dm` = '$tendanh_muc' WHERE `danh_muc`.`ma_dm` = '$id'";
    pdo_execute($sql);
}

function loadone_danhmuc($id){
    $sql = "SELECT * FROM `danh_muc`where `ma_dm`='$id'";
    $dm = pdo_query_one($sql);
    return $dm;
}
?>