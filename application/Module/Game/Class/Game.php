<?php

namespace Module\Game;

use Core\Module\Database\DatabaseObject;

/**
 * Class Game
 */
class Game extends DatabaseObject
{
    /**
     * @var string
     */
    protected static $table_name = "games";
    /**
     * @var array
     */
    protected static $db_fields = array('id', 'shortname', 'fullname', 'description');

    /**
     * @var
     */
    protected $id;
    /**
     * @var
     */
    public $shortname;
    /**
     * @var
     */
    public $fullname;
    /**
     * @var
     */
    public $description;

    /**
     * @param array $item
     * @return static
     */
    public static function add(array $item)
    {
        $new = new static;
        $new->shortname = trim($item['shortname']);
        $new->fullname = trim($item['fullname']);
        $new->description = trim($item['description']);
        return $new;
    }
}
