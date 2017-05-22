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
     * @param $content
     * @return mixed|void
     */
    public function generate($content)
    {
        return $content;
    }
}
