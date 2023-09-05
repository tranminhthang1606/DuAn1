<div class="row">
    <div class="row formtitle">
        <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
    </div>
    <div class="row formcontent">
        <div class="row mb10">

        </div>
        <div class="row mb10 formds">
            <table>
                <tr>
                    <th></th>
                    <th>MÃ LOẠI</th>
                    <th>TÊN LOẠI</th>
                    <th></th>
                </tr>
                <form action="index.php?act=delAllDm" method="post">
                    <?php
                    foreach ($danhmuc as $item) {
                        if ($item['ma_dm'] != 0) {
                            ?>
                            <tr>
                                <td><input type="checkbox" name="delItem[]" value="<?php echo $item['ma_dm'] ?>"></td>
                                <td>
                                    <?php echo $item['ma_dm'] ?>
                                </td>
                                <td>
                                    <?php echo $item['ten_dm'] ?>
                                </td>
                                <td><a href="index.php?act=suadm&id=<?php echo $item['ma_dm'] ?>"><input type="button" name=""
                                            value="SỬA"></a><a href="index.php?act=xoadm&id=<?php echo $item['ma_dm'] ?>"><input
                                            type="button" name="" value="XÓA"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa')"></a></td>
                            </tr>
                            <?php
                        } # code...
                    }
                    ?>


            </table>
            <div class="pagination">
                <?php
                if ($page != 1) {
                    ?>
                    <a href="index.php?act=listdm&page=<?php echo $page - 1 ?>">&laquo;</a>
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
                    } ?>" href="index.php?act=listdm&page=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a>
                    <?php
                }
                ?>
                <?php
                if ($page != $pages) {
                    ?>

                    <a href="index.php?act=listdm&page=<?php echo $page + 1 ?>">&raquo;</a>
                    <?php
                }
                ?>

            </div>

        </div>
        <div class="row mb10">
            <input type="button" value="CHỌN TẤT CẢ" id="selectAll">
            <input type="button" value="BỎ CHỌN TẤT CẢ" id="unselectAll">
            <input type="submit" value="XÓA CÁC MỤC ĐÃ CHỌN" name="delAll" id="delAll"
                onclick="return confirm('Bạn có chắc chắn muốn xóa')">
            <a href="index.php?act=adddm"><input type="button" value="NHẬP THÊM"></a>
        </div>
        </form>
    </div>

</div>
</div>