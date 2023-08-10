<?php
include "model/pdo.php";
include "model/danhmuc.php";
include "model/taikhoan.php";
include "model/color.php";
include "model/size.php";
include "model/sanpham.php";
include "model/tt_sanpham.php";
$danh_muc = loadall_danhmuc_home(1, 10);
$colors = loadall_color();
$sizes = loadall_size();
$sp = loadall_sanpham();
$dm_rand_3 = random_danhmuc();
session_start();
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'home':
            if (isset($_GET['id'])) {
                $iddm = $_GET['id'];
                $sp = loadall_sanpham_cungloai($iddm);
                include "views/home.php";
                return;
            }
            if (isset($_GET['size'])) {
                $size = $_GET['size'];
                $sp = loadall_sanpham_bySize($size);
                include "views/home.php";
                return;
            }
            if (isset($_GET['color'])) {
                $color = $_GET['color'];
                $sp = loadall_sanpham_byColor($color);
                include "views/home.php";
                return;
            }
            if (isset($_GET['idsp'])) {
                $idsp = $_GET['idsp'];
                $sp_pop = loadone_sanpham($idsp);
            }

            include "views/home.php";
            break;
        case 'shop':
            if (isset($_GET['id'])) {
                $iddm = $_GET['id'];
                $sp = loadall_sanpham_cungloai($iddm);
                include "views/shop.php";
                return;
            }
            if (isset($_GET['color'])) {
                $color = $_GET['color'];
                $sp = loadall_sanpham_byColor($color);
                include "views/shop.php";
                return;
            }
            if (isset($_GET['size'])) {
                $size = $_GET['size'];
                $sp = loadall_sanpham_bySize($size);
                include "views/shop.php";
                return;
            }
            if (isset($_POST['keyword'])) {
                $kyw = $_POST['keyword'];
                $sp = filter_sanpham("all", $kyw);
                include "views/shop.php";
                return;
            }
            include "views/shop.php";
            break;
        case "detail":
            $idsp = $_GET['id'];
            $sp_pop = loadone_sanpham($idsp);
            $sp_variants = loadall_tt_sanpham_byidsp($idsp);

            $current_ma_size = [];
            $current_ma_color = [];
            for ($i = 0; $i < count($sp_variants); $i++) {
                array_push($current_ma_size, $sp_variants[$i]['ma_size']);
                array_push($current_ma_color, $sp_variants[$i]['ma_mau']);
            }
            $current_ma_size = array_unique($current_ma_size);
            $current_ma_color = array_unique($current_ma_color);
            $list_mau = loadall_color_bysp($current_ma_color);
            $list_size = loadall_size_bysp($current_ma_size);
            $sp_cungloai = loadsome_sanpham_cungloai($sp_pop['ma_dm']);
            if(isset(loadone_soluong_from_variants($idsp)['tổng'])){
                $so_luong_current=loadone_soluong_from_variants($idsp)['tổng'];
            }else{
                $so_luong_current=0;
            }
            
            include "views/product_detail.php";
            break;
        case 'sign_in':
            include 'views/signin.php';
            break;
        case 'sign_up':
            include "views/signup.php";
            break;
        case "create_account":
            if (isset($_POST['sign_up']) && $_POST['sign_up']) {
                if (strlen($_POST['email']) > 10 && str_contains($_POST['email'], "@")) {
                    $email = $_POST['email'];

                } else {
                    $email = "";
                    $thongbao_email = "Sai định dạng email";
                }

                if (strlen($_POST['name']) > 6) {
                    $name = $_POST['name'];
                } else {
                    $name = "";
                    $thongbao_name = "Sai định dạng";
                }

                if (strlen($_POST['password']) > 6 && preg_match('/[A-Z]/', $_POST['password'])) {
                    $password = $_POST['password'];
                } else {
                    $password = "";
                    $thongbao_matkhau = "Sai định dạng mật khẩu";
                }
                $address = $_POST['address'];
                $vai_tro = $_POST['vai_tro'];
                $match_tk = loadone_taikhoan($email, "");
                if (!empty($match_tk)) {
                    $thongbao_email = "Email đã được sử dụng";
                }
                if (
                    $email != "" &&
                    $name != "" &&
                    $password != "" &&
                    empty($match_tk)
                ) {
                    insert_taikhoan($name, $email, $password, $vai_tro);
                    include "views/signin.php";
                    echo "<script type='text/javascript'>
                    alert('Bạn đã đăng ký thành công !!');
                    </script>";
                    return;
                }
            }
            include "views/signup.php";
            break;
        case "login":
            if (isset($_POST['sign_in']) && $_POST['sign_in']) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $get_account = loadone_taikhoan($email, $password);
                if (!empty($get_account)) {
                    $_SESSION['email'] = $get_account['email'];
                    $_SESSION['password'] = $get_account['matkhau'];
                    $_SESSION['name'] = $get_account['ten_kh'];
                    $_SESSION['vaitro'] = $get_account['vai_tro'];
                    include "views/home.php";
                    echo "<script type='text/javascript'>
                    alert('Bạn đã đăng nhập thành công !!');
                    </script>";
                    return;
                }
                $thongbao = "Tài khoản không tồn tại !!";
            }
            include "views/signin.php";
            break;
        case "logout":
            session_destroy();
            header("location:index.php?act=home");
            break;
        case "contact":
            include "views/contact.php";
            break;
        case "about":
            include "views/about.php";
            break;
        case "blog":
            $sp_top_3 = loadall_sanpham_top3();
            include "views/blog.php";
            break;
        case "addtocart":
            if (!empty($_POST['size']) && !empty($_POST['color'])) {
                $itemArray = array(
                    $_POST['ma_sp'] =>
                    array(
                        'name' => $_POST['ten_sp'],
                        'id' => $_POST['ma_sp'],
                        'quantity' => $_POST["quantity"],
                        'price' => $_POST['don_gia'],
                        'image' => $_POST['anh_sp'],
                        'size' => $_POST['size'],
                        'color' => $_POST['color']
                    )
                );

                if (!empty($_SESSION["cart_item"])) {
                    if (in_array($_POST['ma_sp'], array_keys($_SESSION["cart_item"]))) {
                        foreach ($_SESSION["cart_item"] as $k => $v) {
                            if ($_POST['ma_sp'] == $k && $_SESSION["cart_item"][$k]['size'] == $_POST['size'] && $_SESSION["cart_item"][$k]['color'] == $_POST['color']) {
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            } else {
                                $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                            }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            include "views/cart.php";
            break;
        case "cart":
            include "views/cart.php";
            break;
        case "delCartItem":
            $id = $_GET['id'];
            $color = $_GET['color'];
            $size = $_GET['size'];
            if (!empty($_SESSION['cart_item'])) {
                foreach ($_SESSION['cart_item'] as $k => $v) {
                    if ($id == $_SESSION['cart_item'][$k]['id'] && $color == $_SESSION['cart_item'][$k]['color'] && $size == $_SESSION['cart_item'][$k]['size']) {
                        unset($_SESSION["cart_item"][$k]);
                    }
                    if (empty($_SESSION["cart_item"])) {
                        unset($_SESSION["cart_item"]);
                    }
                    ;
                }
            }
            include "views/cart.php";
            break;
        case "checkout":

            if (isset($_POST['cash']) && $_POST['cash']) {
                if ($_POST['address'] != "" && preg_match('/^[0-9]{10}+$/', $_POST['phone_num'] && $_POST['name'] != "")) {
                    $token = "cash_" . date("Y-m-d h:i:sa");
                    $totalPrice = $_POST['checkout_bill'];
                    $address = $_POST['address'];
                    $name = $_POST['name'];
                    $phone_num = $_POST['phone_num'];
                    $trang_thai = "Chưa thanh toán";
                    foreach ($_SESSION['cart_item'] as $k => $v) {
                        $ma_mau = $_SESSION['cart_item'][$k]['color'];
                        $ma_size = $_SESSION['cart_item'][$k]['size'];
                        $so_luong = loadone_soluong_from_variants_bycolorsize($k, $ma_mau, $ma_size)['tổng'];
                        $sl_des = $_SESSION['cart_item'][$k]['quantity'];
                        $sl_current = $so_luong - $sl_des;
                        $sql = "UPDATE `sp_variants` SET `sp_variants`.`so_luong` = $sl_current WHERE `sp_variants`.`ma_sp` = $k 
                    and `sp_variants`.`ma_mau` = $ma_mau 
                    and `sp_variants`.`ma_size`= $ma_size";
                        pdo_execute($sql);
                    }
                    $sql = "INSERT INTO `payments` (`customer_name`,`phone`,`amount`,`stripe_charge_id`,`address`,`trang_thai`) VALUES ('$name','$phone_num','$totalPrice','$token','$address','$trang_thai')";
                    pdo_execute($sql);
                    echo "<script type='text/javascript'>
                alert('Bạn đã thanh toán thành công');
                </script>";
                    unset($_SESSION['cart_item']);
                    include "views/home.php";
                    return;
                } else {
                    echo "<script type='text/javascript'>
                alert('Thông tin đặt hàng không hợp lệ');
                </script>";
                    include "views/cart.php";
                    return;
                }

            }
            include "views/checkout.php";
            break;
        default:
            include "views/home.php";
            break;
    }
} else {
    include "views/home.php";
}

?>