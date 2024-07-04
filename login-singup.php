<?php

require_once "./app/core/init.php";

if(isset($_POST['register_btn']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $csrf_token = $_POST['csrf_token'];
    $data = $_POST['frm'];

    $authUser = new Register();
    $authUser->register($csrf_token, $data);
}

if (isset($_POST['login_btn']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $csrf_token = $_POST['csrf_token'];
    $data = $_POST['frm'];

    $authUser = new Login();
    $authUser->login($csrf_token, $data);
}
require_once "./app/views/tp-login-singup.php";