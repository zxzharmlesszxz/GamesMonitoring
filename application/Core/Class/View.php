<?php

namespace Core;

use Core\Interfaces\ViewInterface;

/**
 * Class View
 * @package Core
 */
class View implements ViewInterface
{
    /**
     * @param $content_view
     * @param $template_view
     * @param null $data
     * @return mixed|void
     */
    public function generate($content_view, $template_view, $data = null)
    {
        include file_exists(config()->PROJECT_ROOT . '/' . config()->VIEWS_PATH . '/' . Registry::_get('dir') . '/' . $template_view) ?
            config()->PROJECT_ROOT . '/' . config()->VIEWS_PATH . '/' . Registry::_get('dir') . '/' . $template_view :
            config()->PROJECT_ROOT . '/' . config()->VIEWS_PATH . '/' . config()->DEFAULT . '/' . $template_view;
    }

    /**
     * @param null $data
     * @return mixed|void
     */
    public function ajax($data = null)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    /**
     * @param null $data
     * @return mixed|void
     */
    public function debug($data = null)
    {
        var_dump($data);
    }
}
