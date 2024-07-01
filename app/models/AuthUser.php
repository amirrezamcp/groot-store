<?php

use Helpers\CsrfToken;
use Helpers\Sanitizer;
use Helpers\Semej;

class AuthUser extends Database {
    public function register($csrf_token, $formData) {
        
        $csrf_token = Sanitizer::sanitizeInput($csrf_token);
        $formData = Sanitizer::sanitizeInput($formData);
        //  check csrf token
        $check_csrfToken = CsrfToken::validate($csrf_token);
        if(!$check_csrfToken) {
            Semej::set('error','Invalid CSRF token', '!کلک میخواستی بزنی کیومرث؟  زشته اینکار! نکن');
            header('location:login-singup.php');
            exit();
        }

        // check password
        if($formData['password'] != $formData['confirm_password']) {
            Semej::set('error','Invalid password', 'لطفا رمز ها را یکسان وارد کنید');
            header('location:login-singup.php');
            exit();
        }

        // hash password
        $password_hash = password_hash($formData['password'], PASSWORD_BCRYPT);

        $checkValidatePhoneNumber = $this->validatePhoneNumber($formData['phoneNumber']);
        if(!$checkValidatePhoneNumber) {
            Semej::set('error','Invalid PhoneNumber', 'شماره خودتو هم بلد نیسی ؟این تاسف بار است!');
            header('location:login-singup.php');
            exit();
        }
        // insert phone number
        $sql = "INSERT INTO users (userName, phone_number, password) VALUES (:username, :phone_number, :password)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':username' => $formData['username'], ':phone_number' => $formData['phoneNumber'], ':password' => $password_hash]);
        $records = $stmt->rowCount() ? true : false;
        return $records;
    }

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
    
    public function validatePhoneNumber($phoneNumber) {
        $phoneNumber = Sanitizer::sanitizeInput($phoneNumber);
        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
        
        if (!is_string($phoneNumber)) {
            return false;
        }
        if (strlen($phoneNumber) != 11) {
            return false;
        }
        if (substr($phoneNumber, 0, 2) != '09') {
            return false;
        }
        return true;
    }
}