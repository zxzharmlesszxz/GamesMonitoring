<?php

ini_set('display_errors', 1);
try {
    var_dump(require_once __DIR__ . '/../application/bootstrap.php');
    var_dump($_SESSION);
    var_dump($core);
} catch (Exception $e) {
    echo "Error: ", $e->getMessage(), "\n";
}
