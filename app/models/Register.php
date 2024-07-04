<?php

use Helpers\CsrfToken;
use Helpers\Sanitizer;
use Helpers\Semej;

class Register extends Database {
    public function register($csrf_token, $formData) {
        
        $csrf_token = Sanitizer::sanitizeInput($csrf_token);
        $formData = Sanitizer::sanitizeInput($formData);

        // Check CSRF token
        $check_csrfToken = CsrfToken::validate($csrf_token);
        if (!$check_csrfToken) {
            Semej::set('error', 'Invalid CSRF token', '!کلک میخواستی بزنی کیومرث؟  زشته اینکار! نکن');
            $this->redirectToSignup();
        }

        // Check password
        if ($formData['password'] !== $formData['confirm_password']) {
            Semej::set('error', 'Invalid password', 'لطفا رمز ها را یکسان وارد کنید');
            $this->redirectToSignup();
        }

        // Hash password
        $password_hash = password_hash($formData['password'], PASSWORD_BCRYPT);

        // Validate phone number
        $checkValidatePhoneNumber = $this->validatePhoneNumber($formData['phoneNumber']);
        if (!$checkValidatePhoneNumber) {
            Semej::set('error', 'Invalid PhoneNumber', 'شماره خودتو هم بلد نیسی ؟این تاسف بار است!');
            $this->redirectToSignup();
        }

        // Check username
        $check_userName = $this->check_username($formData['username']);
        if ($check_userName) {
            Semej::set('error', 'Duplicate username', 'این یوزر نیم قبلا استفاده شده');
            $this->redirectToSignup();
        }

        // Check phoneNumber
        $check_userName = $this->check_phoneNumber($formData['phoneNumber']);
        if ($check_userName) {
            Semej::set('error', 'Duplicate phone number', 'این شماره قبلا استفاده شده');
            $this->redirectToSignup();
        }

        // Insert user data
        $sql = "INSERT INTO users (userName, phone_number, password) VALUES (:username, :phone_number, :password)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':username' => $formData['username'], ':phone_number' => $formData['phoneNumber'], ':password' => $password_hash]);
        $records = $stmt->rowCount() ? true : false;
        return $records;
    }

    private function check_username($username) {
        $sql = "SELECT username FROM users WHERE username = :username";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(["username" => $username]);
        $records = $stmt->fetch(PDO::FETCH_OBJ);
        return $records;
    }
    private function check_phoneNumber($phoneNumber) {
        $sql = "SELECT phone_number FROM users WHERE phone_number = :phoneNumber";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(["phoneNumber" => $phoneNumber]);
        $records = $stmt->fetch(PDO::FETCH_OBJ);
        return $records;
    }

    private function redirectToSignup() {
        header('location:login-singup.php');
        exit();
    }

    private function validatePhoneNumber($phoneNumber) {
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