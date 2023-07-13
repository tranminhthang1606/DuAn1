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
              <li><a href="">All Products</a></li>
              <li><a href="">Women</a></li>
              <li><a href="">Men</a></li>
              <li><a href="">Bag</a></li>
              <li><a href="">Shoes</a> </li>
              <li><a href="">Watches</a></li>
            </ul>
          </div>
          <div class="filter-product">
            <div class="filter">
              <i class='bx bx-filter'></i> <span>Filter</span>
            </div>
            <div class="search-filter-product">
              <i class='bx bx-search-alt-2'></i><span>Search</span>
            </div>
          </div>
        </div>
      </div>

      <div class="image-product">

        <div class="item-image-product" data-aos="fade-up">
          <div class="test">
            <img src="src/img/product-1.webp" width="100%" alt="">
          </div>
          <p><a onclick="showProduct()">Quick View</a></p>
          <div class="name-item-image-product">
            <div class="price-name-item-image-product">
              <p>Esprit Ruffle Shirt</p>
              <p>$16.64</p>
            </div>
            <div class="heart-name-item-image-product">

              <i id="bxs" onclick="addHeart()" class='bx bxs-heart'></i>
            </div>

          </div>

        </div>


        <div class="item-image-product" data-aos="fade-down">
          <div class="test"><img src="src/img/product-2.webp" width="100%" alt=""></div>
          <p><a onclick="showProduct()">Quick View</a></p>
          <div class="name-item-image-product">
            <div class="price-name-item-image-product">
              <p>Esprit Ruffle Shirt</p>
              <p>$16.64</p>
            </div>
            <div class="heart-name-item-image-product">

              <i id="bxs" onclick="addHeart()" class='bx bxs-heart'></i>
            </div>

          </div>

        </div>

        <div class="item-image-product" data-aos="fade-right">
          <div class="test"><img src="src/img/product-3.webp" width="100%" alt=""></div>
          <p><a onclick="showProduct()">Quick View</a></p>
          <div class="name-item-image-product">
            <div class="price-name-item-image-product">
              <p>Esprit Ruffle Shirt</p>
              <p>$16.64</p>
            </div>
            <div class="heart-name-item-image-product">

              <i id="bxs" onclick="addHeart()" class='bx bxs-heart'></i>
            </div>

          </div>

        </div>


        <div class="item-image-product" data-aos="fade-left">
          <div class="test"><img src="src/img/product-4.webp" width="100%" alt=""></div>
          <p><a onclick="showProduct()">Quick View</a></p>
          <div class="name-item-image-product">
            <div class="price-name-item-image-product">
              <p>Esprit Ruffle Shirt</p>
              <p>$16.64</p>
            </div>
            <div class="heart-name-item-image-product">

              <i id="bxs" onclick="addHeart()" class='bx bxs-heart'></i>
            </div>

          </div>

        </div>

        <div class="item-image-product" data-aos="fade-up-right">
          <div class="test"><img src="src/img/product-5.webp" width="100%" alt=""></div>
          <p><a onclick="showProduct()">Quick View</a></p>
          <div class="name-item-image-product">
            <div class="price-name-item-image-product">
              <p>Esprit Ruffle Shirt</p>
              <p>$16.64</p>
            </div>
            <div class="heart-name-item-image-product">

              <i id="bxs" onclick="addHeart()" class='bx bxs-heart'></i>
            </div>

          </div>

        </div>


        <div class="item-image-product" data-aos="fade-up-left">
          <div class="test"><img src="src/img/product-6.webp" width="100%" alt=""></div>
          <p><a onclick="showProduct()">Quick View</a></p>
          <div class="name-item-image-product">
            <div class="price-name-item-image-product">
              <p>Esprit Ruffle Shirt</p>
              <p>$16.64</p>
            </div>
            <div class="heart-name-item-image-product">

              <i id="bxs" onclick="addHeart()" class='bx bxs-heart'></i>
            </div>

          </div>

        </div>

        <div class="item-image-product" data-aos="fade-down-left">
          <div class="test"><img src="src/img/product-7.webp" width="100%" alt=""></div>
          <p><a onclick="showProduct()">Quick View</a></p>
          <div class="name-item-image-product">
            <div class="price-name-item-image-product">
              <p>Esprit Ruffle Shirt</p>
              <p>$16.64</p>
            </div>
            <div class="heart-name-item-image-product">

              <i id="bxs" onclick="addHeart()" class='bx bxs-heart'></i>
            </div>

          </div>

        </div>


        <div class="item-image-product" data-aos="zoom-in">
          <div class="test"><img src="src/img/product-8.webp" width="100%" alt=""></div>
          <p><a onclick="showProduct()">Quick View</a></p>
          <div class="name-item-image-product">
            <div class="price-name-item-image-product">
              <p>Esprit Ruffle Shirt</p>
              <p>$16.64</p>
            </div>
            <div class="heart-name-item-image-product">

              <i id="bxs" onclick="addHeart()" class='bx bxs-heart'></i>
            </div>

          </div>

        </div>


        <div class="item-image-product" data-aos="zoom-in-up">
          <div class="test"><img src="src/img/product-9.webp" width="100%" alt=""></div>
          <p><a onclick="showProduct()">Quick View</a></p>
          <div class="name-item-image-product">
            <div class="price-name-item-image-product">
              <p>Esprit Ruffle Shirt</p>
              <p>$16.64</p>
            </div>
            <div class="heart-name-item-image-product">

              <i id="bxs" onclick="addHeart()" class='bx bxs-heart'></i>
            </div>

          </div>

        </div>


        <div class="item-image-product" data-aos="zoom-in-down">
          <div class="test"><img src="src/img/product-10.webp" width="100%" alt=""></div>
          <p><a onclick="showProduct()">Quick View</a></p>
          <div class="name-item-image-product">
            <div class="price-name-item-image-product">
              <p>Esprit Ruffle Shirt</p>
              <p>$16.64</p>
            </div>
            <div class="heart-name-item-image-product">

              <i id="bxs" onclick="addHeart()" class='bx bxs-heart'></i>
            </div>

          </div>

        </div>

        <div class="item-image-product" data-aos="zoom-in-left">
          <div class="test"><img src="src/img/product-11.webp" width="100%" alt=""></div>
          <p><a onclick="showProduct()">Quick View</a></p>
          <div class="name-item-image-product">
            <div class="price-name-item-image-product">
              <p>Esprit Ruffle Shirt</p>
              <p>$16.64</p>
            </div>
            <div class="heart-name-item-image-product">

              <i id="bxs" onclick="addHeart()" class='bx bxs-heart'></i>
            </div>

          </div>

        </div>


        <div class="item-image-product" data-aos="zoom-in-right">
          <div class="test"><img src="src/img/product-12.webp" width="100%" alt=""></div>
          <p><a onclick="showProduct()">Quick View</a></p>
          <div class="name-item-image-product">
            <div class="price-name-item-image-product">
              <p>Esprit Ruffle Shirt</p>
              <p>$16.64</p>
            </div>
            <div class="heart-name-item-image-product">

              <i id="bxs" onclick="addHeart()" class='bx bxs-heart'></i>
            </div>

          </div>

        </div>
        <div class="item-image-product" data-aos="zoom-in-right">
          <div class="test"><img src="src/img/product-13.webp" width="100%" alt=""></div>
          <p><a onclick="showProduct()">Quick View</a></p>
          <div class="name-item-image-product">
            <div class="price-name-item-image-product">
              <p>Esprit Ruffle Shirt</p>
              <p>$16.64</p>
            </div>
            <div class="heart-name-item-image-product">

              <i id="bxs" onclick="addHeart()" class='bx bxs-heart'></i>
            </div>

          </div>

        </div>


        <div class="item-image-product" data-aos="zoom-in-right">
          <div class="test"><img src="src/img/product-14.webp" width="100%" alt=""></div>
          <p><a onclick="showProduct()">Quick View</a></p>
          <div class="name-item-image-product">
            <div class="price-name-item-image-product">
              <p>Esprit Ruffle Shirt</p>
              <p>$16.64</p>
            </div>
            <div class="heart-name-item-image-product">

              <i id="bxs" onclick="addHeart()" class='bx bxs-heart'></i>
            </div>

          </div>

        </div>

        <div class="item-image-product" data-aos="zoom-in-right">
          <div class="test"><img src="src/img/product-15.webp" width="100%" alt=""></div>
          <p><a onclick="showProduct()">Quick View</a></p>
          <div class="name-item-image-product">
            <div class="price-name-item-image-product">
              <p>Esprit Ruffle Shirt</p>
              <p>$16.64</p>
            </div>
            <div class="heart-name-item-image-product">

              <i id="bxs" onclick="addHeart()" class='bx bxs-heart'></i>
            </div>

          </div>

        </div>


        <div class="item-image-product" data-aos="zoom-in-right">
          <div class="test"><img src="src/img/product-16.webp" width="100%" alt=""></div>
          <p><a onclick="showProduct()">Quick View</a></p>
          <div class="name-item-image-product">
            <div class="price-name-item-image-product">
              <p>Esprit Ruffle Shirt</p>
              <p>$16.64</p>
            </div>
            <div class="heart-name-item-image-product">
              <i id="bxs" onclick="addHeart()" class='bx bxs-heart'></i>
            </div>

          </div>

        </div>

      </div>


      <div class="btn-product">
        <a href="">LOAD MORE</a>
      </div>
    </div>

  </div>


  <?php include "views/footer.php" ?>
  <div id="appp">
    <div class="grid">
      <div class="grid-left">
        <img src="src/img/product_Sub1.webp" width="80%" alt="">
        <img src="src/img/product_Sub2.webp" width="80%" alt="">
        <img src="src/img/product_Sub3.webp" width="80%" alt="">
      </div>
      <div class="grid-mid">


        <div class="img">
          <img id="img" src="src/img/product_Sub2.webp" width="100%" alt="">
        </div>


        <div class="icon-next-pre">

          <i class='bx bx-exit-fullscreen'></i>

          <div class="next-pre">
            <i class='bx bx-chevron-left' onclick="pre()"></i>
            <i class='bx bx-chevron-right' onclick="next()"></i>
          </div>

        </div>



      </div>

      <div class="grid-right">
        <p>Lightweight Jacket</p>
        <h4>$58.79</h4>
        <p>Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligu
          la. Mauris consequat ornare feugiat.</p>


        <div class="option-product">
          <form action="" onsubmit=" return validate()">
            <table>
              <tr>
                <td>
                  Size
                </td>
                <td>
                  <select id="size">
                    <option value="0">Choose an option</option>
                    <option value="1">Size S</option>
                    <option value="2">Size M</option>
                    <option value="3">Size L</option>
                    <option value="4">Size XL</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Color</td>
                <td>
                  <select id="color">
                    <option value="0">Choose an option</option>
                    <option value="1">Red</option>
                    <option value="2">Blue</option>
                    <option value="3">White</option>
                    <option value="4">Gray</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td></td>
                <td>
                  <button>-</button>
                  <input type="number" min="0">
                  <button>+</button>
                </td>
              </tr>
              <tr>
                <td></td>
                <td>
                  <input type="submit" name="" value="ADD TO CART" id="a">
                </td>
              </tr>
            </table>
          </form>
        </div>



        <div class="icon-product">
          <i class='bx bxs-heart'></i>
          <i class='bx bxl-facebook-circle'></i>
          <i class='bx bxl-twitter'></i>
          <i class='bx bxl-google-plus'></i>
        </div>
        <div class="close">
          <i onclick="showProduct()" class='bx bx-x-circle bx-tada'></i>
        </div>
      </div>
    </div>



  </div>

  <script src="src/js/main.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <script>
    AOS.init();
  </script>
</body>

</html>