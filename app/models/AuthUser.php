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

        }

        // check password
        if($formData['password'] != $formData['confirm_password']) {
            Semej::set('error','Invalid password', 'لطفا رمز ها را یکسان وارد کنید');
            header('location:login-singup.php');
        }

        // hash password
        $password_hash = password_hash($formData['password'], PASSWORD_BCRYPT);

        $checkValidatePhoneNumber = $this->validatePhoneNumber($formData['phoneNumber']);
        if(!$checkValidatePhoneNumber) {
            Semej::set('error','Invalid PhoneNumber', 'شماره خودتو هم بلد نیسی ؟این تاسف بار است!');
            header('location:login-singup.php');
        }
        // insert phone number
        $sql = "INSERT INTO users (userName, phone_number, password) VALUES (:username, :phone_number, :password)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':username' => $formData['username'], ':phone_number' => $formData['phoneNumber'], ':password' => $password_hash]);
        return $stmt->rowCount();
    }
    
    function validatePhoneNumber($phoneNumber) {
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