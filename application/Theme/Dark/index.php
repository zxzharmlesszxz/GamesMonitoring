<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 10.05.17
 * Time: 13:04
 */

namespace Theme\Dark;

/**
 * Class Theme
 * @package Theme\Dark
 */
class Theme extends \Core\Theme
{
    /**
     * @var
     */
    protected $styles = array(__DIR__ . 'style/style.less');

    /**
     * @var
     */
    protected $jscripts;
}