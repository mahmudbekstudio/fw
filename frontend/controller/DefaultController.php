<?php
namespace application\frontend\controller;

use application\lib\Application;
use application\lib\Controller;

class DefaultController extends Controller {
	public function actionIndex() {
		$request = Application::getVar('request', array('type' => 'get', 'space' => 'test'));
		$this->getView()->render('test', array('request' => $request));
	}

	public function action404() {
		echo __CLASS__ . ' 404';
	}
}