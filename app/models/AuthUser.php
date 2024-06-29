<?php
use Helpers\Sanitizer;

class AuthUser extends Database {
    public function register($csrf_token, $formData) {
        $csrf_token = Sanitizer::sanitizeInput($csrf_token);
        $formData   = Sanitizer::sanitizeInput($formData);
        $Current_user_ID = 5;

        $sql = "INSERT INTO users (id, userName, phone_number, password) VALUES (:id, :username, :phone_number, :password)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':id' => $Current_user_ID, ':username' => $formData['username'], ':phone_number' => $formData['phoneNumber'], ':password' => $formData['password']]);
        return $stmt->rowCount();
    }
}