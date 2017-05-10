<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 10.05.17
 * Time: 13:04
 */

namespace Theme\Light;

/**
 * Class Theme
 * @package Theme\Light
 */
class Theme extends \Core\Theme
{
    /**
     * @var
     */
    protected $styles = array('style/style.less');

    /**
     * @var
     */
    protected $jscripts = 'light';
}