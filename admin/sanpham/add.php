<div class="row">
    <div class="row formtitle">
        <h1>THÊM MỚI Sản phẩm</h1>
    </div>
    <div class="row formcontent">
        <form action="index.php?act=addsp" enctype="multipart/form-data" method="POST">
            <div class="row mb10">
                <label for="">Mã Sản Phẩm</label><br>
                <input type="text" name="masp" disabled><br>
            </div>
            <div class="row mb10">
                <label for="">Tên sản phẩm</label><br>
                <input type="text" name="tensp"><br>
                <?php if (isset($thongbaoTensp)) {
                ?>
                <h2>
                    <?php echo $thongbaoTensp ?>
                </h2>
                <?php
            }
            ?>
            </div>
            <div class="row mb10">
                <label for="">Đơn giá</label><br>
                <input type="text" name="dongia"><br>
                <?php if (isset($thongbaoDongia)) {
                ?>
                <h2>
                    <?php echo $thongbaoDongia ?>
                </h2>
                <?php
            }
            ?>
            </div>
            <div class="row mb10">
                <label for="">Giảm giá</label><br>
                <input type="text" name="giamgia"><br>
                <?php if (isset($thongbaogiamgia)) {
                ?>
                <h2>
                    <?php echo $thongbaogiamgia ?>
                </h2>
                <?php
            }
            ?>
            </div>
            <div class="row mb10">
                <label for="">Hình</label><br>
                <input type="file" name="hinh"><br>
            </div>
            <div class="row mb10">
                <label for="">Ngày nhập</label><br>
                <input type="date" name="ngaynhap" value="<?php echo date('Y-m-d');?>"><br>
            </div>
            <div class="row mb10">
                <label for="">Loại</label><br>
                <select name="loai" id="">
                    <?php
                    $loai = loadall_danhmuc();
                    print_r($loai);
                    foreach ($loai as $item) {
                        ?>
                        <option value="<?php echo $item['ma_dm'] ?>"><?php echo $item['ten_dm'] ?></option>
                        <?php
                    }
                    ?>
                </select><br>
            </div>
            <div class="row mb10">
                <label for="">Số lượt xem</label><br>
                <input type="text" name="slx"><br>
            </div>
            <div class="row mb10">
                <label for="">Mô tả</label><br>
                <input type="text" name="mota"><br>
            </div>
            <div class="row mb10">
                <input type="submit" name="themsp" value="THÊM MỚI">
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