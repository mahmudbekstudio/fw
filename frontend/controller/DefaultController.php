<?php
namespace application\frontend\controller;

use application\lib\Application;
use application\lib\Controller;

class DefaultController extends Controller {

	protected $access = array(
		array(array('test1', 'test2'), '>', '-2'),
		array(array('test3'), '>', '2'),
		array(array('test5', 'test4'), '=', '1')
	);

	public function actionIndex() {
		$request = Application::getVar('request', array('type' => 'get', 'space' => 'test'));
		$this->getView()->render('test', array('request' => $request));
	}

	public function action404() {
		echo __CLASS__ . ' 404';
	}

	public function actionTest1() {
		echo 'test1';
	}

	public function actionTest2() {
		echo 'test2';
	}

	public function actionTest3() {
		echo 'test3';
	}

	public function actionTest4() {
		echo 'test4';
	}

	public function actionTest5() {
		echo 'test5';
	}
}