<?php
function loadall_thongke(){
    $sql="select `detail_bills`.`ten_sp` as `tensp`,`detail_bills`.`ma_sp` as `masp`,
    count(`detail_bills`.`ma_sp`) as `sl`,
    sum(`detail_bills`.`price`) as `price`
    ";
$sql.=" from `detail_bills`";
$sql.=" group by `detail_bills`.`ma_sp`";
$list_thongke = pdo_query($sql);
return $list_thongke;
}

?>