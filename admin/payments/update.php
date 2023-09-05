<div class="row">
    <div class="row formtitle">
        <h1>Cập nhập trạng thái đơn hàng</h1>
    </div>
    <div class="row formcontent">
        <form action="index.php?act=update_trang_thai" method="POST">
            <div class="row mb10">
                <label for="">Trạng thái</label><br>
                <input type="hidden" name="id" value="<?php echo $bill['stripe_charge_id'] ?>">
                <select name="trangthai" value="<?php echo $bill['trang_thai'] ?>">
                    <option value="Chưa thanh toán">Chưa Thanh Toán</option>
                    <option value="Đang Xử lý">Đang Xử lý</option>
                    <option value="Đã thanh toán">Đã Thanh Toán</option>
                </select><br>
            </div>
            <div class="row mb10">
                <input type="submit" name="capnhap" value="Cập nhập trạng thái">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=payments"><input type="button" value="Danh sách hóa đơn"></a>
            </div>
            <?php if (isset($thongbao)) {
                ?>
                <h2>
                    <?php echo $thongbao ?>
                </h2>
                <?php
            }
            ?>
        </form>
    </div>
</div>
</div>