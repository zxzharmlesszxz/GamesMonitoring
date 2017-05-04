<?php

ini_set('display_errors', 1);
try {
    require_once __DIR__ . '../application/bootstrap.php';
} catch (Exception $e) {
    echo "Error: ", $e->getMessage(), "\n";
}
