<?php

require_once('vendor/autoload.php'); // Đường dẫn đến autoload.php từ thư viện Stripe PHP

\Stripe\Stripe::setApiKey('sk_test_51NTOVbJs5O3gpxcMR27Fa1S1z0usTENk3gzePGmlCOLBMe8YFLaZik4hma1B4H2RZvJ8rmFPeS9Crk33cZtTWFOr006Hsn2WSF');

// Xử lý thanh toán khi người dùng gửi form thanh toán
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['stripeToken'];
    $totalPrice = $_POST['totalPrice'];
    $address = $_POST['address'];
    $name = $_POST['name'];
    $phone_num = $_POST['phone_num'];
    $trang_thai = "Thành công";
    if(preg_match('/^[0-9]{10}+$/', $phone_num) && $address!=""){
    try {
        // Tạo một charge trên Stripe
        $charge = \Stripe\Charge::create([
            'amount' => $totalPrice * 100,
            // Stripe sử dụng tiền tệ là cents
            'currency' => 'usd',
            // Thay 'usd' bằng mã tiền tệ tương ứng nếu bạn muốn thanh toán bằng loại tiền tệ khác
            'description' => 'Thanh toán hóa đơn',
            'source' => $token,
        ]);
        foreach ($_SESSION['cart_item'] as $k => $v) {
            $ma_mau = $_SESSION['cart_item'][$k]['color'];
            $ma_size = $_SESSION['cart_item'][$k]['size'];
            $so_luong = loadone_soluong_from_variants_bycolorsize($k, $ma_mau, $ma_size)['tổng'];
            $sl_des = $_SESSION['cart_item'][$k]['quantity'];
            $sl_current = $so_luong - $sl_des;
            $sql = "UPDATE `sp_variants` SET `so_luong` = '$sl_current' WHERE `sp_variants`.`ma_sp` = '$k' 
            and `sp_variants`.`ma_mau` = '$ma_mau' 
            and `sp_variants`.`ma_size`= '$ma_size'";
            pdo_execute($sql);
        }

        $sql = "INSERT INTO `payments` (`customer_name`,`phone`,`amount`,`stripe_charge_id`,`address`,`trang_thai`) VALUES ('$name','$phone_num','$totalPrice','$token','$address','$trang_thai')";
        pdo_execute($sql);

        // Xử lý sau khi thanh toán thành công (ví dụ: lưu thông tin đơn hàng vào cơ sở dữ liệu)

        echo "<script>alert('Thanh toán thành công!')</script>";
        unset($_SESSION['cart_item']);
        include "views/home.php";

    } catch (\Stripe\Exception\CardException $e) {
        // Xử lý khi thẻ bị từ chối
        $error = $e->getError();
        echo 'Thanh toán thất bại: ' . $error['message'];
    }}else{
        echo "<script>alert('Thiếu thông tin đặt hàng !')</script>";
        include "views/home.php";
    }
}
?>