<?php
function loadall_sanpham()
{
    $sql = "SELECT * FROM `san_pham` order by `ma_sp` desc";
    $sanpham = pdo_query($sql);
    return $sanpham;
}
function insert_sanpham($tenhh, $dongia, $giamgia, $mota, $hinh, $loai, $ngaynhap, $slx)
{
    $sql = "INSERT INTO `san_pham` 
    (`ten_sp`, `don_gia`, `giam_gia`, `mo_ta`, `anh_sp`, `ma_dm`, `ngay_nhap`, `slx`) 
    VALUES ('$tenhh', '$dongia', '$giamgia', '$mota', '$hinh', '$loai', '$ngaynhap', '$slx')";
    pdo_execute($sql);
}
function delete_sanpham($id)
{
    $sql = "DELETE FROM `san_pham` WHERE `san_pham`.`ma_sp` = '$id'";
    pdo_execute($sql);
}
function delete_sanpham_byDanhMuc($id)
{
    $sql = "DELETE FROM `san_pham` WHERE `san_pham`.`ma_loai` = '$id'";
    pdo_execute($sql);
}
function update_sanpham($id, $tenhh, $dongia, $giamgia, $mota, $hinh, $loai, $ngaynhap, $slx)
{
    $sql = "UPDATE `san_pham` SET `ten_sp` = '$tenhh', `don_gia` = '$dongia', `giam_gia` = '$giamgia', `anh_sp` = '$hinh', `ngay_nhap` = '$ngaynhap', `ma_dm` = '$loai', `slx` = '$slx', `mo_ta` = '$mota' WHERE `san_pham`.`ma_sp` = '$id'";
    pdo_execute($sql);
}

function loadone_sanpham($id)
{
    $sql = "SELECT * FROM `san_pham` where `ma_sp`='$id'";
    $sp = pdo_query_one($sql);
    return $sp;
}

function filter_sanpham($id, $keyword)
{
    $sql = "select * from `san_pham` join `danh_muc` where `san_pham`.`ma_dm`=`danh_muc`.`ma_dm`";
    if ($keyword != "") {
        $sql .= " and `san_pham`.`ten_sp` like '%$keyword%'";
    }
    if ($id != "all") {
        $sql .= " and `san_pham`.`ma_dm`='$id'";
    }
    $sql .= " order by `ma_sp` desc";
    $sanpham = pdo_query($sql);
    return $sanpham;
}

function loadall_sanpham_admin($start, $limit)
{
    $sql = "SELECT * FROM `san_pham` join `danh_muc` where `san_pham`.`ma_dm`=`danh_muc`.`ma_dm` order by `ma_sp` desc limit $start,$limit";
    $sanpham = pdo_query($sql);
    return $sanpham;
}
function filter_sanpham_pagination($id, $keyword, $start, $limit)
{
    $sql = "select * from `san_pham` join `danh_muc` where `san_pham`.`ma_dm`=`danh_muc`.`ma_dm`";
    if ($keyword != "") {
        $sql .= " and `ten_sp` like '%$keyword%'";
    }
    if ($id != "all") {
        $sql .= " and `san_pham`.`ma_dm`='$id'";
    }
    $sql .= " order by `ma_sp` desc limit $start,$limit";
    $sanpham = pdo_query($sql);
    return $sanpham;
}

function loadone_soluong_from_variants($ma_sp) {
    $sql = "Select sum(`so_luong`) as `tổng` from `sp_variants` where `ma_sp`='$ma_sp' group by `ma_sp` order by `ma_bien_the` desc";
    $sanpham = pdo_query_one($sql);
    return $sanpham;
};

function loadone_soluong_from_variants_bycolorsize($ma_sp,$color,$size) {
    $sql = "Select sum(`so_luong`) as `tổng` from `sp_variants` where `ma_sp`='$ma_sp' 
    and `ma_mau`='$color' 
    and `ma_size`='$size' 
    group by `ma_sp` order by `ma_bien_the` desc";
    $sanpham = pdo_query_one($sql);
    return $sanpham;
};
function loadall_sanpham_top3()
{
    $sql = "SELECT * FROM `san_pham` order by `slx` desc limit 0,3";
    $sanpham = pdo_query($sql);
    return $sanpham;
}

function loadall_sanpham_cungloai($ma_dm)
{
    $sql = "SELECT * FROM `san_pham`";
    if ($ma_dm > 0) {
        $sql .= " where `ma_dm`=$ma_dm";
    }
    $sp = pdo_query($sql);
    return $sp;
}
function loadsome_sanpham_cungloai($ma_dm)
{
    $sql = "SELECT * FROM `san_pham`";
    if ($ma_dm > 0) {
        $sql .= " where `ma_dm`=$ma_dm ORDER BY RAND() limit 4";
    }
    $sp = pdo_query($sql);
    return $sp;
}
function random_sanpham()
{
    $sql = "SELECT * FROM `san_pham` 
    ORDER BY RAND()
    LIMIT 3";
    $sp = pdo_query($sql);
    return $sp;
}
function loadone_sanpham_lastest()
{
    $sql = "SELECT * FROM `san_pham` order by `ma_sp` desc limit 0,1";
    $sanpham = pdo_query_one($sql);
    return $sanpham;
}
function loadall_sanpham_byColor($color)
{
    $get_variants = "SELECT * FROM `sp_variants` where `ma_mau`=$color";
    $match_items = pdo_query($get_variants);
    if (count($match_items) > 0) {
        $list_items = [];
        for ($i = 0; $i < count($match_items); $i++) {
            array_push($list_items, $match_items[$i]['ma_sp']);
        }
        $list_items = array_unique($list_items);
        $list_items = implode(",", $list_items);
        $sql = "Select * from `san_pham` where `ma_sp` in ($list_items)";
        $sp = pdo_query($sql);
    } else {
        $sp = [];
    }

    return $sp;
}
function loadall_sanpham_bySize($size)
{
    $get_variants = "SELECT * FROM `sp_variants` where `ma_mau`= $size";

    $match_items = pdo_query($get_variants);
    if (count($match_items) > 0) {
        $list_items = [];
        for ($i = 0; $i < count($match_items); $i++) {
            array_push($list_items, $match_items[$i]['ma_sp']);
        }
        $list_items = array_unique($list_items);
        $list_items = implode(",", $list_items);
        $sql = "Select * from `san_pham` where `ma_sp` in ($list_items)";
        $sp = pdo_query($sql);
    } else {
        $sp = [];
    }
    return $sp;
}

function update_dm_sp($iddm)
{
    $sql = "UPDATE `san_pham` SET `ma_dm` = 0 WHERE `san_pham`.`ma_dm` = '$iddm'";
    pdo_execute($sql);
}

function delete_all_sp(){
    $sql="DELETE from `san_pham`";
    pdo_execute($sql);
}
?>