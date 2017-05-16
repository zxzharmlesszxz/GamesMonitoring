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
     * @var Collection
     */
    protected $items;

    /**
     * @var array
     */
    protected $class = array();

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->items = new Collection;
    /*    $this->class = empty($class) ? substr(explode("_", static::class)[1], 0, -1) : $class;
        foreach (($this->class)::find_all() as $item) {
            $id = $item->id();
            $this->items->addItem($item, $item->$id);
        }
    */
    }

    /**
     * @param null $id
     * @return Collection|mixed
     */
    public function get()
    {
        return !empty($id) ? $this->items->getItem($id) : $this->items;
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

    public function index()
    {
        echo "index<br>";
        var_dump($this->class);
    }

    /**
     * @param $class
     * @return mixed|void
     */
    public function addClass($class)
    {
        $this->class[] = $class;
    }
}
