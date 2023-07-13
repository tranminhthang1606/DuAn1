<div class="row">
    <div class="row formtitle">
        <h1>Thêm Thông tin Sản phẩm</h1>
    </div>
    <div class="row formcontent">
        <form action="index.php?act=add_tt_sp" enctype="multipart/form-data" method="POST">
            <div class="row mb10">
                <label for="">Mã Sản Phẩm</label><br>
                <input type="text" name="ma_sp" ><br>
            </div>
            <div class="row mb10">
                <label for="">Màu</label><br>
                <select name="color" id="">
                    <option value="">--Chọn Màu--</option>
                    <?php
                    foreach ($colors as $item) {
                        ?>
                        <option value="<?php echo $item['ma_mau'] ?>"><?php echo $item['ten_mau'] ?></option>
                        <?php
                    }
                    ?>
                </select>
                <br>
            </div>
            <div class="row mb10">
                <label for="">Size</label><br>
                <select name="size" id="">
                <option value="">--Chọn Size--</option>
                    <?php
                    foreach ($sizes as $item) {
                        ?>
                        <option value="<?php echo $item['ma_size'] ?>"><?php echo $item['ten_size'] ?></option>
                        <?php
                    }
                    ?>
                </select>
                <br>
            </div>
            <div class="row mb10">
                <input type="submit" name="them_tt_sp" value="THÊM MỚI">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
            </div>
            <?php if (isset($thongbao)) {
                ?>
                <h2>
               <?php echo $thongbao?>
                </h2>
                <?php
            }
            ?>
        </form>
    </div>
</div>
</div>