<?php
function loadall_bills($ma_hd)
{
    $sql = "SELECT * FROM `payments` where 1";
    if ($ma_hd!="") {
        $sql .= " and `stripe_charge_id` like '%$ma_hd%'";
    }
    $sql.=" order by `payment_stt` desc";
    $payments = pdo_query($sql);
    return $payments;
}
function filter_payments_pagination($ma_hd,$start, $limit){
    $sql = "SELECT * FROM `payments` where 1";
    if ($ma_hd!="") {
        $sql .= " and `stripe_charge_id` like '%$ma_hd%'";
    }
    $sql.=" order by `payment_stt` desc limit $start,$limit";
    $payments = pdo_query($sql);
    return $payments;
}
function loadone_bill($ma_hd){
    $sql = "SELECT * from `payments` where `stripe_charge_id`='$ma_hd'";
    $bill = pdo_query_one($sql);
    return $bill;
}
function update_trang_thai($id,$trang_thai){
    $sql="UPDATE `payments` SET `trang_thai` = '$trang_thai' WHERE `payments`.`stripe_charge_id` = '$id'";
    pdo_execute($sql);
}
?>