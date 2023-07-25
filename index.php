<?php
include "model/pdo.php";
include "model/config.php";
include "model/danhmuc.php";
include "model/taikhoan.php";
include "model/color.php";
include "model/size.php";
include "model/sanpham.php";
$danh_muc = loadall_danhmuc();
$colors = loadall_color();
$sizes = loadall_size();
$sp = loadall_sanpham();

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
            include "views/shop.php";
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
                    insert_taikhoan($name, $email, $password, $vai_tro, $address);
                    include "views/signin.php";
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
                if (isset($get_account)) {
                    $_SESSION['email'] = $get_account['email'];
                    $_SESSION['password'] = $get_account['matkhau'];
                    $_SESSION['name'] = $get_account['ten_kh'];
                    include "views/home.php";
                    return;
                }
                $thongbao = "Tài khoản không tồn tại !!";
            }
            include "views/signin.php";
            break;
        case "logout":

            session_destroy();
            include "views/signin.php";
            break;
        case "contact":
            include "views/contact.php";
            break;
        case "about":
            include "views/about.php";
            break;
        case "blog":
            include "views/blog.php";
            break;
        case "addtocart":

            $itemArray = array(
                $_POST['ma_sp'] =>
                array(
                    'name' => $_POST['ten_sp'],
                    'id' => $_POST['ma_sp'],
                    'quantity' => $_POST["quantity"],
                    'price' => $_POST['don_gia'],
                    'image' => $_POST['anh_sp']
                )
            );

            if (!empty($_SESSION["cart_item"])) {
                if (in_array($_POST['ma_sp'], array_keys($_SESSION["cart_item"]))) {
                    foreach ($_SESSION["cart_item"] as $k => $v) {
                        if ($_POST['ma_sp'] == $k) {
                            $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                        }
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                }
            } else {
                $_SESSION["cart_item"] = $itemArray;
            }


            include "views/cart.php";
            break;
        case "cart":
            include "views/cart.php";
            break;
        case "checkout":
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