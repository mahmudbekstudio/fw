<?php
namespace application\plugin\form;

use application\lib\Plugin;

class Form extends Plugin {

	public function __construct() {
		parent::__construct();
	}

	public function init() {
		parent::init();
		echo 'Form init';
	}

	public function render() {
		parent::render();
	}
}