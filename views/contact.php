<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="src/css/contact.css" />
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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Contact</title>
</head>

<body>
    <!-- Dựng base -->

    <div id="app">
        <?php include "views/header.php" ?>
        </div>

        <div id="main">
            <div class="banner">
                <div class="text-banner">
                    <h1>Contact</h1>
                </div>

            </div>
            <div class="grid">
                <div class="left-grid" data-aos="fade-right">
                    <h3>Send Us A Message</h3>
                   <form action=""  onsubmit="return validate()">
                    <div class="">
                        <input type="text" id="address" placeholder=" Your email Address">
                    </div>

                    <div class="">
                        <input type="text" id="note" placeholder="How can we help  ?">
                    </div>
                    <div class="">
                        <div class="">
                            <input type="submit" name="" value="SUBMIT" id="">
                        </div>
                    </div>
                   </form>
                </div>

                <div class="right-grid"data-aos="fade-left">
                    <div class="address">
                        <div><i class='bx bx-map'></i></div>
                        <div class="text-address">
                            <h4>Address</h4>
                            <p>Xom 1, Vu Binh, Kien Xuong, Thai Binh</p>
                        </div>
                    </div>
                    <div class="talk">
                        <div><i class='bx bxs-phone'></i></div>
                        <div class="text-address">
                            <h4>Lets Talk</h4>
                            <p>+1 800 1236879</p>
                        </div>
                    </div>
                    <div class="sale">
                        <div><i class='bx bx-map'></i></div>
                        <div class="text-address">
                            <h4>
                                Sale Support</h4>
                            <p>contact@example.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="maps"data-aos="fade-up" >
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7481.684880480121!2d106.3892054649998!3d20.348126674609237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135fdaa91b73cf9%3A0x932e3f873571859b!2zQsawdSDEkGnhu4duIFZp4buHdCBOYW0!5e0!3m2!1sen!2s!4v1659610745724!5m2!1sen!2s"
                    width="100%" height="650" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>







        </div>

        <?php include "views/footer.php" ?>

    </div>








    <script src="src/js/blog.js"></script>
    <script src="src/js/contact.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
      </script>

</body>

</html>