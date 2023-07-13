<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="src/css/features.css">
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
    <title>Features</title>
</head>

<body>
    <!-- Dựng base -->

    <div id="app">





      <?php include "views/header.php" ?>



        </div>



        <div id="main">


            <div class="text_cart">
                <p>HOME</p>
                <i class='bx bx-chevron-right'></i>
                <p>Shoping Cart</p>
            </div>
            <div class="style"></div>

            <div class="item-cart">

                <div class="table-cart" data-aos="zoom-out-right">
                    <table>
                        <tr>
                            <th>IMG</th>
                            <th>PRODUCT</th>
                            <th>PRICE</th>
                            <th>QUANTITY</th>
                            <th>TOTAL</th>
                        </tr>
                        <tr>
                            <td>
                                <img src="src/img/cart1.webp" alt="">

                            </td>
                            <td>Fresh Strawberries</td>
                            <td>$ <span>36.00</span></td>
                            <td>
                                <i class='bx bxs-down-arrow'></i>
                                <input type="text" name="" value="0" id="">
                                <i class='bx bxs-up-arrow'></i>
                            </td>
                            <td>$ <span>36.00</span></td>
                        </tr>
                        <tr>
                            <td>
                                <img src="src/img/cart2.webp" alt="">
                            </td>
                            <td>Lightweight Jacket</td>
                            <td>$ <span>16.00</span></td>
                            <td>
                                <i class='bx bxs-down-arrow'></i>
                                <input type="text" name="" value="0" id="">
                                <i class='bx bxs-up-arrow'></i>
                            </td>
                            <td>$ <span>16.00</span></td>
                        </tr>
                        <tr>
                            <td id="total_table" colspan="4">TOTAL</td>
                            <td id="price_total">0</td>
                        </tr>
                        <tr>
                            <td colspan="5" id="update">
                                <input type="text" placeholder="Coupon Code">
                                <input type="submit" value="APPLY COUPON">
                                <input type="submit" value="UPDATE CART">
                            </td>
                        </tr>
                    </table>
                </div>


                <div class="cart-total" data-aos="zoom-out-left">


                    <h3>CART TOTALS</h3>


                    <div class="Subtotal">
                        <p>Subtotal:</p>
                        <p><span>$</span>79.65</p>
                    </div>



                    <div class="Shipping">
                        <div class="text">
                            <p>Shipping:</p>
                        </div>

                        <div class="text-shipping" >
                            
                                <p> There are no shipping methods available. Please double check your address, or contact us
                                    if you need any help.</p>
                                <p>CALCULATE SHIPPING</p>
                                <form action="" onsubmit="return validateCart()">
                                    <select name="" id="option">
                                        <option value="0">select a country</option>
                                        <option value="1">Thai Binh</option>
                                        <option value="2">Ha Noi</option>
                                        <option value="3">Quang Lich</option>
                                    </select>
                                    <input type="text" id="state" placeholder="State / country">
                                    <input type="text" id="postcode" placeholder="Postcode / Zip">
                                    <input type="submit" name="" value="UPDATE TOTALS" id="">

                                </form>
                            
                        </div>
                    </div>
                    <div class="total-cart">
                        <p>Total</p>
                        <p><span>$</span>79.65</p>
                    </div>
                    <input type="submit" value="PROCEED TO CHECKOUT" name="" id="">
                </div>
            </div>

        </div>



        <?php include "views/footer.php" ?>



    </div>
    <script src="src/js/features.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
      </script>
</body>

</html>