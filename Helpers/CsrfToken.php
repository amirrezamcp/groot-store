<?php declare(strict_types=1); // strict requirement
namespace Helpers;

class CsrfToken {

    // generate CSRF Token
    public static function generate() : string {
        if (!isset($_SESSION)) {
            session_start();
        }
        $token = bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $token;
        return $token;
    }

    // Validate CSRF Token and return True/False
    public static function validate($token) : bool {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['csrf_token'])) {
            return false;
        }
        if ($_SESSION['csrf_token'] !== $token) {
            return false;
        }
        unset($_SESSION['csrf_token']);
        return true;
    }
}