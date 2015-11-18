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
				'charset' => array('tag' => 'meta', 'params' => array('charset' => 'utf-8')),
				'compatible' => array('tag' => 'meta', 'params' => array('http-equiv' => 'X-UA-Compatible', 'content' => 'IE=edge')),
				'viewport' => array('tag' => 'meta', 'params' => array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1')),
				'description' => array('tag' => 'meta', 'params' => array('name' => 'description', 'content' => '')),// description of website
				'keywords' => array('tag' => 'meta', 'params' => array('name' => 'keywords', 'content' => '')),// keywords of website
				'author' => array('tag' => 'meta', 'params' => array('name' => 'author', 'content' => '')),// author of website
				'favicon' => array('tag' => 'link', 'params' => array('rel' => 'icon', 'href' => '')),// favicon icon of website
				'title' => array('tag' => 'title', 'inner' => ''),// title for change
				'bootstrap' => array('tag' => 'link', 'params' => array('href' => BASEURL . '/css/bootstrap.min.css', 'rel' => 'stylesheet'), 'comment' => 'bootstrap core styles'),
				'bootstrap-theme' => array('tag' => 'link', 'params' => array('href' => BASEURL . '/css/bootstrap-theme.min.css', 'rel' => 'stylesheet'), 'comment' => 'bootstrap theme styles'),
				'respond' => array(
					'tag' => '',
					'inner' => "[if lt IE 9]>\n<script src=\"https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>\n<script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>\n<![endif]",
					'comment' => "HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries\nWARNING: Respond.js doesn't work if you view the page via file://"
				),
				'main-style' => array('tag' => 'link', 'params' => array('href' => BASEURL . '/css/styles.css', 'rel' => 'stylesheet'), 'comment' => 'main style'),
			),
			'footer' => array(
				'jquery' => array('tag' => 'script', 'params' => array('src' => BASEURL . '/js/jquery-1.11.3.min.js'), 'comment' => 'jQuery'),
				'bootstrap' => array('tag' => 'script', 'params' => array('src' => BASEURL . '/js/bootstrap.min.js'), 'comment' => 'bootstrap javascript')
			)
		)
	)
);
