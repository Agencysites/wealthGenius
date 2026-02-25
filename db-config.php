<?php

/* Prevent accidental output */
if (php_sapi_name() !== 'cli' && basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
    exit('Direct access not allowed');
}

/* Database credentials - Environment aware */
$is_live = (
    (isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'a-c-m-e.in') !== false) ||
    (strpos(__FILE__, '/home/u133917450/') !== false)
);

if (!$is_live) {
    // LOCAL DEVELOPMENT
    $DB_HOST = "127.0.0.1";
    $DB_USER = "root";      
    $DB_PASS = "";
    $DB_NAME = "wealthgenius";
} else {
    // LIVE SERVER (Hostinger)
    $DB_HOST = "localhost";
    $DB_USER = "u133917450_admin";      
    $DB_PASS = "wealthGenius-2026";
    $DB_NAME = "u133917450_wealthgenius";
}

/* Create connection */
$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

/* Check connection */
if ($conn->connect_error) {
    error_log("Database connection error: " . $conn->connect_error);
    die("Database connection failed");
}

/* Set charset (very important) */
$conn->set_charset("utf8mb4");
?>
