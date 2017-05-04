<?php

/**
 * Class View
 */
class View
{
    /**
     * @param $content_view
     * @param $template_view
     * @param null $data
     */
    public function generate($content_view, $template_view, $data = null)
    {
        include file_exists(config()->VIEWS_PATH . '/' . config()->dir . '/' . $template_view) ?
            config()->VIEWS_PATH . '/' . $template_view :
            config()->VIEWS_PATH . '/' . config()->DEFAULT . '/' . $template_view;
    }

    /**
     * @param null $data
     */
    public function ajax($data = null)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    /**
     * @param null $data
     */
    public function debug($data = null)
    {
        var_dump($data);
    }
}
