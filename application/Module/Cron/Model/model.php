<?php

namespace Module\Cron;
use Core\Interfaces\ModelInterface;

/**
 * Class Model
 * @package Module\Cron
 */
class Model implements ModelInterface
{
    /**
     *
     */
    public function create() {}

    /**
     *
     */
    public function get() {
        echo __CLASS__ . __METHOD__ . " working<br>";
        return "Cron index page";
    }

    /**
     *
     */
    public function delete() {}

    /**
     *
     */
    public function save() {}
}
