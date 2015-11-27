<?php
use application\lib\Config;
use application\lib\Application;
use application\lib\AltoRouter;
use application\lib\MysqliDb;
use application\lib\Authentication;

if ( !defined('PATHROOT') )
	define('PATHROOT', dirname(__FILE__));

if ( !defined('APPENV') )
	define('APPENV', 'frontend');

if( !defined('BASEURL') )
	define('BASEURL', substr($_SERVER['PHP_SELF'], 0, strlen($_SERVER['PHP_SELF']) - 10));

function __autoload($className) {
	$file = PATHROOT . str_replace('application', '', str_replace('\\', DIRECTORY_SEPARATOR, $className)) . '.php';

	if (!file_exists($file)) {
		return false;
	}
	else {
		require_once $file;
		return true;
	}
}

$config = new Config(APPENV);
$router = array_merge($config->get('router'), $config->get(array('default', 'router')));
$config->set('router', $router);
$dbConfig = $config->get('db');

Application::set('authenticate', new Authentication());
Application::set('router', new AltoRouter($router, $config->get('baseUrl')));
Application::set('db', new MysqliDb(array( 'host' => $dbConfig['host'],
                                           'username' => $dbConfig['user'],
                                           'password' => $dbConfig['pass'],
                                           'db'=> $dbConfig['db'],
                                           'port' => $dbConfig['port'],
                                           'prefix' => $dbConfig['prefix'],
                                           'charset' => $dbConfig['charset'])));
Application::run($config);