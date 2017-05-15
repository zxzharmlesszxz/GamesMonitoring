<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 11.05.17
 * Time: 14:22
 */

namespace Core;


use Core\Interfaces\ControllerInterface;

/**
 * Class Controller
 * @package Core
 */
abstract class Controller implements ControllerInterface
{
    /**
 * @var Model
 */
    public $Model;

    /**
     * @var Collection
     */
    protected $Routes;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->Routes = new Collection();
    }

    /**
     * @param $Module
     * @param $Action
     * @return mixed|void
     */
    public function addRoute($Module, $Action)
    {
        $this->Routes->addItem("/$Module/$Action", $Action);
    }
}