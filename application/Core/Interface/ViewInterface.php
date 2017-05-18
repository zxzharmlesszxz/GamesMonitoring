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
     * @param $content
     * @return mixed
     */
    public function generate($content);
}