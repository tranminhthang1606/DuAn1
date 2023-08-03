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
?>