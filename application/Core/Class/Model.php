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
        echo get_called_class() . __METHOD__ . '<br>';

    }

    /**
     *
     */
    public function get()
    {
        echo get_called_class() . __METHOD__ . '<br>';

    }

    /**
     *
     */
    public function save()
    {
        echo get_called_class() . __METHOD__ . '<br>';
    }

    /**
     *
     */
    public function delete()
    {
        echo get_called_class() . __METHOD__ . '<br>';
    }

    /**
     *
     */
    public function create()
    {
        echo get_called_class() . __METHOD__ . '<br>';
    }

    /**
     *
     */
    public function index()
    {
        echo get_called_class() . __METHOD__ . '<br>';
        echo "index<br>";
        var_dump($this->class);
    }
}
