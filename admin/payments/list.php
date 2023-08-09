<div class="row">
    <div class="row formtitle">
        <h1>Thống kê hàng hóa</h1>
    </div>
    <div class="row formcontent">
        <div class="row mb10">

        </div>
        <div class="row mb10 formds">
            <form action="index.php?act=payments" method="post">
                <input type="text" name="ma_hd">
                <br>
                <input type="submit" name="filter" value="Search">
            </form>
            <table>
                <tr>
                    <th>STT</th>
                    <th>MÃ HĐ</th>
                    <th>KHÁCH HÀNG</th>
                    <th>SĐT</th>
                    <th>THÀNH TIỀN</th>
                    <th>ĐỊA CHỈ</th>
                    <th>Trạng thái</th>
                </tr>
                <?php

                foreach ($payments as $item) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $item['payment_stt'] ?>
                        </td>
                        <td>
                            <?php echo $item['stripe_charge_id'] ?>
                        </td>
                        <td>
                            <?php echo $item['customer_name'] ?>
                        </td>
                        <td>
                            <?php echo $item['phone'] ?>
                        </td>
                        <td>
                            <?php echo $item['amount'] ?>
                        </td>
                        <td>
                            <?php echo $item['address'] ?>
                        </td>
                        <td>
                            <?php echo $item['trang_thai'] ?>
                            <br>
                           <a href="index.php?act=sua_trang_thai&id=<?php echo $item['stripe_charge_id'] ?>"><i class="fa-solid fa-wrench"></i></a>
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
                    <a href="index.php?act=payments&page=<?php echo $page - 1 ?>">&laquo;</a>
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
                    } ?>" href="index.php?act=payments&page=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a>
                    <?php
                }
                ?>
                <?php
                if ($page != $pages) {
                    ?>

                    <a href="index.php?act=payments&page=<?php echo $page + 1 ?>">&raquo;</a>
                    <?php
                }
                ?>

            </div>
        </div>

    </div>
</div>
</div>