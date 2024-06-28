<?php
namespace Helpers\Sanitizer;

trait Sanitizer {

    public static function sanitizeInput($input) {
        if(is_array($input)) {
            return array_map([self::class, 'sanitize'], $input);
        }else{
            return self::sanitize($input);
        }
    }

    public static function sanitizeValue($value) {
        $sanitizedValue = trim($value);
        $sanitizedValue = filter_var($sanitizedValue, FILTER_SANITIZE_STRING);
        $sanitizedValue = htmlspecialchars($sanitizedValue, ENT_QUOTES, 'UTF-8');
        return $sanitizedValue;
    }
}