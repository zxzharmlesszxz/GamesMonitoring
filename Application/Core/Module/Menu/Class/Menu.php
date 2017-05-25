<?php

namespace Core\Module\Menu;

/**
 * Class Menu
 */
class Menu
{
    /**
     * @var array
     */
    protected $pages = Array();

    /**
     *
     */
    public function show()
    {
        foreach ($this->pages as $page) {
            echo "<li><a href='{$page['url']}' title='{$page['descr']}'>{$page['title']}</a></li>";
        }
    }

    /**
     * @param $name
     * @param $url
     * @param $title
     * @param string $descr
     */
    public function add($name, $url, $title, $descr = '')
    {
        $this->pages[$name]['url'] = $url;
        $this->pages[$name]['title'] = $title;
        $this->pages[$name]['descr'] = $descr;
        $this->pages[$name]['name'] = $name;
    }
}
