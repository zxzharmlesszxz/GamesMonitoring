<?php

namespace Core;

use Core\Interfaces\ModelInterface;

/**
 * Class Model
 * @package Core
 */
abstract class Model implements ModelInterface
{
    /**
     * @var array
     */
    protected $class = array();

    /**
     * Model constructor.
     */
    public function __construct()
    {

    }

    /**
     *
     */
    public function get()
    {

    }

    /**
     * @return array
     */
    public function getAjax()
    {
    }

    /**
     * @param Object $item
     * @return bool|Object
     */
    public function save()
    {
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete()
    {
    }

    /**
     * @param array $item
     * @return bool
     */
    public function create()
    {
    }

    /**
     *
     */
    public function index()
    {
        echo "index<br>";
        var_dump($this->class);
    }
}
