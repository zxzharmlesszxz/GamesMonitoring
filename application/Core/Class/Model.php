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
     * @param null $class
     */
    public function __construct($class = NULL)
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
    public function get($id = null)
    {
        return !empty($id) ? $this->items->getItem($id) : $this->items;
    }

    /**
     * @return array
     */
    public function getAjax()
    {
        $array = array('data' => array());
        foreach ($this->items->getItems() as $key => $item) {
            $array['data'][$key] = $item;
        }
        return $array;
    }

    /**
     * @param Object $item
     * @return bool|Object
     */
    public function save(Object $item)
    {
        return $item->save() ? $item : false;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->items->getItem($id)->delete();
    }

    /**
     * @param array $item
     * @return bool
     */
    public function create(array $item)
    {
        $item = ($this->class)::add($item);
        return $item->save() ? $item : false;
    }

    public function index()
    {
        echo "index";
    }

    /**
     * @param $class
     * @return mixed|void
     */
    public function addClass($class)
    {

    }
}
