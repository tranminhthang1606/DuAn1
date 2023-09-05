<?php
include "model/pdo.php";
include "model/sanpham.php";
include "model/tt_sanpham.php";
include "model/color.php";
include "model/size.php";
$idsp = $_POST['productId'];
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
if (isset(loadone_soluong_from_variants($idsp)['tổng'])) {
    $so_luong_current = loadone_soluong_from_variants($idsp)['tổng'];
} else {
    $so_luong_current = 0;
}


?>

<div class="grid-left">

</div>
<div class="grid-mid">


    <div class="img">
        <img id="img" src="upload/<?php echo $sp_pop['anh_sp'] ?>" width="100%" alt="">
    </div>
    <div class="icon-next-pre">
        <div class="next-pre">

        </div>

    </div>



</div>

<div class="grid-right">
    <p>
        <?php echo $sp_pop['ten_sp'] ?>
    </p>
    <h4>
        <?php echo $sp_pop['don_gia'] ?> VNĐ
    </h4>
    <p>
    </p>

    <div class="option-product">
        <form action="index.php?act=addtocart" method="post">
            <input type="hidden" name="ma_sp" value="<?php echo $sp_pop['ma_sp'] ?>">
            <input type="hidden" name="ten_sp" value="<?php echo $sp_pop['ten_sp'] ?>">
            <input type="hidden" name="don_gia" value="<?php echo $sp_pop['don_gia'] ?>">
            <input type="hidden" name="anh_sp" value="<?php echo $sp_pop['anh_sp'] ?>">
            <input type="hidden" name="quantity" value=1>
            <table>
                <tr>
                    <td>
                        Size
                    </td>
                    <td>
                        <select id="size" name="size">
                            <option value="">Choose an option</option>
                            <?php
                            foreach ($list_size as $item) {
                                ?>
                                <option value="<?php echo $item['ma_size'] ?>">Size <?php echo $item['ten_size'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Color</td>
                    <td>
                        <select id="color" name="color">
                            <option value="">Choose an option</option>
                            <?php
                            foreach ($list_mau as $item) {
                                ?>
                                <option value="<?php echo $item['ma_mau'] ?>"><?php echo $item['ten_mau'] ?></option>
                                <?php
                            }
                            ?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <?php
                        if ($so_luong_current == 0) {
                            ?>
                            <h3> <i>Hết hàng</i> </h3>
                            <?php
                        } else {
                            ?>
                            <input type="submit" name="add_sp_to_cart" value="ADD TO CART" id="a">
                            <?php
                        }
                        ?>

                    </td>


                </tr>
            </table>
        </form>
    </div>



    <div class="icon-product">
        <i class='bx bxs-heart'></i>
        <i class='bx bxl-facebook-circle'></i>
        <i class='bx bxl-twitter'></i>
        <i class='bx bxl-google-plus'></i>
    </div>
    <div class="close">
        <i onclick="showProduct()" class='bx bx-x-circle bx-tada'></i>
    </div>
</div>