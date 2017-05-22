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
        //echo get_called_class() . __METHOD__ . '<br>';

    }

    /**
     *
     */
    public function get()
    {
        $str = get_called_class() . __METHOD__ . '<br>';
        $str .= "Input args:<br>";
        $str .= serialize(func_get_args());
        return $str;
    }

    /**
     *
     */
    public function save()
    {
        echo get_called_class() . __METHOD__ . '<br>';
        echo "Input args:<br>";
        print_r(func_get_args());
    }

    /**
     *
     */
    public function delete()
    {
        echo get_called_class() . __METHOD__ . '<br>';
        echo "Input args:<br>";
        print_r(func_get_args());
    }

    /**
     *
     */
    public function create()
    {
        echo get_called_class() . __METHOD__ . '<br>';
        echo "Input args:<br>";
        print_r(func_get_args());
    }

    /**
     *
     */
    public function index()
    {
        $str = get_called_class() . __METHOD__ . '<br>';
        $str .= "Input args:<br>";
        $str .= serialize(func_get_args());
        return $str;
    }
}
