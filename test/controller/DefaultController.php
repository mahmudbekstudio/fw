<?php
namespace application\test\controller;

use application\lib\Controller;

class DefaultController extends Controller {

	public function actionIndex() {
		$name = '\application\plugin\form\Form';
		print_r(new $name());
	}

}