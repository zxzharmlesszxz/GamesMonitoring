<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 04.05.17
 * Time: 17:37
 */

namespace Module\Admin;
require_once 'Controller/controller.php';
require_once 'Model/model.php';


spl_autoload_register(function ($class) {
    $ierarchy = explode('\\', $class);
    @include_once __DIR__ . '/Class/' . end($ierarchy) . '.php';
});