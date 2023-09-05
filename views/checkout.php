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
    $date = $_POST['date'];
    if (preg_match('/^[0-9]{10}+$/', $phone_num) && $address != "") {
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
                $ten_sp = $_SESSION['cart_item'][$k]['name'];
                $ma_sp = $_SESSION['cart_item'][$k]['id'];
                $ma_mau = $_SESSION['cart_item'][$k]['color'];
                $ma_size = $_SESSION['cart_item'][$k]['size'];
                $price = $_SESSION['cart_item'][$k]['price'];
                $so_luong = loadone_soluong_from_variants_bycolorsize($k, $ma_mau, $ma_size)['tổng'];
                $sl_des = $_SESSION['cart_item'][$k]['quantity'];
                $sl_current = $so_luong - $sl_des;
                $sql = "UPDATE `sp_variants` SET `so_luong` = '$sl_current' WHERE `sp_variants`.`ma_sp` = '$k' 
            and `sp_variants`.`ma_mau` = '$ma_mau' 
            and `sp_variants`.`ma_size`= '$ma_size'";
                pdo_execute($sql);
                $sql2 = "INSERT INTO `detail_bills` 
                        (`ten_sp`,`ma_sp`, `color`, `size`, `so_luong`, `price`, `ma_hd`) 
                        VALUES ('$ten_sp','$ma_sp', '$ma_mau', '$ma_size', '$sl_des','$price', '$token')";
            pdo_execute($sql2);
            }

            $sql = "INSERT INTO `payments` (`customer_name`,`phone`,`amount`,`stripe_charge_id`,`address`,`trang_thai`,`ngay_mua`) VALUES ('$name','$phone_num','$totalPrice','$token','$address','$trang_thai','$date')";
            
            pdo_execute($sql);

            // Xử lý sau khi thanh toán thành công (ví dụ: lưu thông tin đơn hàng vào cơ sở dữ liệu)

            echo "<script>alert('Thanh toán thành công!')</script>";
            unset($_SESSION['cart_item']);
            header("location:index.php?act=home");

        } catch (\Stripe\Exception\CardException $e) {
            // Xử lý khi thẻ bị từ chối
            $error = $e->getError();
            echo 'Thanh toán thất bại: ' . $error['message'];
        }
    } else {
        echo "<script>alert('Thiếu thông tin đặt hàng !')</script>";
        header("location:index.php?act=home");
    }
}
?>