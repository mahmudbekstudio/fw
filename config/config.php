<?php

return array(
	'db' => array(
		'host'=> 'localhost',
		'db' => 'student',
		'user' => 'root',
		'pass' => '',
		'port' => 3306,
		'prefix' => 'std_',
		'charset' => 'utf8'
	),
	'path' => array(
		'root' => PATHROOT,
		'api' => PATHROOT . '/api',
		'backend' => PATHROOT . '/backend',
		'frontend' => PATHROOT . '/frontend',
		'test' => PATHROOT . '/test',
		'config' => PATHROOT . '/config',
		'lib' => PATHROOT . '/lib',
		'model' => PATHROOT . '/model'
	),
	'adminEmail' => 'mahmudbekstudio@mail.ru',
	'default' => array(
		'controller' => 'default',
		'method' => 'index',
		'router' => array(
			array('GET|POST', '/plugin/[a:name]/[a:controller]/[a:action]/?', 'plugin/default/redirect', 'pluginRedirect'),
			array('GET|POST', '/plugin/[a:name]/[a:controller]/?', 'plugin/default/redirect', 'pluginRedirectController'),
			array('GET|POST', '/plugin/[a:name]/?', 'plugin/default/redirect', 'pluginRedirectEmpty'),
			array('GET|POST', '/[a:controller]/[a:action]/p/[i:p]/?', 'default/redirect', 'redirectPage'),
			array('GET|POST', '/[a:controller]/[a:action]/?', 'default/redirect', 'redirect'),
			array('GET|POST', '/[a:controller]/p/[i:p]/?', 'default/redirect', 'redirectControllerPage'),
			array('GET|POST', '/[a:controller]/?', 'default/redirect', 'redirectController'),
			array('GET|POST', '/p/[i:p]/?', 'default/redirect', 'redirectEmptyPage'),
			array('GET|POST', '/?', 'default/redirect', 'redirectEmpty'),
			array('GET|POST', '*', 'default/404', '404')
		)
	),
	'baseUrl' => BASEURL,
	'root' => '', // changed in application
	'initPlugin' => array('login'),
	'html' => array(
		'content' => array(),
		'beforeContent' => array(),
		'afterContent' => array(),
		'header' => array(
			/*
			'tag' => 'script',
			'params' => array('src' => , ...),
			'inner' => ''
			*/
		),
		'footer' => array()
	),
	'level' => array(
		'guest' => 0,
		'user' => 1,
		'author' => 2,
		'editor' => 3,
		'admin' => 4,
		'superadmin' => 5
	)
);