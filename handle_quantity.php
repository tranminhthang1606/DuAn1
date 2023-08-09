<?php
include "model/pdo.php";
include "model/sanpham.php";
session_start();
$productId = $_POST["productId"];
$size = $_POST['size'];
$color = $_POST['color'];
$method = $_POST['method'];
$max = loadone_soluong_from_variants_bycolorsize($productId,$color,$size)['tổng'];
foreach ($_SESSION["cart_item"] as $k => $v) {
    if ($productId == $k && $_SESSION["cart_item"][$k]['size'] == $size && $_SESSION["cart_item"][$k]['color'] == $color) {
        if ($method == "plus" && $_SESSION["cart_item"][$k]["quantity"]<$max) {
            $_SESSION["cart_item"][$k]["quantity"] += 1;
        }else{
            $_SESSION["cart_item"][$k]["quantity"] = $max;
        }
        
        if ($method == "minus") {
            if ($_SESSION["cart_item"][$k]["quantity"] == 0) {
                $_SESSION["cart_item"][$k]["quantity"] = 0;
            }
            $_SESSION["cart_item"][$k]["quantity"] -= 1;
        }

    }
}
echo $_POST['size'];
?>