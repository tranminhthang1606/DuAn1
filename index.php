<?php


if(isset($_GET['act'])){
    $act= $_GET['act'];
    switch ($act) {
        case 'shop':
            include "views/shop.php";
            break;
        case 'sign_in':
            include 'views/signin.php';
            break;
        case 'sign_up':
            include "views/signup.php";
            break;
        case "contact":
            include "views/contact.php";
            break;
        case "about":
            include "views/about.php";
            break;
        case "blog" :
            include "views/blog.php";
            break;
        case "cart":
            include "views/cart.php";
            break;
        default:
            include "views/home.php";
            break;
    }
}else {
    include "views/home.php";
}

?>
