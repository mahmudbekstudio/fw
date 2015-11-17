<?php
namespace application\lib;

class Authentication extends Instance {

	private $session;
	private $defaultLevel;

	public function __construct($defaultLevel = 0) {
		$this->session = new Session('authentication');
		$this->setDefaultLevel($defaultLevel);
		$this->reset();
	}

	public function setDefaultLevel($level) {
		$this->defaultLevel = $level;
	}

	public function getDefaultLevel() {
		return $this->defaultLevel;
	}

	public function setLevel($level = false) {
		if($level === false || !$this->session->check('level')) {
			$level = $this->defaultLevel;
		}
		$this->session->set('level', $level);
	}

	public function getLevel() {
		return $this->session->get('level');
	}

	public function setParams($params = array()) {
		$params = is_array($params) ? $params : array();
		$this->session->set('params', $params);
	}

	public function getParams($field = false) {
		$result = $this->session->get('params');

		if($field && isset($result[$field])) {
			$result = $result[$field];
		}

		return $result;
	}

	public function haveParams() {
		return count($this->getParams()) > 0;
	}

	public function reset() {
		$this->setLevel();
		$this->setParams();
	}

}