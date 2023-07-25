<?php
if(isset($_GET['limit'])&&isset($_GET['start'])){
    $limit = $_GET['limit'];
    $start = $_GET['start'];
    require_once 'model/loadmore_conn.php';
    $sql = "SELECT * FROM `san_pham` order by `ma_sp` desc limit ".$start.",".$limit."";
    $result = $connect->query($sql);
    if($result->num_rows>0){
        $out = [];
        $out['status']=1;
        while ($rows=$result->fetch_array()) { 
            $out['data'][]= [
                'ma_sp' => $rows['ma_sp'],
                'ten_sp'=> $rows['ten_sp'],
                'don_gia'=> $rows['don_gia'],
                'giam_gia'=> $rows['giam_gia'],
                'mo_ta'=>$rows['mo_ta'],
                'anh_sp'=>$rows['anh_sp'],
                'ma_dm'=>$rows['ma_dm'],
                'ngay_nhap'=>$rows['ngay_nhap'],
                'slx'=>$rows['slx']
            ];
        }
    }else{
        $out['status']=0;
    }
    echo json_encode($out);
}
?>