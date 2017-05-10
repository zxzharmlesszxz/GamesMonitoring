<?php

/**
 * Class Collection
 */

namespace Core;
class Collection
{
    /**
     * @var array
     */
    private $items = array();

    /**
     * @param $obj
     * @param null $key
     * @throws \Exception
     */
    public function addItem($obj, $key = null)
    {
        if ($key == null) {
            $this->items[] = $obj;
        } else {
            if (isset($this->items[$key])) {
                global $core;
                throw $core->getCoreModule('Error')->message("Key $key already in use.");
            } else {
                $this->items[$key] = $obj;
            }
        }
    }

    /**
     * @param $key
     * @throws \Exception
     */
    public function deleteItem($key)
    {
        if ($this->keyExists($key)) {
            unset($this->items[$key]);
        } else {
            global $core;
            throw $core->getCoreModule('Error')->message("Invalid key $key.");
        }
    }

    /**
     * @param $key
     * @return mixed
     * @throws \Exception
     */
    public function getItem($key)
    {
        if ($this->keyExists($key)) {
            return $this->items[$key];
        } else {
            global $core;
            throw $core->getCoreModule('Error')->message("Invalid key $key.");
        }
    }

    /**
     * Get array $items
     * Input: empty
     * Output: array of objects
     **/
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return array
     */
    public function keys()
    {
        return array_keys($this->items);
    }

    /**
     * Get length of array $items
     * Input: empty
     * Output: integer
     **/
    public function length()
    {
        return count($this->items);
    }

    /**
     * Check if key exists in array $items
     * Input: string
     * Output: bulean
     **/
    public function keyExists($key)
    {
        return isset($this->items[$key]);
    }
}
