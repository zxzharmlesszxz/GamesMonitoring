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
    protected $lesses;

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
        foreach ($this->findFiles('style') as $file)
            $this->setStyle($file);
        foreach ($this->findFiles('less') as $file)
            $this->setLess($file);
        foreach ($this->findFiles('js') as $file)
            $this->setJscript($file);
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
     * @param mixed $script
     * @return mixed|void
     */
    public function setJscript($script)
    {
        $this->jscripts[] = $script;
    }

    /**
     * @param mixed $less
     * @return mixed|void
     */
    public function setLess($less)
    {
        $this->lesses[] = $less;
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
     * @return mixed
     */
    public function getLesses()
    {
        return $this->lesses;
    }

    /**
     * @return View
     */
    public function generate()
    {
        return new View($this->content);
    }

    /**
     * @param $dir
     * @return mixed|void
     */
    public function findFiles($dir)
    {
        $path = dir(__DIR__ . '/' . $dir);
        while (false !== ($file = $path->read())) {
            switch ($file) {
                case '.':
                case '..':
                    break;
                default:
                    $files[] = $file;
                    break;
            }
        }
        return $files;
    }
}