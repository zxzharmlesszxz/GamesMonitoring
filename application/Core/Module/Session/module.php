<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 04.05.17
 * Time: 17:37
 */

namespace Core;
require_once 'Controller/controller.php';
require_once 'Model/model.php';


spl_autoload_register(function ($class) {
    @include_once __DIR__ . "/Class/${class}.php";
});