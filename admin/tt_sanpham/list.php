
<div class="row">
    <div class="row formtitle">
        <h1>DANH SÁCH SẢN PHẨM</h1>
    </div>
    <div class="row formcontent">
        <div class="row mb10">

        </div>
        <div class="row mb10 formds">
            <form action="index.php?act=list_tt_sp" method="post">
                <input type="text" name="keyword">
                <select name="filter_color" id="">
                    <option value="0">Tất cả</option>
                    <?php
                    foreach ($list_color as $item) {
                        
                        ?>
                        <option value="<?php echo $item?>"><?php echo loadone_color($item)['ten_mau'] ?></option>
                        <?php
                    }
                    ?>
                </select>
                <select name="filter_size" id="">
                    <option value="0">Tất cả</option>
                    <?php
                    foreach ($list_size as $item) {
                        
                        ?>
                        <option value="<?php echo $item?>"><?php echo loadone_size($item)['ten_size'] ?></option>
                        <?php
                    }
                    ?>
                </select><br>
                
                
                <input type="submit" name="filter" value="Search">
            </form>
            <table>
                <tr>
                    <th></th>
                    <th>MÃ Biến thể</th>
                    <th>Tên Sp</th>
                    <th>Màu</th>
                    <th>Size</th>
                    <th>Số lượng</th>
                </tr>
                <form action="index.php?act=delAllSp" method="post">
                <?php
                foreach ($sanpham as $item) {
                    ?>
                    <tr>
                        <td><input type="checkbox" name="delItem[]" value="<?php echo $item['ma_bien_the'] ?>"></td>
                        <td>
                            <?php echo $item['ma_bien_the'] ?>
                        </td>
                        <td>
                            <?php echo loadone_sanpham($item['ma_sp'])['ten_sp'] ?>
                        </td>
                        <td>
                        <?php echo loadone_color($item['ma_mau'])['ten_mau'] ?>
                        </td>
                        <td>
                        <?php echo loadone_size($item['ma_size'])['ten_size'] ?>
                        </td>
                        <td>
                        <?php echo $item['so_luong'] ?>
                        </td>
                        <td><a href="index.php?act=sua_tt_sp&id=<?php echo $item['ma_bien_the'] ?>"><input type="button" name=""
                            value="SỬA"></a><a href="index.php?act=xoa_tt_sp&id=<?php echo $item['ma_bien_the'] ?>"><input
                            type="button" name="" value="XÓA" onclick="return confirm('Bạn có chắc chắn muốn xóa')"></a></td>
                    </tr>
                    <?php
                }
                ?>

            </table>
            <div class="pagination">
                <?php
                if ($page != 1) {
                    ?>
                    <a href="index.php?act=list_tt_sp&page=<?php echo $page - 1 ?>">&laquo;</a>
                    <?php
                }
                ?>

                <?php
                for ($i = 0; $i < $pages; $i++) {
                    ?>
                    <a class="<?php if ($page == ($i + 1)) {
                        echo "active";
                    } else {
                        echo "";
                    } ?>" href="index.php?act=list_tt_sp&page=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a>
                    <?php
                }
                ?>
                <?php
                if ($page != $pages) {
                    ?>

                    <a href="index.php?act=list_tt_sp&page=<?php echo $page + 1 ?>">&raquo;</a>
                    <?php
                }
                ?>

            </div>
        </div>
        <div class="row mb10">
            <input type="button" value="CHỌN TẤT CẢ" id="selectAll">
            <input type="button" value="BỎ CHỌN TẤT CẢ" id="unselectAll">
            <input type="submit" value="XÓA CÁC MỤC ĐÃ CHỌN" name="delAll" id="delAll" onclick="return confirm('Bạn có chắc chắn muốn xóa')">
            <a href="index.php?act=add_tt"><input type="button" value="NHẬP THÊM"></a>
        </div>
        </form>
    </div>

</div>
</div>