<?php

/**
 * Class Controller_Servers
 */
class Controller_Servers extends Controller
{
    /**
     *
     */
    public function action_index()
    {
        $this->view->generate('servers_view.php', 'template_view.php', $this->model->get_data());
    }

    /**
     *
     */
    public function action_edit()
    {
        $this->view->generate('server_edit.php', 'template_view.php', $this->model->get(intval($this->query['serverid'])));
    }

    /**
     *
     */
    public function action_create()
    {
        $this->view->ajax($this->model->create($this->query['server']));
    }

    /**
     *
     */
    public function action_delete()
    {
        $this->view->ajax($this->model->delete($this->model->get(intval($this->query['serverid']))->serverid));
    }

    /**
     *
     */
    public function action_update()
    {
        $this->view->ajax($this->model->update($this->query['server']));
    }

    /**
     *
     */
    public function action_show()
    {
        $data = $this->model->get(intval($this->query['serverid']));
        $sq = new SourceServerQueries();
        $server = $data->addr;
        $address = explode(':', $server);
        $sq->connect($address[0], $address[1]);
        $data->info = $sq->getInfo();
        $data->players_info = $sq->getPlayers();
        $data->rules = $sq->getRules();
        $sq->disconnect();
        $this->view->generate('server_show.php', 'template_view.php', $data);
    }

    /**
     *
     */
    public function action_getAll()
    {
        $this->view->ajax($this->model->getAjax());
    }
}
