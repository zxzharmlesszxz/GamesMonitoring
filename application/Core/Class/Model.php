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
        echo __METHOD__;

    }

    /**
     *
     */
    public function get()
    {
        echo __METHOD__;

    }

    /**
     *
     */
    public function save()
    {
        echo __METHOD__;
    }

    /**
     *
     */
    public function delete()
    {
        echo __METHOD__;
    }

    /**
     *
     */
    public function create()
    {
        echo __METHOD__;
    }

    /**
     *
     */
    public function index()
    {
        echo __METHOD__;
        echo "index<br>";
        var_dump($this->class);
    }
}
