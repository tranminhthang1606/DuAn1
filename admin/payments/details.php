<html>
    <link rel="stylesheet" href="../../css/bill.css">
</html>
<header>
    <h1>Thông tin khách hàng</h1>
    <address >
        <p>Tên khách hàng :
            <?php echo $info['customer_name'] ?>
        </p>
        <p>Địa chỉ :
            <?php echo $info['address'] ?>
        </p>
        <p>Số điện thoại :
            <?php echo $info['phone'] ?>
        </p>
    </address>
</header>
<article>
    <h1>Hóa đơn chi tiết</h1>
    <address >
        <p>Địa chỉ :
            <?php echo $info['address'] ?>
        </p>
    </address>
    <table class="meta">
        <tr>
            <th><span >Số thứ tự hóa đơn : </span></th>
            <td>
                <?php echo $info['payment_stt'] ?>
            </td>
        </tr>
        <tr>
            <th><span >Date</span></th>
            <td><span ><?php echo $info['ngay_mua'] ?></span></td>
        </tr>
        <tr>
            <th><span >Thành tiền</span></th>
            <td><span id="prefix" ></span><span>
                    <?php echo $info['amount'] ?> VND
                </span></td>
        </tr>
    </table>
    <table class="inventory">
        <thead>
            <tr>
                <th><span >Sản phẩm</span></th>
                <th><span >Màu</span></th>
                <th><span >Size</span></th>
                <th><span >Số lượng</span></th>
                <th><span >Giá</span></th>
            </tr>
        </thead>
        <tbody>

            <?php
            foreach ($bill_details as $item) {
                ?>
                <tr>
                    <td><a class="cut"></a><span >
                            <?php echo $item['ten_sp'] ?>
                        </span></td>
                    <td><span >
                            <?php echo loadone_color($item['color'])['ten_mau'] ?>
                        </span></td>
                    <td><span data-prefix></span><span >
                            <?php echo loadone_size($item['size'])['ten_size'] ?>
                        </span></td>
                    <td><span >
                            <?php echo $item['so_luong'] ?>
                        </span></td>
                    <td><span data-prefix></span><span>
                            <?php echo $item['price'] ?>
                        </span></td>
                </tr>
                <?php
            }
            ?>


        </tbody>
    </table>
    <table class="balance">
        <tr>
            <th><span >Tổng</span></th>
            <td><span data-prefix><?php echo $info['amount'] ?></td>
        </tr>
        
    </table>
</article>
<aside>
    
</aside>