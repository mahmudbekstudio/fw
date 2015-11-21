<?php
namespace application\lib;

class Controller extends Instance {
	public $layout = 'main';
	private $view;
	protected $access = array(
		/*array(
			'action' => array(), //list of actions to access
			'operation' => '=', //>, >=, <, <=, = (default =)
			'lavel' => '0' //user role level (default 0)
		)*/
	);

	public function __construct() {
		$this->view = new View($this->layout);
	}

	public function actionRedirect($controller = false, $action = false) {
		if($controller == false) {
			$controller = Application::get('config')->get(array('default', 'controller'));
		}

		if($action == false) {
			$action = Application::get('config')->get(array('default', 'method'));
		}

		$controllerClass = '\application\\' . APPENV . '\controller\\' . ucfirst($controller) . 'Controller';
		if('\\' . get_called_class() == $controllerClass) {
		// work when call actionRedirect in the controller current controller action
			if(method_exists($this, 'action' . $action)) {
				$access = $this->checkAccess($this->getAccess(), $action);
				$accessController = $this->getAccessControllerAction($this, $action, $access);
				$controller = $accessController['controller'];
				$action = $accessController['action'];

				if(is_array($access)) {
					$this->actionRedirect($controller, $action);
				} else {
					call_user_func(array($this, 'action' . $action));
				}
			} else {
				$this->action404();
			}
		} else {
		// work when call actionRedirect in the controller call another controller action
			$c = new $controllerClass();
			$access = $this->getAccessControllerAction($c, $action);
			$c->actionRedirect($access['controller'], $access['action']);
		}
	}

	private function getAccessControllerAction($controller, $action, $access = false) {
		$access = !$access ? $this->checkAccess($controller->getAccess(), $action) : $access;

		if($access !== true) {
			if(is_array($access)) {
				$controller = isset($access[0]) ? $access[0] : Application::get('config')->get(array('default', 'controller'));
				$action = isset($access[1]) ? $access[1] : Application::get('config')->get(array('default', 'method'));
			} else {
				$action = $access;
			}
		}

		return array('controller' => $controller, 'action' => $action);
	}

	private function checkAccess($access, $action) {
		$result = true;
		if(is_array($access) && ($accessCount = count($access)) > 0) {
			$level = Application::get('authenticate')->getLevel();
			$config = Application::get('config')->get('level');

			for($i = 0; $i < $accessCount; $i++) {
				$access[$i][2] = isset($config[$access[$i][2]]) ? $config[$access[$i][2]] : $access[$i][2];
				if(in_array($action, $access[$i][0]) ) {
					if($access[$i][1] == '>') {
						$result = $level > $access[$i][2];
					} elseif($access[$i][1] == '>=') {
						$result = $level >= $access[$i][2];
					} elseif($access[$i][1] == '<') {
						$result = $level < $access[$i][2];
					} elseif($access[$i][1] == '<=') {
						$result = $level <= $access[$i][2];
					} else {
						$result = $level == $access[$i][2];
					}
					if(!$result) {
						$result = isset($access[$i][3]) ? $access[$i][3] : '404';
					}
					break;
				}
			}
		}
		return $result;
	}

	public function action404() {
		echo __CLASS__ . ' 404';
	}

	public function getModel($name) {
		return Application::getModel($name);
	}

	public function getView() {
		return $this->view;
	}

	public function getPlugin($name) {
		return Application::getPlugin($name);
	}

	public function getAccess() {
		return $this->access;
	}
}