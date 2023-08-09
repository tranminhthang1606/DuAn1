<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="src/css/blog.css" />
    <link rel="stylesheet" href="src/css/product.css">
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
    <link rel="stylesheet" href="https://fontsfree.net/?s=Poppins">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Blog</title>
</head>

<body>
    <!-- Dựng base -->

    <div id="app">
        <?php include "views/header.php" ?>


        <div id="main">
            <div class="banner">
                <div class="text-banner">
                    <h1>Blog</h1>
                </div>
            </div>
            <div class="news-main">


                <div class="left-news-main">


                    <div class="content-left-news-main" data-aos="fade-down">

                        <div class="item-content-main">
                            <div class="image-item-content-main">
                                <img src="src/img/conten1-blog.webp" width="100%" alt="">
                            </div>

                            <div class="date-item-content-main">
                                <h3>22</h3>
                                <p>Jan 2018</p>
                            </div>

                        </div>
                        <div class="text-content-left-news-main" data-aos="fade-down">
                            <h3>The Great Big List of Men’s Gifts for the Holidays</h3>
                            <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                                himenaeos. Fusce eget dictum tortor. Donec dictum vitae sapien eu varius</p>
                            <div class="by-continue">
                                <p>By Admin</p>
                            </div>
                        </div>

                    </div>



                </div>

                <div class="right-news-main">
                    
                    <h3>Categories</h3>

                    <div class="list" data-aos="fade-down">
                        <ul>
                            <?php
                            foreach ($danh_muc as $item) {
                                ?>
                                <li><a href="#">
                                        <?php echo $item['ten_dm'] ?>
                                    </a></li>
                                <?php
                            }
                            ?>

                        </ul>
                    </div>

                    <div class="featured-Product" data-aos="fade-left">
                        <h3>Featured Products</h3>
                        <?php
                        foreach ($sp_top_3 as $item) {
                            ?>
                            <div class="item-featured-product show_product" onclick="showProduct()" data-id=<?php echo $item['ma_sp'] ?>>
                                <div class="img-item-featured-product">
                                    <img src="upload/<?php echo $item['anh_sp'] ?>" width="100%" alt="">
                                </div>
                                <div class="text-item-featured-product">
                                    <p>
                                        <?php echo $item['ten_sp'] ?>
                                    </p>
                                    <p>
                                        <?php echo $item['don_gia'] ?>
                                    </p>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                    </div>

                    <div class="Archive" data-aos="fade-left">
                        <h3>Archive</h3>
                        <div class="list-Archive">
                            <ul>
                                <li><a href="#">
                                        <p>July 2018</p>
                                        <p>(9)</p>
                                    </a></li>
                                
                            </ul>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <?php include "views/footer.php" ?>

        <div id="appp">
            <div class="grid">

            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        $(document)
            .on("click", '.show_product', function () {
                var productId = $(this).data('id')
                $.ajax({
                    url: "handle_product.php",
                    type: 'post',
                    data: {
                        productId: productId
                    },
                    success: function (result) {
                        $('.grid').html(result)
                    }
                })
            })
    </script>
    <script src="src/js/blog.js"></script>
</body>

</html>