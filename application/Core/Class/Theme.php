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
class Theme implements ThemeInterface
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
     * @var string
     */
    private $theme;

    /**
     * Theme constructor.
     * @param string $theme
     */
    public function __construct(string $theme)
    {
        $this->theme = $theme;
        echo "$theme theme";
    }

    /**
     * @param mixed $styles
     * @return mixed|void
     */
    public function setStyles($styles)
    {
        $this->styles = $styles;
    }

    /**
     * @param mixed $jscripts
     * @return mixed|void
     */
    public function setJscripts($jscripts)
    {
        $this->jscripts = $jscripts;
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
}