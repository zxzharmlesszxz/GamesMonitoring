<?php

/**
 * Class Mode
 */
class Mode extends DatabaseObject
{
    /**
     * @var string
     */
    protected static $table_name = "modes";
    /**
     * @var array
     */
    protected static $db_fields = array('modeid', 'shortname', 'fullname', 'description');

    /**
     * @var
     */
    protected $modeid;
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
