<?php

/**
 * Class Controller_Modes
 */
class Controller_Modes extends Controller
{
    /**
     *
     */
    public function action_index()
    {
        $this->view->generate('modes_view.php', 'template_view.php', $this->model->get_data());
    }

    /**
     *
     */
    public function action_edit()
    {
        $this->view->generate('mode_edit.php', 'template_view.php', $this->model->get(intval($this->query['modeid'])));
    }

    /**
     *
     */
    public function action_create()
    {
        $this->view->ajax($this->model->create($this->query['mode']));
    }

    /**
     *
     */
    public function action_delete()
    {
        $this->view->ajax($this->model->delete($this->model->get(intval($this->query['modeid']))->modeid));
    }

    /**
     *
     */
    public function action_update()
    {
        $this->view->ajax($this->model->update($this->query['mode']));
    }

    /**
     *
     */
    public function action_show()
    {
        $this->view->generate('mode_show.php', 'template_view.php', ($this->model->get_data()->keyExists($this->query['modeid'])) ? $this->model->get($this->query['modeid']) : NULL);
    }

    /**
     *
     */
    public function action_getAll()
    {
        $this->view->ajax($this->model->getAjax());
    }
}
