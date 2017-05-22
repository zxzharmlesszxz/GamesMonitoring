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
        echo __DIR__;
        $page = file_get_contents("../../Template/template_view.php");
        $page = str_replace('%content%', $content, $page);
        return $page;
    }
}
