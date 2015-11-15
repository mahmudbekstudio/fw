<?php
namespace application\plugin\navigation;

use application\lib\Plugin;

class Navigation extends Plugin {

	private $count = 1;
	private $current = 1;

	public function __construct() {
		parent::__construct();
	}

	public function init() {
		parent::init();
		echo 'Navigation init';
	}

	public function render() {
		parent::render();
	}

}