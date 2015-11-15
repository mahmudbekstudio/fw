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
				*/
			),
			'footer' => array(
				'jquery' => array('src' => '', 'type' => 'script')
			)
		)
	)
);
