<?php
namespace application\frontend\controller;

use application\lib\Controller;
use application\lib\Application;

class SearchController extends Controller {

	public function __construct() {
		parent::__construct();
		Application::get('config')->set(array('html', 'header', 'title', 'inner'), 'Search');
	}

	public function actionIndex() {
		$this->getView()->render('search');
	}

	public function actionTest() {
		echo 'search test';
	}
}