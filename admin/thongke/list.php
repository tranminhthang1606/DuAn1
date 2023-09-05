
<div class="row">
    <div class="row formtitle">
        <h1>Thống kê hàng hóa</h1>
    </div>
    <div class="row formcontent">
        <div class="row mb10">

        </div>
        <div class="row mb10 formds">
            <table>
                <tr>
                    <th>Mã Loại</th>
                    <th>Tên Loại</th>
                    <th>Số Lượng</th>
                    <th>Doanh Thu</th>
                    <th>Đơn Vị</th>
                    
                </tr>
                <?php
                
                foreach ($list_thongke as $item) {
                    ?>
                    <tr>                 
                        <td><?php echo $item['masp'] ?></td>
                        <td><?php echo $item['tensp'] ?></td>
                        <td><?php echo $item['sl'] ?></td>
                        <td><?php echo $item['price'] ?></td>
                        <td>VNĐ</td>
                        
                    </tr>
                    <?php
                }
                
                ?>
            </table>
        </div>
        <div class="row mb10">
            <a href="index.php?act=chart"><input type="button" value="Biểu đồ"></a>
        </div>
    </div>
</div>
</div>