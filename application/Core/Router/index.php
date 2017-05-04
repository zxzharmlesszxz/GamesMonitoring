<?php

/**
 * Class Route
 */
class Route
{
    /**
     *
     */
    static public function start()
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $controller_name = 'Controller_' . (!empty($routes[1]) ? $routes[1] : 'Main');
        $action_name = 'action_' . (!empty($routes[2]) ? $routes[2] : 'index');
        $model_name = 'Model_' . (!empty($routes[1]) ? $routes[1] : 'Main');

        /*
        echo "Model: $model_name <br>";
        echo "Controller: $controller_name <br>";
        echo "Action: $action_name <br>";
        */

        $model_path = config()->PROJECT_ROOT . '/' . config()->MODELS_PATH . '/' . Registry::_get('dir') . '/' . strtolower($model_name) . '.php';

        if (file_exists($model_path))
            include strtolower($model_path);
        elseif (file_exists(config()->PROJECT_ROOT . '/' . config()->MODELS_PATH . '/' . config()->DEFAULT . '/' . strtolower($model_name) . ".php"))
            include strtolower(config()->PROJECT_ROOT . '/' . config()->MODELS_PATH . '/' . config()->DEFAULT . '/' . strtolower($model_name) . ".php");

        $controller_path = config()->PROJECT_ROOT . '/' . config()->CONTROLLERS_PATH . '/' . Registry::_get('dir') . '/' . strtolower($controller_name) . ".php";

        if (file_exists($controller_path)) include strtolower($controller_path);
        else include strtolower(config()->PROJECT_ROOT . '/' . config()->CONTROLLERS_PATH . '/' . config()->DEFAULT . '/' . strtolower($controller_name) . ".php");

        if (class_exists($controller_name)) $controller = new $controller_name;

        if (isset($controller) && method_exists($controller, $action_name)) {
            $controller->$action_name();
        } else {
            self::ErrorPage404();
        }
    }

    /**
     *
     */
    protected function ErrorPage404()
    {
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
        include_once config()->PROJECT_ROOT . '/' . config()->CONTROLLERS_PATH . '/' . config()->DEFAULT . '/module.php';
        $controller = new Controller_404;
        $controller->action_index();
        #header('Location:/404');
    }
}
