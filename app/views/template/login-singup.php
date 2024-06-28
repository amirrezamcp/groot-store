<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= ROOT ?>assets/css/reset.css">    
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/login-singup/login-singup.css">

    <title><?= LS_TITEL ?></title>
</head>
<body>
    <div action="#" id="container">
        <div class="shapes shape-1"></div>
        <div class="shapes shape-2"></div>
        <div class="shapes shape-3"></div>
        <div class="shapes shape-4"></div>
        <div class="shapes shape-5"></div>
        <div class="shapes shape-6"></div>

        <form action="#" class="form login-Form">
            <h2 class="form-Title">ورود</h2>
            <input type="text" class="user-Name-Input input" placeholder="نام کاربری">
            <input type="password" class="password-Input input" placeholder="رمز عبور">
            <span class="span form-Span"><a class="span-Link singUp-Page" href="#">حساب کاربری ندارید؟ (ثبت نام کنید)</a></span>
            <button class="login-Btn btn">ورود</button>
            <button class="cancle-Btn btn">بازگشت</button>
        </form>

        <form action="#" class="form singUp-Form">
            <h2 class="form-Title">ثبت نام</h2>
            <input type="text" class="user-Name-Input input" placeholder="نام کاربری">
            <input type="text" class="phone-Number-Input input" placeholder="شماره تماس">
            <input type="password" class="password-Input input" placeholder="رمز عبور">
            <input type="password" class="repet-Password-Input input" placeholder="تکرار رمز عبور">
            <span class="span form-Span"><a class="span-Link login-Page" href="#">حساب کاربری دارید؟ (وارد شوید)</a></span>
            <button class="singUp-Btn btn">ثبت نام</button>
            <button class="cancle-Btn btn">بازگشت</button>
        </form>
    </div>
</body>
    <script src="<?= ROOT ?>assets/js/login-singup/login-singup.js"></script>
</html>
