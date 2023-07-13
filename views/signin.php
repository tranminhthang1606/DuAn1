<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="src/css/style.css" />
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
    <title>SignIn</title>

<body class="animsition">

    <!-- Header -->
    <?php include "views/header.php" ?>

    </div>


    <div id="main">

        <div class="SignIn container">
            <form action="">
                <div class="form-SignIn">
                    <div class="left-form-Sign-In">

                        <div class="inpt-form-sign-in">
                            <p>Email :</p>
                            <input type="text" id="email" placeholder="Enter your Email ">
                            <span class="error-email"></span>
                        </div>
                        <div class="inpt-form-sign-in">
                            <p>Password :</p>
                            <input type="password" placeholder="Enter your Password ">
                        </div>
                        <div class="btn-signIn">
                            <div class="left-btn-signIn">
                                <p>Do not have an account ?</p> <a href="index.php?act=sign_up"> Sign Up</a>
                            </div>
                            <div class="right-btn-signnIn">
                                <button type="submit">Sign In</button>
                            </div>
                        </div>
                    </div>
                    <div class="right-form-SignIn">
                        <img src="https://static.vecteezy.com/system/resources/previews/003/689/228/original/online-registration-or-sign-up-login-for-account-on-smartphone-app-user-interface-with-secure-password-mobile-application-for-ui-web-banner-access-cartoon-people-illustration-vector.jpg"
                            width="70%" alt="">
                    </div>
                </div>
            </form>
        </div>

    </div>
    <?php include "views/footer.php" ?>
    <script src="src/js/main.js"></script>


</body>

</html>