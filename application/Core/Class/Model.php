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
     *
     */
    public function getAjax()
    {
    }

    /**
     *
     */
    public function save()
    {
    }

    /**
     *
     */
    public function delete()
    {
    }

    /**
     *
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
