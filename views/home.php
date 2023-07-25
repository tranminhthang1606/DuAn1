<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="src/css/style.css" />
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
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <title>COZA STORE_MC</title>
</head>

<body>
  <!-- Dựng base -->

  <div id="app">

    <?php include "views/header.php" ?>

    <div class="slider">

      <div class="title-slider">
        <div class="text-animation">
          <h5>Men Collection 2018</h5>
          <h3>NEW ARRIVALS</h3>
          <a href="index.php?act=shop"><button>SHOP NOW</button></a>
        </div>
      </div>

    </div>

    <div class="background">
      <img src="src/img/slide1.webp" alt="">
    </div>

  </div>



  <div id="main">

    <div id="content">

      <div data-aos="fade-up" class="content-text-img">
        <div class="content-img">
          <img id="image1" src="src/img/ads1.jpg" alt="">
        </div>
        <div class="text-content">
          <div class="text-content-1">
            <h2>Women</h2>
            <p>Spring 2018</p>
          </div>
          <div class="content-text-2">
            <h3>Shop Now</h3>
            <span></span>
          </div>
        </div>
      </div>


      <div data-aos="fade-left" class="content-text-img">
        <div class="content-img">
          <img id="image1" src="src/img/ads2.jpg" alt="">
        </div>
        <div class="text-content">
          <div class="text-content-1">
            <h2>Men</h2>
            <p>Spring 2018</p>
          </div>
          <div class="content-text-2">
            <h3>Shop Now</h3>
            <span></span>
          </div>
        </div>
      </div>


      <div data-aos="fade-up" class="content-text-img">
        <div class="content-img">
          <img id="image1" src="src/img/ads3.jpg" alt="">
        </div>
        <div class="text-content">
          <div class="text-content-1">
            <h2>Accessories</h2>
            <p>New Trend</p>
          </div>
          <div class="content-text-2">
            <h3>Shop Now</h3>
            <span></span>
          </div>
        </div>
      </div>

    </div>
    <div class="product">
      <div class="text-product">
        <h3>Product Overview</h3>
        <div class="menu-filter-product">
          <div class="menu-product">
            <ul>
              <li><a href="index.php?act=home&id=0">All Products</a></li>
              <?php
              foreach ($danh_muc as $item) {
                ?>
                <li><a href="index.php?act=home&id=<?php echo $item['ma_dm'] ?>"><?php echo $item['ten_dm'] ?></a></li>
                <?php
              }
              ?>
            </ul>
          </div>
          <div class="filter-product">
          </div>
        </div>
      </div>

      <div class="image-product">



      </div>
      <div class="btn-product" id="loadmore">
        LOAD MORE
      </div>
    </div>

  </div>


  <?php include "views/footer.php" ?>
  <div id="appp">
    <div class="grid">

    </div>



  </div>
  <script src="src/js/main.js"></script>
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
  <script>
    $(document).ready(function () {
      let start = 0;
      const limit = 8;
      function loadmore(limit, start) {
        $.ajax({
          url: "fetch_data.php",
          type: 'get',
          data: {
            limit: limit,
            start: start
          },
          dataType: 'json',
          success: function (result) {
            console.log(result)
            const data = result.data;
            let html = ``;
            $.each(data, function (index, product) {
              html += `<div class="item-image-product" data-aos="fade-up">
            <div class="test">
              <img src="upload/${product['anh_sp']}" width="100%" alt="">
            </div>
            <p><a class="show_product" onclick="showProduct()" data-id=${product['ma_sp']}>Quick View</a></p>
            <div class="name-item-image-product">
              <div class="price-name-item-image-product">
                <p>
                  ${product['ten_sp']}
                </p>
                <p>
                  ${product['don_gia']}
                </p>
              </div>
              <div class="heart-name-item-image-product">

                <i id="bxs" onclick="addHeart()" class='bx bxs-heart'></i>
              </div>

            </div>

          </div>`
            })
            $('.image-product').append(html);
          }
        })
      }
      loadmore(limit, start);
      $('#loadmore').click(function () {
        start += limit;
        loadmore(limit, start)
      })
    })

  </script>


</body>

</html>