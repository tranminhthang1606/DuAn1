<?php
function loadall_taikhoan()
{
    $sql = "SELECT * FROM `khach_hang` order by `ma_kh` ";
    $khachhang = pdo_query($sql);
    return $khachhang;
}
function load_taikhoan_vaitro()
{
    $sql = "SELECT `vai_tro` FROM `khach_hang`";
    $vaitro = pdo_query($sql);
    return $vaitro;
}

function insert_taikhoan($ten_kh, $email, $matkhau, $vai_tro)
{
    $sql = "INSERT INTO `khach_hang` 
    (`ten_kh`, `email`, `matkhau`, `vai_tro`) 
    VALUES ('$ten_kh', '$email', '$matkhau', '$vai_tro')";
    pdo_execute($sql);
}

function loadone_taikhoan($email, $password)
{
    $sql = "SELECT * FROM `khach_hang`where `email`='$email'";
    if ($password != "") {
        $sql .= "and `matkhau`='$password'";
    }
    $sp = pdo_query_one($sql);
    return $sp;
}
function update_taikhoan($id, $ten_kh, $email, $matkhau, $vai_tro)
{
    $sql = "UPDATE `khach_hang` SET `ten_kh` = '$ten_kh', `matkhau` = '$matkhau', `email` = '$email', `vai_tro` = b'$vai_tro' WHERE `khach_hang`.`ma_kh` = '$id'";
    pdo_execute($sql);
}
function loadone_taikhoan_byID($id)
{
    $sql = "SELECT * FROM `khach_hang`where `ma_kh`='$id'";
    $kh = pdo_query_one($sql);
    return $kh;
}

function filter_taikhoan($vaitro, $keyword)
{
    $sql = "select * from `khach_hang` where 1";
    if ($keyword != "") {
        $sql .= " and `email` like '%$keyword%'";
    }
    if ($vaitro != "") {
        $sql .= " and `vai_tro` = $vaitro";
    }
    $sql .= " order by `ma_kh` desc";
    $kh = pdo_query($sql);
    return $kh;
}
function delete_taikhoan($id)
{
    $sql = "DELETE FROM `khach_hang` WHERE `khach_hang`.`ma_kh` = '$id'";
    pdo_execute($sql);
}
?>