<?php

spl_autoload_register(function($className) {
    $file = "{$className}.php";

    $file = str_replace(
        '\\',
        DIRECTORY_SEPARATOR,
        $file
    );

    if (!file_exists($file)) {
        throw new \Exception("{$file} not found");
    }

    require_once $file;
});

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__.DS);
define('VIEW_DIR', ROOT . 'View' . DS);

//temporary
$dbConfig = [
    'user' => 'root',
    'pass' => '',
    'host' => 'localhost',
    'dbname' => 'mvc'
];

$dsn = "mysql: host={$dbConfig['host']}; dbname={$dbConfig['dbname']}";

$request = new \Framework\Request($_GET, $_POST, $_FILES);
$container = new \Framework\Container();

$dbConnection = new \PDO($dsn, $dbConfig['user'], $dbConfig['pass']);
$dbConnection->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$router = new \Framework\Router();

$container
    ->set('pdo', $dbConnection)
    ->set('router', $router)
;

$controller = $request->get('controller', 'Default');
$action = $request->get('action', 'index');

$controller = '\\Controller\\' . $controller . 'Controller';//example: '\Controller\Default' . 'Controller'
$action .= 'Action'; // ex: 'feedback' . 'Action'

$controller = new $controller($dbConnection);
$controller->setContainer($container);

/*echo '<pre>';
print_r($controller);
echo '<pre>';die;*/
if (!method_exists($controller, $action)){
    throw new \Exception("Action {$action} not found");
}

$content = $controller->$action($request);


require VIEW_DIR . 'layout.phtml';
