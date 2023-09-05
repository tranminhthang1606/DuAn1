<?php
function loadall_tt_sanpham()
{
    $sql = "SELECT * FROM `sp_variants` order by `ma_bien_the` desc";
    $sanpham = pdo_query($sql);
    return $sanpham;
}
function loadall_ttsp_admin($start, $limit)
{
    $sql = "SELECT * FROM `sp_variants` order by `ma_bien_the` desc limit $start,$limit";
    $sanpham = pdo_query($sql);
    return $sanpham;
}
function loadone_tt_sanpham($id)
{
    $sql = "SELECT * FROM `sp_variants` where `ma_bien_the`='$id'";
    $sanpham = pdo_query_one($sql);
    return $sanpham;
}
function loadall_tt_sanpham_byidsp($id)
{
    $sql = "SELECT * FROM `sp_variants` where `ma_sp`='$id'";
    $sanpham = pdo_query($sql);
    return $sanpham;
}
function insert_tt_sanpham($ma_sp, $ma_mau, $ma_size,$so_luong)
{
    $sql = "INSERT INTO `sp_variants` 
    (`ma_sp`, `ma_mau`, `ma_size`,`so_luong`) 
    VALUES ('$ma_sp', '$ma_mau', '$ma_size','$so_luong')";
    pdo_execute($sql);
}
function update_tt_sanpham($mbt, $ma_sp, $ma_mau, $ma_size,$so_luong)
{
    $sql = "UPDATE `sp_variants` 
    SET `ma_sp` = '$ma_sp', `ma_mau` = '$ma_mau', `ma_size` = '$ma_size' ,`so_luong`='$so_luong'
    WHERE `sp_variants`.`ma_bien_the` = '$mbt'";
    pdo_execute($sql);
}
function filter_tt_sanpham($keyword, $color, $size)
{
    $sql = "select * from `sp_variants` where 1";
    if ($keyword != "") {
        $findkyw = pdo_query("Select * from `san_pham` 
        where `ten_sp` like '%$keyword%'");
        $list_match = [];
        for ($i = 0; $i < count($findkyw); $i++) {
            array_push($list_match, $findkyw[$i]['ma_sp']);
        }
        if ($list_match != []) {
            $list_match = implode(",", $list_match);
            $sql .= " and `ma_sp` in ($list_match)";
        } else {
            $sql .= " and `ma_sp` = 0";    
        }
        
    }
    if ($color > 0) {
        $sql .= " and `ma_mau`= '$color'";
    }
    if ($size > 0) {
        $sql .= " and `ma_size`='$size'";
    }
    $sql .= " order by `ma_bien_the` desc";
    $sanpham = pdo_query($sql);
    return $sanpham;
}
function filter_ttsp_pagination($keyword, $color, $size, $start, $limit)
{
    $sql = "select * from `sp_variants` where 1";
    if ($keyword != "") {
        $findkyw = pdo_query("Select * from `san_pham` 
        where `ten_sp` like '%$keyword%'");
        $list_match = [];
        for ($i = 0; $i < count($findkyw); $i++) {
            array_push($list_match, $findkyw[$i]['ma_sp']);
        }
        if ($list_match != []) {
            $list_match = implode(",", $list_match);
            $sql .= " and `ma_sp` in ($list_match)";
        } else {
            $sql .= " and `ma_sp` = 0";    
        }
    }
    if ($color > 0) {
        $sql .= " and `ma_mau`= '$color'";
    }
    if ($size > 0) {
        $sql .= " and `ma_size`='$size'";
    }
    $sql .= " order by `ma_bien_the` desc limit $start,$limit";
    $sanpham = pdo_query($sql);
    return $sanpham;
}
function delete_tt_sp($id)
{
    $sql = "DELETE FROM sp_variants WHERE `sp_variants`.`ma_bien_the` = '$id'";
    pdo_execute($sql);
}
function delete_tt_sp_byIDSP($id)
{
    $sql = "DELETE FROM sp_variants WHERE `sp_variants`.`ma_sp` = '$id'";
    pdo_execute($sql);
}
function delete_all_ttsp(){
    $sql="DELETE from `sp_variants`";
    pdo_execute($sql);
}
?>