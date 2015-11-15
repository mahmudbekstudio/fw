<?php
namespace application\lib;

class Authentication extends Instance {

	private $session;
	private $defaultLevel;

	public function __construct($defaultLevel = 0) {
		$this->session = new Session('authentication');
		$this->setDefaultLevel($defaultLevel);
		$this->setLevel();
	}

	public function setDefaultLevel($level) {
		$this->defaultLevel = $level;
	}

	public function getDefaultLevel() {
		return $this->defaultLevel;
	}

	public function setLevel($level = false) {
		if($level === false && !$this->session->check('level')) {
			$level = $this->defaultLevel;
		}
		$this->session->set('level', $level);
	}

	public function getLevel() {
		return $this->session->get('level');
	}

}