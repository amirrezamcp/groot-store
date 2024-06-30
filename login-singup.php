<?php

require_once "./app/core/init.php";

if(isset($_POST['csrf_token']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $csrf_token = $_POST['csrf_token'];
    $data = $_POST['frm'];

    $authUser = new AuthUser();
    $authUser->register($csrf_token, $data);
    $authUser->validatePhoneNumber($data);
}

require_once "./app/views/tp-login-singup.php";