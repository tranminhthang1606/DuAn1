<?php
require 'vendor/autoload.php'; // Đường dẫn đến tập tin autoload.php của Stripe SDK

$stripeSecretKey = 'sk_test_51NTOVbJs5O3gpxcMR27Fa1S1z0usTENk3gzePGmlCOLBMe8YFLaZik4hma1B4H2RZvJ8rmFPeS9Crk33cZtTWFOr006Hsn2WSF';
\Stripe\Stripe::setApiKey($stripeSecretKey);

$amount = 1000; // Số tiền cần thanh toán (đơn vị là cent hoặc đơn vị tiền tệ của bạn)
$cardNumber = '4242424242424242'; // Số thẻ ngân hàng kiểm tra (giả định là số thẻ hợp lệ của Stripe)
$cardExpMonth = 12; // Tháng hết hạn của thẻ
$cardExpYear = 2025; // Năm hết hạn của thẻ
$cardCVC = '123'; // Mã CVC/CVV trên thẻ

?>