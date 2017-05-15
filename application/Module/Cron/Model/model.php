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
    public function create()
    {
        echo __METHOD__ . " working<br>";
        return "Cron create page";
    }

    /**
     *
     */
    public function get()
    {
        echo __METHOD__ . " working<br>";
        return "Cron index page";
    }

    /**
     *
     */
    public function delete()
    {
        echo __METHOD__ . " working<br>";
        return "Cron delete page";
    }

    /**
     *
     */
    public function save()
    {
        echo __METHOD__ . " working<br>";
        return "Cron save page";
    }
}
