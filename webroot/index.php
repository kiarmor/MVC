<?php

spl_autoload_register(function($className) {
    $file = "{$className}.php";

    $file = str_replace(
        '\\',
        DIRECTORY_SEPARATOR,
        $file
    );

    $file = ROOT . $file;

    if (!file_exists($file)) {
        throw new \Exception("{$file} not found");
    }

    require_once $file;
});

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__ . DS . '..' . DS);
define('VIEW_DIR', ROOT . 'View' . DS);

//temporary
$dbConfig = [
    'user' => 'root',
    'pass' => '',
    'host' => 'localhost',
    'dbname' => 'mvc'
];

$dsn = "mysql: host={$dbConfig['host']}; dbname={$dbConfig['dbname']}";

try {
    \Framework\Session::start();

    $request = new \Framework\Request($_GET, $_POST, $_FILES);
    $container = new \Framework\Container();

    $dbConnection = new \PDO($dsn, $dbConfig['user'], $dbConfig['pass']);
    $dbConnection->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $router = new \Framework\Router();

    $repositoryFactory = new \Framework\RepositoryFactory();
    $repositoryFactory->setPdo($dbConnection);

    $container
        ->set('pdo', $dbConnection)
        ->set('router', $router)
        ->set('repository_factory', $repositoryFactory)
    ;

    $controller = $request->get('controller', 'Default');
    $action = $request->get('action', 'index');

    $controller = '\\Controller\\' . $controller . 'Controller';//example: '\Controller\Default' . 'Controller'
    $action .= 'Action'; // ex: 'feedback' . 'Action'

    $controller = new $controller($dbConnection);
    $controller->setContainer($container);

    if (!method_exists($controller, $action)){
        throw new \Exception("Action {$action} not found");
    }

    $content = $controller->$action($request);


} catch (\Framework\Exception\NotFoundException $e) {

    $controller = new \Controller\ErrorController($e);
    $content = $controller->error404Action();
} catch (\Exception $e) {

    $controller = new \Controller\ErrorController($e);
    $content = $controller->errorAction();
}

echo $content;