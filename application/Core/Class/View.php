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
     * @param Theme $theme
     * @param $content
     * @return mixed|void
     */
    public function generate(Theme $theme, $content)
    {
        $page = file_get_contents(__DIR__ . "/../../Template/template_view.php");
        $lesses = $theme->getLesses();
        $csses = $theme->getStyles();
        $jses = $theme->getJscripts();
        $less_files = '';
        $css_files = '';
        $js_files = '';
        foreach ($lesses as $less)
        {
            $less_files .= "<link rel='stylesheet/less' type='text/css' href='$less'>\n";
        }
        foreach ($csses as $css)
        {
            $css_files .= "<link rel='stylesheet/css' type='text/css' href='$css'>\n";
        }
        foreach ($jses as $js)
        {
            $js_files .= "<script type='text/javascript' src='$js'></script>\n";
        }

        $page = str_replace("%less%", $less_files, $page);
        $page = str_replace("%css%", $css_files, $page);
        $page = str_replace("%js%", $js_files, $page);

        $page = str_replace('%content%', $content, $page);
        return $page;
    }
}
