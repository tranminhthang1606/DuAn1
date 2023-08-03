<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="src/css/product.css">
  <link rel="stylesheet" href="src/css/shop.css" />

  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <link rel="icon"
    href="https://scontent.fhan2-1.fna.fbcdn.net/v/t39.30808-6/295374195_781580993040406_229230968445196371_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=k_Xu60nDFkwAX8LIGg9&tn=eWdFGZdlTg1QYgfP&_nc_ht=scontent.fhan2-1.fna&oh=00_AT-uoE0xxAPsPu7H0wV1e6MFTCbtb0zrqnelN6fuvutywQ&oe=63303C90">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500;600;700;800&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- <link rel="stylesheet" href="https://fonts.adobe.com/fonts/poppins#details-section+poppins-thin"> -->
  <link rel="stylesheet" href="https://www.dafontfree.net/playfair-display-bold/f59120.html">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <title>Shop</title>
</head>

<body>
  <!-- Dựng base -->

  <div id="app">

    <?php include "views/header.php" ?>

    <div id="main">

      <div class="product">

        <div class="text-product">
          <div class="menu-filter-product">
            <div class="menu-product">
              <ul>
                <li><a href="">All Products</a></li>
                <?php
                foreach ($danh_muc as $item) {
                  ?>
                  <li><a href="index.php?act=shop&id=<?php echo $item['ma_dm'] ?>"><?php echo $item['ten_dm'] ?></a></li>
                  <?php
                }
                ?>
              </ul>
            </div>
            <div class="filter-product">
              <div class="filter">
                <i class='bx bx-filter'></i> <span>Filter</span>
              </div>
              <div class="select_box">

                <h4 class="select_box_color">Color
                  <div class="color_option">
                    <?php
                    foreach ($colors as $item) {
                      ?>
                      <h5>
                        <a href="index.php?act=shop&color=<?php echo $item['ma_mau'] ?>">
                          <?php echo $item['ten_mau'] ?>
                        </a>

                      </h5>
                      <?php
                    }
                    ?>
                  </div>

                </h4>

                <h4 class="select_box_size">Size
                  <div class="size_option">
                    <?php
                    foreach ($sizes as $item) {
                      ?>
                      <h5>
                        <a href="index.php?act=shop&size=<?php echo $item['ma_size'] ?>">
                          <?php echo $item['ten_size'] ?>
                        </a>
                      </h5>
                      <?php
                    }
                    ?>
                  </div>


                </h4>

              </div>
            </div>
          </div>
        </div>


        <div class="image-product">
        <?php
        foreach ($sp as $item) {
          ?>
          <div class="item-image-product" data-aos="fade-up">
            <div class="test">
              <img src="upload/<?php echo $item['anh_sp'] ?>" width="100%" alt="">
            </div>
            <p><a class="show_product" onclick="showProduct()" data-id=<?php echo $item['ma_sp'] ?>>Quick View</a></p>
            <div class="name-item-image-product">
              <div class="price-name-item-image-product">
                <p>
                  <?php echo $item['ten_sp'] ?>
                </p>
                <p>
                  <?php echo $item['don_gia'] ?> VNĐ
                </p>
              </div>
              <div class="heart-name-item-image-product">

                <i id="bxs" onclick="addHeart()" class='bx bxs-heart'></i>
              </div>

            </div>

          </div>
          <?php
        }
        ?>


        </div>


        
      </div>

    </div>


    <?php include "views/footer.php" ?>

    <div id="appp">
      <div class="grid">
      
      </div>
    </div>





  </div>



  <script src="src/js/shop.js"></script>
  <script src="src/js/product.js"></script>
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

</body>

</html>