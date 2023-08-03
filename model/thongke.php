<?php
function loadall_thongke(){
    $sql="select `danh_muc`.`ten_dm` as `tenloai`,`danh_muc`.`ma_dm` as `maloai`,
    count(`san_pham`.`ma_dm`) as `sl`,
    min(`san_pham`.`don_gia`) as `min`,
    max(`san_pham`.`don_gia`) as `max`,
    avg(`san_pham`.`don_gia`) as `trungbinh`";
$sql.=" from `san_pham` join `danh_muc` on `danh_muc`.`ma_dm`=`san_pham`.`ma_dm`";
$sql.=" group by `danh_muc`.`ma_dm` order by `danh_muc`.`ma_dm` desc";
$list_thongke = pdo_query($sql);
return $list_thongke;
}

?>