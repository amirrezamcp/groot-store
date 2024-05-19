<?php
    include_once "../config/constants.php";
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITE_TITEL ?></title>
</head>
<body>
    <div>
        <header>
             <div class="header-Container">
                <div class="right-Header">
                    <h1 class="hader-Title">
                        دست‌سازه‌های گرووت
                    </h1>
                        <input type="search" class="product-Search-Input" placeholder="جست و جوی محصولات">
                        <button type="submit" class="search-Btn"><img src="../assets/img/icon/search-icon.png" alt=""></button>
                </div>
                <div class="left-Header">
                   <div class="login-Singup-Container"> <a href="#" class="login">ورود</a> / <a class="singup" href="#">ثبت نام</a></div>
                   <button class="cart-Btn"><img src="../assets/img/icon/card-Icon.png" alt=""></button>
                </div>
            </div>
        </header>
    </div>
</body>
</html>