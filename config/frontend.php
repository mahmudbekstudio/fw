<?php
return array_merge(
	require dirname(__FILE__) . '/config.php',
	array(
		'theme' => 'student',
		'debug' => false,
		'router' => array(
			array('GET', '/', 'default/index', 'home')
		),
		'baseUrl' => '/fw/frontend',
		'html' => array(
			'content' => array(),
			'beforeContent' => array(),
			'afterContent' => array(),
			'header' => array(
				/*
				'src' => '',
				'type' => 'script' // script, style, or array of tag params
				'code' => {code of style or js}
				*/
				'bootstrap' => array('src' => 'bootstrap.min.css', 'type' => 'style'),
				'bootstrap-theme' => array('src' => 'bootstrap-theme.min.css', 'type' => 'style')
			),
			'footer' => array(
				'jquery' => array('src' => 'jquery-1.11.3.min.js', 'type' => 'script'),
				'bootstrap' => array('src' => 'bootstrap.min.js', 'type' => 'script')
			)
		)
	)
);
