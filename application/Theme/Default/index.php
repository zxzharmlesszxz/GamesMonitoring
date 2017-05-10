<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 10.05.17
 * Time: 13:04
 */

namespace Theme\Default;

use Core\Interfaces\ThemeInterface;

/**
 * Class Theme
 * @package Theme\Default
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
     * Theme constructor.
     */
    public function __construct()
    {
        echo "Default theme";
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