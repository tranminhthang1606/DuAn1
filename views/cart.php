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
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
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
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Màu & Size</th>
                        <th>Tổng</th>
                        <th>Xóa</th>
                    </tr>

                    <?php
                    $totalPrice = 0;
                    if (isset($_SESSION['cart_item'])) {
                        foreach ($_SESSION['cart_item'] as $item) {
                            $totalPrice += ($item['price'] * $item['quantity'])
                                ?>
                            <tr>
                                <input type="hidden" class="id_sp_cart" value=<?php echo $item['id'] ?>>
                                <td>
                                    <img src="upload/<?php echo $item['image'] ?>" alt="" width="100px">
                                </td>
                                <td>
                                    <?php echo $item['name'] ?>
                                </td>
                                <td> <span class="single_price">
                                        <?php echo $item['price'] ?>
                                    </span></td>
                                <td>
                                    <i class='bx bxs-down-arrow' data-id='<?php echo $item['id'] ?>'
                                        data-color="<?php echo $item['color'] ?>" data-size="<?php echo $item['size'] ?>"></i>
                                        <br>
                                    <input type="text" class="quantity" value="<?php echo $item['quantity'] ?>"
                                        max="<?php echo loadone_soluong_from_variants_bycolorsize($item['id'], $item['color'], $item['size'])['tổng'] ?>"
                                        id="" data-id='<?php echo $item['id'] ?>' disabled>
                                        <br>
                                    <i class='bx bxs-up-arrow' data-id='<?php echo $item['id'] ?>'
                                        data-color="<?php echo $item['color'] ?>" data-size="<?php echo $item['size'] ?>"></i>
                                </td>
                                <td>
                                    <?php echo loadone_color($item['color'])['ten_mau'] ?>
                                    <?php echo loadone_size($item['size'])['ten_size'] ?>
                                </td>
                                <td> <span class='total_sp'>
                                        <?php echo ($item['price'] * $item['quantity']) ?>
                                    </span></td>
                                <td>
                                    <a href="index.php?act=delCartItem&id=<?php echo $item['id'] ?>&color=<?php echo $item['color'] ?>&size=<?php echo $item['size'] ?>"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa')"><i
                                            class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                    } ?>



                    <tr>
                        <td id="total_table" colspan="6">Tổng</td>
                        <td id="price_total">
                            <?php echo $totalPrice ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" id="update">
                            <input type="text" placeholder="Coupon Code">
                            <input type="submit" value="APPLY COUPON">
                        </td>
                    </tr>
                </table>
            </div>


            <div class="cart-total" data-aos="zoom-out-left">


                <h3>Tổng giỏ hàng</h3>


                <div class="Subtotal">
                    <p>Tổng tạm tính:</p>
                    <p><span class="Subtotal_val"></span> VNĐ

                    </p>
                </div>



                <div class="Shipping">
                    <div class="text">
                        <p>Shipping:</p>
                    </div>

                    <div class="text-shipping">

                        <p> Giao hàng tiêu chuẩn</p>
                        <p>Phí Ship</p>
                        <form action="" onsubmit="return validateCart()">
                            <select name="" id="option">
                                <option value="">Thành phố</option>

                                <option value="HN">Nội thành Hà Nội</option>
                                <option value="NT">Ngoại thành Hà Nội</option>
                            </select>

                        </form>

                    </div>

                </div>

                <div class="slider_container">
                    <div>
                        <form action="index.php?act=checkout" method="post">
                            <h4>Thanh toán tiền mặt</h4>
                            <input type="hidden" name="checkout_bill" class="checkout_bill">
                            <input type="hidden" name="date" value="<?php echo date('Y-m-d')?>">
                            <p>Thông tin chi tiết</p>
                            <input type="text" name="address" placeholder="Địa chỉ">
                            <input type="text" name="phone_num" placeholder="Số điện thoại">
                            <input type="text" name="name" placeholder="Tên người nhận">
                            <input type="submit" value="Thanh toán tiền mặt" name="cash" id="cash">
                        </form>
                    </div>
                    <div>
                        <form action="index.php?act=checkout" method="post">
                            <h4>Thanh toán bằng thẻ</h4>
                            <input type="hidden" name="totalPrice" class="checkout_bill">
                            <input type="hidden" name="date" value="<?php echo date('Y-m-d')?>">
                            <p>Thông tin chi tiết</p>
                            <input type="text" name="address" placeholder="Địa chỉ">
                            <input type="text" name="phone_num" placeholder="Số điện thoại">
                            <input type="text" name="name" placeholder="Tên người nhận">
                            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="pk_test_51NTOVbJs5O3gpxcMjNWkJJXQWWc0UKOpXbUXGkHJ0DQOmPGyxL06OkmfG8QHNHe23FANnR6RZ5IThaOkHomA8wNN00Wvx26U7W"
                                data-amount="" data-name="Coza Shop" data-description="Bill Checkout"
                                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                data-locale="auto" data-currency="vnd" data-zip-code="true">
                                </script>
                        </form>
                    </div>
                </div>



                <br>
                <br>
                
                <div class="total-cart">
                    <p>Total</p>
                    <p><span></span> VNĐ</p>
                </div>

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
    <script>
        var stripe = Stripe('pk_test_51NTOVbJs5O3gpxcMjNWkJJXQWWc0UKOpXbUXGkHJ0DQOmPGyxL06OkmfG8QHNHe23FANnR6RZ5IThaOkHomA8wNN00Wvx26U7W');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Create an instance of the card Element.
        var card = elements.create('card');

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function (event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            stripe.createToken(card).then(function (result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });
    </script>
    <script>
        let add_quantity = document.querySelectorAll(".bxs-up-arrow");
        let des_quantity = document.querySelectorAll(".bxs-down-arrow");
        let total_price = document.querySelector(".total-cart span");
        let total_sp_prices = document.querySelectorAll(".total_sp");
        let price_total = document.querySelector("#price_total");
        let checkout_bill = document.querySelectorAll(".checkout_bill");
        let subtotal = document.querySelector(".Subtotal_val");
        let total_price_value_current = Number(price_total.innerText);
        let check_change_option = false;
        option.addEventListener("change", function () {
            let total_price_value_current_change = Number(price_total.innerText);
            if (option.value != "HN" && option.value != "" && check_change_option == false) {
                check_change_option = true
                total_price.innerText = total_price_value_current_change + 25000;
            } else {
                if (check_change_option == true && option.value === "HN" && option.value != "") {
                    check_change_option = false
                    total_price.innerText = total_price_value_current_change;
                }

            }
        })
        add_quantity.forEach(function (e) {
            e.addEventListener("click", function () {
                let quantity_value = e.parentElement.querySelector("input");
                let total_sp = e.parentElement.parentElement.querySelector(".total_sp");
                let single_price = e.parentElement.parentElement.querySelector(".single_price");

                single_price = Number(single_price.innerText);
                quantity = Number(quantity_value.value);
                let max_quant = Number(quantity_value.max)

                if (quantity < max_quant) {
                    quantity_value.setAttribute("value", quantity + 1);
                    total_sp.innerText = (quantity_value.value * single_price);

                    total_price_value = Number(total_price.innerText) + single_price
                    total_price.innerText = total_price_value;
                    price_total.innerText = Number(price_total.innerText) + single_price;
                    subtotal.innerText = Number(subtotal.innerText) + single_price;
                    for (let i = 0; i < checkout_bill.length; i++) {
                        checkout_bill[i].setAttribute("value", total_price_value)
                    }
                } else {
                    quantity_value.setAttribute("value", max_quant);
                }

            })

        });
        des_quantity.forEach(function (e) {
            e.addEventListener("click", function () {
                let quantity_value = e.parentElement.querySelector("input");
                if (quantity_value.value > 0) {
                    let total_sp = e.parentElement.parentElement.querySelector(".total_sp");
                    let single_price = e.parentElement.parentElement.querySelector(".single_price");
                    let total_price_value_current = Number(subtotal.innerText);
                    single_price = Number(single_price.innerText);
                    quantity = Number(quantity_value.value);
                    if (quantity > 0) {
                        quantity_value.setAttribute("value", quantity - 1);
                    } else {
                        quantity_value.setAttribute("value", 0);

                    }

                    total_sp.innerText = (quantity_value.value * single_price);
                    total_price_value = Number(total_price.innerText) - single_price
                    total_price.innerText = total_price_value;
                    price_total.innerText = Number(price_total.innerText) - single_price;
                    subtotal.innerText = Number(subtotal.innerText) - single_price;
                    for (let i = 0; i < checkout_bill.length; i++) {
                        checkout_bill[i].setAttribute("value", total_price_value)
                    }

                }

            })



        });
        function caculate_total_price() {
            let total_price_value = 0;
            for (let i = 0; i < total_sp_prices.length; i++) {
                total_price_value += Number(total_sp_prices[i].innerText);
            }
            total_price.innerText = total_price_value;
            price_total.innerText = total_price_value;
            subtotal.innerText = total_price_value;
            for (let i = 0; i < checkout_bill.length; i++) {
                checkout_bill[i].setAttribute("value", total_price_value)
            }

        }
        caculate_total_price();


    </script>
    <script>
        $(".bxs-up-arrow").click(function () {
            var id = $(this).data("id");
            var color = $(this).data("color");
            var size = $(this).data("size");
            var method = "plus";
            $.ajax({
                type: "POST",
                url: "handle_quantity.php",
                data: {
                    productId: id,
                    color: color,
                    size: size,
                    method: method,
                },
                success: function (res) {
                    console.log(res)
                }
            })
        })
        $(".bxs-down-arrow").click(function () {
            var id = $(this).data("id");
            var color = $(this).data("color");
            var size = $(this).data("size");
            var method = "minus";
            $.ajax({
                type: "POST",
                url: "handle_quantity.php",
                data: {
                    productId: id,
                    color: color,
                    size: size,
                    method: method
                },
                success: function (res) {
                    console.log(res)
                }
            })
        })


    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.slider_container').slick(
                {
                    arrows: true,
                    fade: true,
                    prevArrow:"<button class='slick_prev'></button>",
                    nextArrow:"<button class='slick_next'>Chuyển phương thức</button>",
                }
            );
        })

    </script>

</body>

</html>