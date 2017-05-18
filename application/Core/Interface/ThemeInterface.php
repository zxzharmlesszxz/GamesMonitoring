<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 10.05.17
 * Time: 13:03
 */

namespace Core\Interfaces;


/**
 * Interface ThemeInterface
 * @package Core\Interfaces
 */
interface ThemeInterface
{
    /**
     * @return mixed
     */
    public function setStyle($style);

    /**
     * @return mixed
     */
    public function setJscript($jscript);

    /**
     * @return mixed
     */
    public function getStyles();

    /**
     * @return mixed
     */
    public function getJscripts();

    /**
     * @return mixed
     */
    public function generate();
}