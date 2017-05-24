<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
try {
    require_once __DIR__ . '/../Application/bootstrap.php';
} catch (Exception $e) {
    echo "Error: ", $e->getMessage(), "\n";
}
