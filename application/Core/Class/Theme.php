<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 10.05.17
 * Time: 14:43
 */

namespace Core;

use Core\Interfaces\ThemeInterface;

/**
 * Class Theme
 * @package Core
 */
abstract class Theme implements ThemeInterface
{
    /**
     * @var
     */
    protected $styles;

    /**
     * @var
     */
    protected $jscripts;

    /**
     * @var
     */
    protected $content;

    /**
     * Theme constructor.
     */
    public function __construct()
    {
        echo get_called_class() . " theme<br />";
        foreach ($this->styles as $style)
        {
            $this->setStyle($style);
        }

        foreach ($this->jscripts as $script)
        {
            $this->setJscript($script);
        }
    }

    /**
     * @param mixed $style
     * @return mixed|void
     */
    public function setStyle($style)
    {
        $this->styles[] = $style;
    }

    /**
     * @param mixed $jscripts
     * @return mixed|void
     */
    public function setJscript($jscript)
    {
        $this->jscripts[] = $jscript;
    }

    /**
     * @return mixed
     */
    public function getStyles()
    {
        return $this->styles;
    }

    /**
     * @return mixed
     */
    public function getJscripts()
    {
        return $this->jscripts;
    }

    /**
     * @return View
     */
    public function generate()
    {
        return new View($this->content);
    }
}