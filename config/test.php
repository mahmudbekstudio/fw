<?php
return array_merge(
	require dirname(__FILE__) . '/config.php',
	array(
		'debug' => true,
		'router' => array(
			array('GET', '/', 'default/index', 'home')
		),
		'baseUrl' => '/student/test'
	)
);
