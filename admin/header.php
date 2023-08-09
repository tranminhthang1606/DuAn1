<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Document</title>
</head>

<body>
    <div class="boxcontainer">
        <div class="row mb headeradmin">
            <h1>ADMIN <?php
            if(isset($_SESSION['name'])){
                echo $_SESSION['name'];
            }
            ?></h1> 
        </div>
        <div class="row mb menu">
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="index.php?act=listdm">Danh mục</a></li>
                <li><a href="index.php?act=listsp">Hàng hóa</a></li>
                <li><a href="index.php?act=list_tt_sp">Thông tin sản phẩm</a></li>
                <li><a href="index.php?act=listkh">Khách hàng</a></li>
                <li><a href="index.php?act=payments">Hóa Đơn</a></li>
                <li><a href="index.php?act=thongke">Thống kê</a></li>
            </ul>
        </div>