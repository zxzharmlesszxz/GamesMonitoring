<?php

namespace Module\Cron;
use Core\Interfaces\ModelInterface;

class Model implements ModelInterface
{
    public function __construct()
    {

    }

    public function get_data()
    {
        return $this->cron_update();
    }

    protected function cron_update()
    {

    }

    public function create() {}
    public function get() {}
    public function delete() {}
    public function save() {}
}
