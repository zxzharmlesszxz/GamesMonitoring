<?php

ini_set('display_errors', 0);
try {
    require_once '../application/bootstrap.php';
} catch (Exception $e) {
    echo "Error: ", $e->getMessage(), "\n";
}
