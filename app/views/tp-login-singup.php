<?php

use Helpers\CsrfToken;
use Helpers\Semej;

$generate_csrfToken = CsrfToken::generate();

?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= ROOT ?>assets/css/reset.css">    
    <link rel="stylesheet" href="<?= ROOT ?>assets/css/login-singup/login-singup.css">

    <title><?= LS_TITEL ?></title>
</head>
<body>
    <div id="container">
        <div class="shapes shape-1"></div>
        <div class="shapes shape-2"></div>
        <div class="shapes shape-3"></div>
        <div class="shapes shape-4"></div>
        <div class="shapes shape-5"></div>
        <div class="shapes shape-6"></div>

        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form login-Form" method="post">
            <h2 class="form-Title">ورود</h2>
            <input name="csrf_token" type="hidden" value="<?= $generate_csrfToken ?>">
            <input name="frm[username]" type="text" class="user-Name-Input input" placeholder="نام کاربری">
            <div class="password-Container">
                <img src="<?= ROOT ?>assets/img/icon/eye-icon.png" alt="" class="eye-Icon" >
                <input name="frm[password]" type="password" class="password-Input input" placeholder="رمز عبور">
            </div>
            <span class="span form-Span"><a class="span-Link singUp-Page" href="#">حساب کاربری ندارید؟ (ثبت نام کنید)</a></span>
            <button name="login_btn" type="submit" value="Register" class="login-Btn btn">ورود</button>
            <button class="cancle-Btn btn"><a class="index-Link" href="./index.php">بازگشت</a></button>
        </form>

        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form singUp-Form" method="post">
            <h2 class="form-Title">ثبت نام</h2>
            <input name="csrf_token" type="hidden" value="<?= $generate_csrfToken ?>">
            <input name="frm[username]" type="text" class="user-Name-Input input" placeholder="نام کاربری">
            <input name="frm[phoneNumber]" type="text" class="phone-Number-Input input" placeholder="شماره تماس">
            <div class="password-Container">
                <img src="<?= ROOT ?>assets/img/icon/eye-icon.png" alt="" class="eye-Icon" >
                <input name="frm[password]" type="password" class="password-Input input" placeholder="رمز عبور">
            </div>
            <div class="password-Container">
                <img src="<?= ROOT ?>assets/img/icon/eye-icon.png" alt="" class="eye-Icon" >
                <input name="frm[confirm_password]" type="password" class="repet-Password-Input password-Input input" placeholder="تکرار رمز عبور">
            </div>
            <span class="span form-Span"><a class="span-Link login-Page" href="#">حساب کاربری دارید؟ (وارد شوید)</a></span>
            <button name="register_btn" type="submit" value="Register" class="singUp-Btn btn">ثبت نام</button>
            <button class="cancle-Btn btn"><a class="index-Link" href="./index.php">بازگشت</a></button>
        </form>
    </div>
</body>
    <script src="<?= ROOT ?>assets/js/login-singup/login-singup.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <!-- <script src="<?= ROOT ?>assets/js/semej.js"></script> -->
    <?php Semej::alert(); ?>
</html>
