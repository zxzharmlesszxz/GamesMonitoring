<?php

/**
 * Class Controller
 */
abstract class Controller
{

    /**
     * @var string
     */
    public $model;
    /**
     * @var View
     */
    public $view;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->view = new View();
        $model = "Model_" . explode("_", static::class)[1];
        $this->model = (class_exists($model)) ? new $model() : '';
        $this->query = $_REQUEST;
    }

    /**
     * @return mixed
     */
    abstract public function action_index();
}
