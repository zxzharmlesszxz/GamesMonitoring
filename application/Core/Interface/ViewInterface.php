<?php
/**
 * Created by PhpStorm.
 * User: (^_^)
 * Date: 07.05.2017
 * Time: 22:40
 */

namespace Core\Interfaces;


/**
 * Interface ViewInterface
 * @package Core\Interfaces
 */
interface ViewInterface
{
    /**
     * @param $content_view
     * @param $template_view
     * @param null $data
     * @return mixed
     */
    public function generate($content_view, $template_view, $data = null);

    /**
     * @param null $data
     * @return mixed
     */
    public function ajax($data = null);

    /**
     * @param null $data
     * @return mixed
     */
    public function debug($data = null);
}