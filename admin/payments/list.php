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
                    <th>THÀNH TIỀN</th>
                    <th>ĐỊA CHỈ</th>
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
                            <?php echo $item['amount'] ?>
                        </td>
                        <td>
                            <?php echo $item['address'] ?>
                        </td>

                    </tr>
                    <?php
                }

                ?>
            </table>
        </div>

    </div>
</div>
</div>