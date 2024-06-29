<?php

require_once "Database.php";
require_once "autoload.php";
require_once "config.php";

/**
 * Helper class
 */
require_once "./Helpers/CsrfToken.php";
require_once "./Helpers/Sanitizer.php";
require_once "./Helpers/Semej.php";

/**
 * Models class
 */
require_once "./app/models/AuthUser.php";