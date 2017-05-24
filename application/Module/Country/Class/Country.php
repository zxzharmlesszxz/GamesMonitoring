<?php

namespace Module\Country;

use Core\Module\Database\DatabaseObject;

/**
 * Class Country
 */
class Country extends DatabaseObject
{
    /**
     * @var string
     */
    protected static $table_name = "country";

    /**
     * @var array
     */
    protected static $db_fields = array('id', 'code', 'name');

    /**
     * @var
     */
    protected $id;

    /**
     * @var
     */
    public $code;

    /**
     * @var
     */
    public $name;

    /**
     * @param array $item
     * @return static
     */
    public static function add(array $item)
    {
        $new = new static;
        $new->code = trim($item['code']);
        $new->name = trim($item['name']);
        return $new;
    }
}

