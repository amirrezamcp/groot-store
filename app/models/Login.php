<?php

use Helpers\CsrfToken;
use Helpers\Sanitizer;
use Helpers\Semej;

class Login extends Database {
    public function login($csrf_token,$formData) {

        $formData = Sanitizer::sanitizeInput($formData);
        $csrf_token = Sanitizer::sanitizeInput($csrf_token);
        
         //  check csrf token
        $check_csrfToken = CsrfToken::validate($csrf_token);
        if(!$check_csrfToken) {
            Semej::set('error','Invalid CSRF token', '!کلک میخواستی بزنی کیومرث؟  زشته اینکار! نکن');
            header('location:login-singup.php');
            exit();
        }

        $sql = "SELECT username, password FROM users WHERE username = :username";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':username' => $formData['username']]);
        $records = $stmt->fetchAll(PDO::FETCH_OBJ);
        
        if (count($records) > 0) {
            $user = $records[0];
            if (!password_verify($formData['password'], $user->password)) {
                Semej::set('error', 'Invalid password', 'رمز حودتو فراموش کردی؟ عاااااااااااا !! خجالت بکش خرس گنده برو یکم ورزش کن، مغز دیگه برات نماده /: ورزش کنی خوب میشی ');
                header('location:login-singup.php');
            } else {
                header('location:index.php');
            }
        } else {
            Semej::set('error', 'Invalid username', 'یوزر نیم خودتو یادت رفته؟ یکم ماهی بخور تا  مغزت مثل ماهی نشه :) از کمبود فسفور داری میمیری:/');
            header('location:login-singup.php');
        }
    }    
}