<?php

use function PHPSTORM_META\type;

include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/thongke.php";
include "../model/color.php";
include "../model/size.php";
include "../model/tt_sanpham.php";
include "../model/payments.php";


session_start();
include "header.php";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case "adddm":
            if (isset($_POST['themmoi'])) {
                if ($_POST['tenloai'] != "") {
                    $tenloai = $_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao = "Thêm thành công";
                } else {
                    $thongbao = "Bạn nhập sai định dạng";
                }
            }
            include "danhmuc/add.php";
            break;
        case "addsp":
            if (isset($_POST['themsp'])) {
                if ($_POST['tensp'] != "") {
                    $tensp = $_POST['tensp'];
                } else {
                    $tensp = "";
                    $thongbaoTensp = "Bạn nhập sai định dạng tên";
                }
                if ($_POST['dongia'] != "" && is_string((int) $_POST['dongia']) == false) {
                    $dongia = $_POST['dongia'];
                } else {
                    $dongia = "";
                    $thongbaoDongia = "Bạn phải nhập số vào giá sản phẩm";
                }
                if ($_POST['giamgia'] != "" && is_string((int) $_POST['giamgia']) == false) {
                    $giamgia = $_POST['giamgia'];
                } else {
                    $giamgia = "";
                    $thongbaogiamgia = "Bạn phải nhập số vào giá giảm";
                }
                $ngaynhap = $_POST['ngaynhap'];
                $loai = $_POST['loai'];
                $slx = $_POST['slx'];
                $mota = $_POST['mota'];
                include "sanpham/upload.php";
                global $file_name;
                if ($tensp != "" && $ngaynhap != "" && $loai != "" && is_string((int) $slx) == false && $checked == true) {
                    insert_sanpham($tensp, $dongia, $giamgia, $mota, $file_name, $loai, $ngaynhap, $slx);
                    $thongbao = "Thêm thành công";
                    $colors = loadall_color();
                    $sizes = loadall_size();
                    include "sanpham/add_tt.php";
                    return;
                } else {
                    $thongbao = "Hãy kiểm tra lại định dạng";
                }
            }
            include "sanpham/add.php";
            break;
        case "add_tt":
            $colors = loadall_color();
            $sizes = loadall_size();
            include "tt_sanpham/add.php";
            break;
        case "add_tt_sp":
            if (isset($_POST['them_tt_sp']) && $_POST['them_tt_sp']) {
                $ma_sp = $_POST['ma_sp'];
                $color = $_POST['color'];
                $size = $_POST['size'];
                $current_ma_size = [];
                $current_ma_color = [];
                $list_tt_sp = loadall_tt_sanpham_byidsp($ma_sp);
                for ($i = 0; $i < count($list_tt_sp); $i++) {
                    array_push($current_ma_size, $list_tt_sp[$i]['ma_size']);
                    array_push($current_ma_color, $list_tt_sp[$i]['ma_mau']);
                }
                $current_ma_size = array_unique($current_ma_size);
                $current_ma_color = array_unique($current_ma_color);
                if (!in_array($color, $current_ma_color) && !in_array($size, $current_ma_size)) {
                    insert_tt_sanpham($ma_sp, $color, $size);
                    $thongbao = "Thêm thành công";
                } else {
                    $thongbao = "Mã SP không tồn tại";
                }
            }
            include "sanpham/add_tt.php";
            break;

        case "listdm":
            $method = loadall_danhmuc();
            include "../model/pagination.php";
            $danhmuc = loadall_danhmuc_admin($page_first_result, $result_per_page);
            include "danhmuc/list.php";
            break;
        case "listsp":
            if (isset($_POST['filter']) && $_POST['filter']) {
                $id = $_POST['iddm'];
                $search = $_POST['keyword'];
            } else {
                $id = "all";
                $search = "";
            }
            $method = filter_sanpham($id, $search);
            include "../model/pagination.php";
            $sanpham = filter_sanpham_pagination($id, $search, $page_first_result, $result_per_page);
            include "sanpham/list.php";
            break;
        case "list_tt_sp":
            $sanpham = loadall_tt_sanpham();
            $list_tt_sp = loadall_tt_sanpham();
            $list_color = [];
            $list_size = [];
            for ($i = 0; $i < count($list_tt_sp); $i++) {
                array_push($list_color, $list_tt_sp[$i]['ma_mau']);
            }
            for ($i = 0; $i < count($list_tt_sp); $i++) {
                array_push($list_size, $list_tt_sp[$i]['ma_size']);
            }
            $list_color = array_unique($list_color);
            $list_size = array_unique($list_size);
            if (isset($_POST['filter']) && $_POST['filter']) {
                $kyw = $_POST['keyword'];
                $color = $_POST['filter_color'];
                $size = $_POST['filter_size'];
            } else {
                $kyw = "";
                $color = 0;
                $size = 0;
            }
            $method = filter_tt_sanpham($kyw, $color, $size);
            include "../model/pagination.php";
            $sanpham = filter_ttsp_pagination($kyw, $color, $size, $page_first_result, $result_per_page);
            include "tt_sanpham/list.php";
            break;
        case "xoadm":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                update_dm_sp($id);
                delete_danhmuc($id);
            }
            $danhmuc = loadall_danhmuc();
            header("location:index.php?act=listdm");
            break;
        case "xoasp":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delete_tt_sp_byIDSP($id);
                delete_sanpham($id);
            }
            header("location:index.php?act=listsp");
            break;
        case "xoa_tt_sp":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delete_tt_sp($id);
            }
            header("location:index.php?act=list_tt_sp");
            break;
        case "suadm":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $dm = loadone_danhmuc($id);
            }
            include "danhmuc/update.php";
            break;
        case "suasp":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sp = loadone_sanpham($id);
            }
            include "sanpham/update.php";
            break;
        case "sua_tt_sp":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            $colors = loadall_color();
            $sizes = loadall_size();
            $sp = loadone_tt_sanpham($id);
            include "tt_sanpham/update.php";
            break;
        case "updatesp";
            if (isset($_POST['capnhapsp']) && $_POST['capnhapsp']) {
                $id = $_POST['masp'];
                if ($_POST['tensp'] != "") {
                    $tensp = $_POST['tensp'];
                } else {
                    $tensp = "";
                    $thongbaoTensp = "Bạn nhập sai định dạng tên";
                }

                if ($_POST['dongia'] != "" && is_string((int) $_POST['dongia']) == false) {
                    $dongia = $_POST['dongia'];
                } else {
                    $dongia = "";
                    $thongbaoDongia = "Bạn phải nhập số vào giá sản phẩm";
                }

                if ($_POST['giamgia'] != "" && is_string((int) $_POST['giamgia']) == false) {
                    $giamgia = $_POST['giamgia'];
                } else {
                    $giamgia = "";
                    $thongbaogiamgia = "Bạn phải nhập số vào giá giảm";
                }
                $ngaynhap = $_POST['ngaynhap'];
                $loai = $_POST['loai'];
                $slx = $_POST['slx'];
                $mota = $_POST['mota'];
                include "sanpham/upload.php";
                global $file_name;
                if ($tensp != "" && $ngaynhap != "" && $loai != "" && is_string((int) $dongia) == false && is_string((int) $slx) == false && $checked == true) {
                    update_sanpham($id, $tensp, $dongia, $giamgia, $mota, $file_name, $loai, $ngaynhap, $slx);
                    $thongbao = "Cập nhập thành công";
                } else {
                    $thongbao = "Cập nhập thất bại";
                }
            }
            $sanpham = loadall_sanpham();
            header("location:index.php?act=listsp");
            break;
        case "updatedm":
            if (isset($_POST['capnhap']) && $_POST['capnhap']) {
                $id = $_POST['id'];
                $tenloai = $_POST['tenloai'];
                if ($tenloai != "") {
                    update_danhmuc($id, $tenloai);
                    $thongbao = "Cập nhập thành công";
                } else {
                    $thongbao = "Cập nhập thất bại";
                }
            }
            header("location:index.php?act=listdm");
            break;
        case "update_tt_sp":
            if (isset($_POST['update_tt_sp']) && $_POST['update_tt_sp']) {
                $mbt = $_POST['mbt'];
                $ma_sp = $_POST['ma_sp'];
                $color = $_POST['color'];
                $size = $_POST['size'];
                update_tt_sanpham($mbt, $ma_sp, $color, $size);
                $thongbao = "Thêm thành công";
            }
            header("location:index.php?act=list_tt_sp");
            break;
        case "suakh":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $taikhoan_edit = loadone_taikhoan_byID($id);
            }
            include "taikhoan/edit_tk.php";
            break;
        case "xoakh":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delete_taikhoan($id);
                session_destroy();
            }
            $taikhoan = loadall_taikhoan();
            header("location:index.php?act=listkh");
            break;
        case "update_tk":
            if (isset($_POST['update']) && $_POST['update']) {
                $id_kh = $_GET['id'];
                if (strlen($_POST['username']) > 6) {
                    $username = $_POST['username'];
                } else {
                    $username = "";
                    $thongbaoname = "Bạn nhập sai định dạng username";
                }

                if (strlen($_POST['password']) > 6) {
                    $password = $_POST['password'];
                } else {
                    $password = "";
                    $thongbaopassword = "Bạn nhập sai định dạng mật khẩu";
                }
                if (str_contains($_POST['email'], "@") || strlen($_POST['email']) > 10) {
                    $email = $_POST['email'];
                } else {
                    $email = "";
                    $thongbaoemail = "Bạn nhập sai định dạng email";
                }
                $vaitro = $_POST['vaitro'];
                if ($username != "" && $password != "" && $email != "") {
                    update_taikhoan($id_kh, $username, $email, $password, $vaitro);
                    $thongbao = "Cập nhập thành công";
                    $taikhoan_edit = loadone_taikhoan($email, $password);
                    $taikhoan = loadall_taikhoan();
                    header("location:index.php?act=listkh");
                } else {
                    $thongbao = "Cập nhập thất bại";
                    $taikhoan_edit = loadone_taikhoan_byID($id_kh);
                    include "taikhoan/edit_tk.php";
                }
            }

            break;
        case "listkh":
            if (isset($_POST['filter']) && $_POST['filter']) {
                $kyw = $_POST['keyword'];
                $vaitro = $_POST['vaitrokh'];
            } else {
                $kyw = "";
                $vaitro = "";
            }
            $method = filter_taikhoan($vaitro, $kyw);
            include "../model/pagination.php";
            $taikhoan = filter_taikhoan_pagination($vaitro, $kyw, $page_first_result, $result_per_page);
            include "taikhoan/list.php";
            break;
        case "addtk":
            if (isset($_POST['addtk']) && $_POST['addtk']) {
                if (strlen($_POST['username']) > 6) {
                    $username = $_POST['username'];
                } else {
                    $username = "";
                    $thongbaoname = "Bạn nhập sai định dạng username";
                }

                if (strlen($_POST['password']) > 6) {
                    $password = $_POST['password'];
                } else {
                    $password = "";
                    $thongbaopassword = "Bạn nhập sai định dạng mật khẩu";
                }
                if (str_contains($_POST['email'], "@") || strlen($_POST['email']) > 10) {
                    $email = $_POST['email'];
                } else {
                    $email = "";
                    $thongbaoemail = "Bạn nhập sai định dạng email";
                }
                $vaitro = $_POST['vaitro'];
                if ($username != "" && $password != "" && $email != "") {
                    insert_taikhoan($username, $email, $password, $vaitro);
                    $thongbao = "Thêm tài khoản thành công";
                } else {
                    $thongbao = "Cập nhập thất bại";
                }
            }
            include "taikhoan/add.php";
            break;
        case "thongke":
            $list_thongke = loadall_thongke();
            include "thongke/list.php";
            break;
        case "chart":
            $list_thongke = loadall_thongke();
            include "thongke/chart.php";
            break;
        case "delAllSp":
            if (isset($_POST['delAll']) && $_POST['delAll']) {
                $list_delItem = $_POST['delItem'];
                $N = count($list_delItem);
                for ($i = 0; $i < $N; $i++) {
                    delete_sanpham($list_delItem[$i]);
                }
            }
            header("location:index.php?act=listsp");
            break;
        case "delAllDm":
            if (isset($_POST['delAll']) && $_POST['delAll']) {
                $list_delItem = $_POST['delItem'];
                $N = count($list_delItem);
                for ($i = 0; $i < $N; $i++) {
                    delete_danhmuc($list_delItem[$i]);
                }
            }
            header("location:index.php?act=listdm");
            break;

        case "delAllTk":
            if (isset($_POST['delAll']) && $_POST['delAll']) {
                $list_delItem = $_POST['delItem'];
                $N = count($list_delItem);
                for ($i = 0; $i < $N; $i++) {
                    delete_taikhoan($list_delItem[$i]);
                }
            }

            header("location:index.php?act=listkh");
            break;
        case "payments":
            if (isset($_POST['filter']) && $_POST['filter']) {
                $ma_hd = $_POST['ma_hd'];
            } else {
                $ma_hd = "";
            }
            $method = loadall_bills($ma_hd);
            include "../model/pagination.php";
            $payments = filter_payments_pagination($ma_hd,$page_first_result, $result_per_page);
            include "payments/list.php";
            break;
        case "sua_trang_thai":
            $id = $_GET['id'];
            $bill = loadone_bill($id);
            include "payments/update.php";
            break;
        case "update_trang_thai":
            $id = $_POST['id'];
            $trangthai= $_POST['trangthai'];
            update_trang_thai($id,$trangthai);
            header("location:index.php?act=payments");
            break;


        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}

include "footer.php";


?>