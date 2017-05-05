<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 04.05.17
 * Time: 17:37
 */

namespace Module\Error;
use Core\Module as ModuleInterface;
require_once 'Controller/controller.php';

/**
 * Class ModuleInterface
 * @package ModuleInterface\Error
 */
class Module implements ModuleInterface
{
    /**
     * @var Controller
     */
    public $Controller;

    /**
     * ModuleInterface constructor.
     */
    public function __construct()
    {
        $this->Controller = new Module\Error\Controller();
    }
}

spl_autoload_register(
/**
 * @param $class
 */
    function ($class) {
    $hierarchy = explode('\\', $class);
    @include_once __DIR__ . '/Class/' . end($hierarchy) . '.php';
});