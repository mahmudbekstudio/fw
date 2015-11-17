<?php
return array_merge(
	require dirname(__FILE__) . '/config.php',
	array(
		'theme' => 'student',
		'debug' => false,
		'router' => array(
			array('GET', '/', 'default/index', 'home')
		),
		//'baseUrl' => '/fw/frontend',
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
				'bootstrap' => array('tag' => 'link', 'params' => array('href' => BASEURL . '/css/bootstrap.min.css', 'rel' => 'stylesheet')),
				'bootstrap-theme' => array('tag' => 'link', 'params' => array('href' => BASEURL . '/css/bootstrap-theme.min.css', 'rel' => 'stylesheet'))
			),
			'footer' => array(
				'jquery' => array('tag' => 'script', 'params' => array('src' => BASEURL . '/js/jquery-1.11.3.min.js')),
				'bootstrap' => array('tag' => 'script', 'params' => array('src' => BASEURL . '/js/bootstrap.min.js'))
			)
		)
	)
);
