<?php

namespace Core;

/**
 * Class Model
 */
abstract class Model
{
    /**
     * @var Collection
     */
    protected $items;
    /**
     * @var bool|null|string
     */
    protected $class;

    /**
     * Model constructor.
     * @param null $class
     */
    public function __construct($class = NULL)
    {
        $this->items = new Collection;
        $this->class = empty($class) ? substr(explode("_", static::class)[1], 0, -1) : $class;
        foreach (($this->class)::find_all() as $item) {
            $id = $item->id();
            $this->items->addItem($item, $item->$id);
        }
    }

    /**
     * @return Collection
     */
    public function get_data()
    {
        return $this->items;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->items->getItem($id);
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
     * @param DatabaseObject $item
     * @return bool|DatabaseObject
     */
    public function save(DatabaseObject $item)
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
}
