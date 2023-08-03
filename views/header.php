<div id="header">

    <div class="header-top">
        <div class="sub-header-top">
            <div class="left-title">
                <h4>Coza Shop</h4>
            </div>
            <div class="list-header">
                <ul>
                    <li><a href=""> Đẹp</a></li>
                    <li><a href=""> Trẻ</a></li>
                    <li><a href=""> Khỏe</a></li>

                </ul>
            </div>
        </div>
    </div>


    <div class="sub-nav" id="nav">

        <div class="nav">


            <div class="photo-logo">
                <a href="index.php?act=home"><img src="src/img/logo.webp" style="cursor: pointer;" alt="" /></a>
            </div>
            <div class="list-menu">
                <ul>
                    <li>
                        <a href="index.php?act=home" id="home"> Home

                        </a>
                    </li>
                    <li><a href="index.php?act=shop">Shop</a></li>
                    <li><a href="index.php?act=blog">Blog</a></li>
                    <li><a href="index.php?act=about">About</a></li>
                    <li><a href="index.php?act=contact">Contact</a></li>
                </ul>
            </div>
            <div class="list-icon" id="list-icon">
                <form action="index.php?act=shop" method="post">
                    <div class="icons search" id="iconSearch">
                        <input type="text" id="input_search" name="keyword" placeholder="New Product..?">
                        <button type="submit" name="search"> <i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
                <div class="icons cart">
                    <a href="index.php?act=cart"><i class="fa-solid fa-cart-shopping"></i></a>
                </div>
                <div class="icons heart">
                    <?php
                    if (isset($_SESSION['name'])) {
                        ?>
                        <div class="account">
                            <?php echo $_SESSION['name'] ?>
                            <div class="account_option">
                                <?php
                                if (isset($_SESSION['vaitro']) && $_SESSION['vaitro'] > 0) {
                                    ?>
                                    <h5><a href="admin/index.php">Quản trị</a></h5>
                                    <?php
                                }
                                ?>
                                <h5><a href="index.php?act=logout">Đăng Xuất</a></h5>

                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <a href="index.php?act=sign_in"> <i class='bx bxs-user'></i></a>
                        <?php
                    }
                    ?>

                </div>
                <div class="toggle">
                    <i class='bx bx-sun'></i>
                </div>
            </div>



        </div>



    </div>