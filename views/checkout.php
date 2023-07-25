<?php

require_once('vendor/autoload.php'); // Đường dẫn đến autoload.php từ thư viện Stripe PHP

\Stripe\Stripe::setApiKey('sk_test_51NTOVbJs5O3gpxcMR27Fa1S1z0usTENk3gzePGmlCOLBMe8YFLaZik4hma1B4H2RZvJ8rmFPeS9Crk33cZtTWFOr006Hsn2WSF');

// Xử lý thanh toán khi người dùng gửi form thanh toán
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['stripeToken'];
    $totalPrice = $_POST['totalPrice'];
    try {
        // Tạo một charge trên Stripe
        $charge = \Stripe\Charge::create([
            'amount' => $totalPrice *100,
            // Stripe sử dụng tiền tệ là cents
            'currency' => 'usd',
            // Thay 'usd' bằng mã tiền tệ tương ứng nếu bạn muốn thanh toán bằng loại tiền tệ khác
            'description' => 'Thanh toán hóa đơn',
            'source' => $token,
        ]);

        $sql = "INSERT INTO `payments` (`customer_name`,`amount`,`stripe_charge_id`) VALUES ('customer','$totalPrice','$token')";
        pdo_execute($sql);

        // Xử lý sau khi thanh toán thành công (ví dụ: lưu thông tin đơn hàng vào cơ sở dữ liệu)

        echo 'Thanh toán thành công!';
        header("location:index.php");

    } catch (\Stripe\Exception\CardException $e) {
        // Xử lý khi thẻ bị từ chối
        $error = $e->getError();
        echo 'Thanh toán thất bại: ' . $error['message'];
    } catch (\Stripe\Exception\RateLimitException $e) {
        // Xử lý khi gặp giới hạn tần suất
    } catch (\Stripe\Exception\InvalidRequestException $e) {
        // Xử lý khi yêu cầu không hợp lệ
    } catch (\Stripe\Exception\AuthenticationException $e) {
        // Xử lý khi xác thực thất bại
    } catch (\Stripe\Exception\ApiConnectionException $e) {
        // Xử lý khi có lỗi kết nối đến Stripe
    } catch (\Stripe\Exception\ApiErrorException $e) {
        // Xử lý lỗi chung từ Stripe
    }
}
?>