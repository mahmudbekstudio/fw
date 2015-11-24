<?php
namespace application\plugin\Login;

use application\lib\Plugin;

class Login extends Plugin {

	public function __construct() {
		parent::__construct();
	}

	public function render() {
		$this->renderView('loginForm');
	}

}