<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 04.05.17
 * Time: 17:37
 */

namespace Database;

spl_autoload_register(function ($class) {
    $ierarchy = explode('\\', $class);
    @include_once __DIR__ . '/Class/' . end($ierarchy) . '.php';
});