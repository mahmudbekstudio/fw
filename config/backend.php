<?php
return array_merge(
	require dirname(__FILE__) . '/config.php',
	array(
		'theme' => '',
		'debug' => false,
		'router' => array()
	)
);
