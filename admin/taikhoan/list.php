<div class="row">
    <div class="row formtitle">
        <h1>DANH SÁCH TÀI KHOẢN</h1>
    </div>
    <div class="row formcontent">
        <div class="row mb10">

        </div>
        <div class="row mb10 formds">
            <form action="index.php?act=listkh" method="post">
                <input type="text" name="keyword">
                <select name="vaitrokh" id="">
                    <option value="">Tất cả</option>
                    <option value="1">Admin</option>
                    <option value="0">Khách hàng</option>
                </select>
                <br>
                <input type="submit" name="filter" value="Search">
            </form>
            <table>
                <tr>
                    <th></th>
                    <th>Mã tài khoản</th>
                    <th>Email</th>
                    <th>Tên tài khoản</th>
                    <th>Vai trò</th>
                </tr>
                <form action="index.php?act=delAllTk" method="post">
                    <?php
                    foreach ($taikhoan as $item) {
                        ?>
                        <tr>
                            <td>
                                <?php
                                if (isset($_SESSION['email']) && $_SESSION['email'] == $item['email']) {
                                    ?>
                                    X
                                    <?php
                                } else {
                                    ?>
                                    <input type="checkbox" name="delItem[]" value="<?php echo $item['ma_kh'] ?>">
                                    <?php
                                }
                                ?>

                            </td>
                            <td>
                                <?php echo $item['ma_kh'] ?>
                            </td>
                            <td>
                                <?php echo $item['email'] ?>
                            </td>
                            <td>
                                <?php echo $item['ten_kh'] ?>
                            </td>
                            <td>
                                <?php if ($item['vai_tro'] == 0) {
                                    ?>
                                    <p>Khách hàng</p>
                                    <?php

                                } else {
                                    ?>
                                    <p>Admin</p>
                                    <?php
                                } ?>
                            </td>
                            <td>
                                <?php
                                if (isset($_SESSION['email']) && $_SESSION['email'] == $item['email']) {
                                    ?>
                                    <h3> <i>Tài khoản hiện đăng nhập</i> </h3>
                                    <?php
                                } else {
                                    ?>
                                    <a href="index.php?act=suakh&id=<?php echo $item['ma_kh'] ?>"><input type="button" name=""
                                            value="SỬA"></a><a href="index.php?act=xoakh&id=<?php echo $item['ma_kh'] ?>">
                                        <input type="button" name="" value="XÓA"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa')"></a>
                                    <?php
                                }
                                ?>


                            </td>
                        </tr>
                        <?php
                    }
                    ?>

            </table>
            <div class="pagination">
                <?php
                if ($page != 1) {
                    ?>
                    <a href="index.php?act=listsp&page=<?php echo $page - 1 ?>">&laquo;</a>
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
                    } ?>" href="index.php?act=listsp&page=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a>
                    <?php
                }
                ?>
                <?php
                if ($page != $pages) {
                    ?>

                    <a href="index.php?act=listsp&page=<?php echo $page + 1 ?>">&raquo;</a>
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
            <a href="index.php?act=addtk"><input type="button" value="NHẬP THÊM"></a>
        </div>
        </form>
    </div>

</div>
</div>