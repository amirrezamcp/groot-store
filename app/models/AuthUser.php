<?php
use Helpers\Sanitizer;

class AuthUser extends Database {
    public function register($csrf_token, $formData) {
        $csrf_token = Sanitizer::sanitizeInput($csrf_token);
        $formData   = Sanitizer::sanitizeInput($formData);

        $sql = "INSERT INTO users (userName, phone_number, password) VALUES (:username, :phone_number, :password)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':username' => $formData['username'], ':phone_number' => $formData['phoneNumber'], ':password' => $formData['password']]);
        return $stmt->rowCount();
    }
}