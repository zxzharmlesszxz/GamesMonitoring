<?php

namespace Module\User;
use Core;

/**
 * Class Controller
 */
class Controller extends Core\Controller
{
    /**
     * @var
     */
    protected $query;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     */
    public function action_index()
    {
        $this->view->generate('users_view.php', 'template_view.php', $this->model->get_data());
    }

    /**
     *
     */
    public function action_edit()
    {
        $this->view->generate('user_edit.php', 'template_view.php', $this->model->get(intval($this->query['id'])));
    }

    /**
     *
     */
    public function action_changeStatus()
    {
        $this->view->ajax($this->model->changeStatus(intval($this->query['id'])));
    }

    /**
     *
     */
    public function action_create()
    {
        $this->view->ajax($this->model->create($this->query['user']));
    }

    /**
     *
     */
    public function action_delete()
    {
        $user = $this->model->get(intval($this->query['id']));
        $data = $this->model->delete(intval($user->userid));
        $this->view->ajax($data);
    }

    /**
     *
     */
    public function action_update()
    {
        $this->view->ajax($this->model->update($this->query['user']));
    }

    /**
     *
     */
    public function action_show()
    {
        foreach ($this->model->get_data()->keys() as $id) {
            if ($this->model->get($id)->login == $this->query['login']) {
                $data = $this->model->get($id);
            }
        }
        $this->view->generate('user_show.php', 'template_view.php', $data);
    }

    /**
     *
     */
    public function action_getAll()
    {
        $this->view->ajax($this->model->getAjax());
    }
}
