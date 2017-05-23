<?php

namespace Core\Module\Database;

/**
 * Class Model
 * @package Core\Module\Database
 */
class Model extends \Core\Model
{
    public $class;

    public function __construct()
    {
        parent::__construct();
        $this->class = new MySQL_Database();
    }
}
