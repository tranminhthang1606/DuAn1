<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="max-age=604800" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="src/css/style.css" />
    <link rel="stylesheet" href="src/css/product_detail.css" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon"
        href="https://scontent.fhan14-1.fna.fbcdn.net/v/t39.30808-6/291746184_769150660950106_9022025498033681382_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=tR1lQVhHFa8AX9uy8Xi&tn=D7p54ZetywhaBBwA&_nc_ht=scontent.fhan14-1.fna&oh=00_AT_hze_CJRwfkb1_EgSvXI8UXvhbmKbSP84cbclCGPfYaw&oe=62DC17E8" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://fonts.adobe.com/fonts/poppins#details-section+poppins-thin"> -->
    <link rel="stylesheet" href="https://www.dafontfree.net/playfair-display-bold/f59120.html">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>COZA STORE_MC</title>

    <title>GreatKart | One of the Biggest Online Shopping Platform</title>

    <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">

    <!-- jQuery -->
    <script src="src/js/jquery-2.0.0.min.js" type="text/javascript"></script>

    <!-- Bootstrap4 files-->
    <script src="src/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />

    <!-- Font awesome 5 -->
    <link href="fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- custom javascript -->
    <script src="src/js/script.js" type="text/javascript"></script>

    <script type="text/javascript">
        /// some script
        $(document).ready(function () {
            // jQuery code

        });
//
// jquery end
    </script>

</head>

<body>
    <div id="app">
        <?php include "views/header.php" ?>
    </div>
    <section class="section-content padding-y bg">
        <div class="container">

            <!-- ============================ COMPONENT 1 ================================= -->
            <div class="card">
                <div class="row no-gutters">
                    <aside class="col-md-6">
                        <article class="gallery-wrap">
                            <div class="img-big-wrap">
                                <img src="upload/<?php echo $sp_pop['anh_sp'] ?>">
                            </div> <!-- img-big-wrap.// -->

                        </article> <!-- gallery-wrap .end// -->
                    </aside>
                    <main class="col-md-6 border-left">
                        <article class="content-body">
                            <form action="index.php?act=addtocart" method="post">
                                <input type="hidden" name="quantity" value=1>
                                <input type="hidden" name="ten_sp" value=<?php echo $sp_pop['ten_sp'] ?>>
                                <input type="hidden" name="don_gia" value=<?php echo $sp_pop['don_gia'] ?>>
                                <input type="hidden" name="anh_sp" value=<?php echo $sp_pop['anh_sp'] ?>>
                                <input type="hidden" name="ma_sp" value=<?php echo $sp_pop['ma_sp'] ?>>
                                <h2 class="title">
                                    <?php echo $sp_pop['ten_sp'] ?>
                                </h2>

                                <div class="mb-3">
                                    <var class="price h4">
                                        <?php echo $sp_pop['don_gia'] ?>
                                    </var>
                                </div>

                                <p>
                                    <?php echo $sp_pop['mo_ta'] ?>
                                </p>


                                <hr>
                                <?php
                                if (empty($list_size) || empty($list_mau) || $so_luong_current==0) {
                                    ?>
                                    <h3> <i>Hết hàng</i> </h3>
                                    <?php
                                } else {
                                    ?>
                                    <div class="row">
                                        <div class="item-option-select">
                                            <h6>Chọn Màu</h6>
                                            <div class="btn-group btn-group-sm btn-group-toggle" data-toggle="buttons">
                                                <?php
                                                foreach ($list_mau as $item) {
                                                    ?>
                                                    <label class="btn btn-light">
                                                        <input type="radio" name="color" value="<?php echo $item['ma_mau'] ?>">
                                                        <?php echo $item['ten_mau'] ?>
                                                    </label>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div> <!-- row.// -->
                                    <div class="row">
                                        <div class="item-option-select">
                                            <h6>Chọn Size</h6>
                                            <div class="btn-group btn-group-sm btn-group-toggle" data-toggle="buttons">
                                                <?php
                                                foreach ($list_size as $item) {
                                                    ?>
                                                    <label class="btn btn-light">
                                                        <input type="radio" name="size" value="<?php echo $item['ma_size'] ?>">
                                                        <?php echo $item['ten_size'] ?>
                                                    </label>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div> <!-- row.// -->
                                    <hr>
                                    <button type="submit" name="addtocart" class="btn  btn-primary"> <span class="text">Thêm
                                            vào giỏ hàng</span> <i class="fas fa-shopping-cart"></i> </button>
                                    <?php
                                }

                                ?>


                            </form>
                        </article> <!-- product-info-aside .// -->
                    </main> <!-- col.// -->
                </div> <!-- row.// -->
            </div> <!-- card.// -->
            <!-- ============================ COMPONENT 1 END .// ================================= -->

            <br>
            <div class="pic-1">
                <div class="item_pic">
                    <?php
                    foreach ($sp_cungloai as $item) {
                        ?>
                        <div class="pic">
                            <img src="upload/<?php echo $item['anh_sp'] ?>">
                            <a href="index.php?act=detail&id=<?php echo $item['ma_sp'] ?>">
                                <p>
                                    <?php echo $item['ten_sp'] ?>
                                </p>
                            </a>
                        </div>
                        <?php
                    }

                    ?>
                </div>
            </div>

        </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->
    <?php
    include "views/footer.php"
        ?>

    <script src="src/js/main.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>
</body>

</html>