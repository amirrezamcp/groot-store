<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/reset.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= SITE_TITEL ?> </title>
</head>
<body>
    <div>
        <header>
             <div class="top-Header-Container">
                <div class="right-Header">
                    <h1 class="hader-Title">
                        دست‌سازه‌های گرووت
                    </h1>
                        <input type="search" class="product-Search-Input" placeholder="جست و جوی محصولات">
                        <button type="submit" class="search-Btn"><img src="<?= ROOT ?>/assets/img/icon/search-icon.png" alt=""></button>
                </div>
                <div class="left-Header">
                   <div class="login-Singup-Container"> 
                        <a class="login" href="./login-singup.php">ورود / ثبت نام</a>

                    </div>
                   <button class="cart-Btn"><img src="<?= ROOT ?>/assets/img/icon/card-Icon.png" alt=""></button>
                </div>
            </div>
            <div class="bottom-Header-Container">
                <div class="header-menu-container">
                    <div class="menu-Box">
                        <div class="menu-Lines menu-Line1"></div>
                        <div class="menu-Lines menu-Line2"></div>
                        <div class="menu-Lines menu-Line3"></div>
                    </div>
                    <span class="menu-Title">دسته بندی محصولات</span>
                    
                </div>
                <div class="header-List-Container">
                    <ul class="header-List-Items">
                        <li class="header-List-Item header-List-Item1">
                            <span>تخفیف ها</span>
                        </li>
                        <li class="header-List-Item header-List-Item2">
                            <span>مناسبت ها</span>
                        </li>
                        <li class="header-List-Item header-List-Item3">
                            <span>درباره ما</span>
                        </li>
                        <li class="header-List-Item header-List-Item3">
                            <span>ارتباط با ما</span>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
    </div>
    <div id="body-Container">
        <div class="baner-Container">
            <img class="baner-Img" src="<?= ROOT ?>/assets/img/baner/baner1.png" alt="">
        </div>
        <div id="products-Categorization-Container">
            <span class="products-Categorization-Title">دسته بندی محصولات</span>
        </div>
    </div>
</body>
<script src="<?= ROOT ?>/assets/js/index.js"></script>
</html>