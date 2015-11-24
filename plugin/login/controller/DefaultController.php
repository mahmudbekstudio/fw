<?php
namespace application\plugin\Login\controller;

use application\lib\Controller;

class DefaultController extends Controller {

	public function actionIndex() {
		$this->getView()->render('loginForm');
	}

}