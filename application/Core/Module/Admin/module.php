<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 04.05.17
 * Time: 17:37
 */

namespace Core\Module;

use Core\Module;

echo __FILE__ . '<br>';

require_once 'Controller/controller.php';
require_once 'Model/model.php';

/**
 * Class Admin
 * @package Core\Module\Admin
 */
class Admin extends Module
{

}

spl_autoload_register(
/**
 * @param $class
 */
    function ($class) {
        $hierarchy = explode('\\', $class);
        @include_once __DIR__ . '/Class/' . end($hierarchy) . '.php';
    });