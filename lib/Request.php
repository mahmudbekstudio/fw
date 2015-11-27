<?php
namespace application\lib;

class Request extends Instance {

	private $space;
	private $type;
	private $varType;

	public function __construct($type = 'get', $space = 'request') {
		if(is_array($type)) {
			extract($type);
		}

		$this->varType = $type;
		$this->space = $space;
		$this->initTypeVar($type, $space);
		$this->type = $this->getTypeVar($type, $space);
	}

	public function check($key) {
		return isset($this->type[$key]);
	}

	public function remove($key) {
		if ($this->check($key)) {
			unset($this->type[$key]);
			$this->removeTypeVar($this->varType, $this->space, $key);
		}
	}

	public function destroy() {
		$this->type = array();
		$this->destroyTypeVar($this->varType, $this->space);
	}

	public function set($key, $val) {
		$this->type[$key] = $val;
		$this->setTypeVar($this->varType, $this->space, array($key => $val));
	}

	public function get($key) {
		return $this->type[$key];
	}

	private function getTypeVar($type, $space) {
		$request = false;
		if($type == 'get') {
			$request = $_GET[$space];
		} elseif($type == 'post') {
			$request = $_POST[$space];
		}
		return $request;
	}

	private function setTypeVar($type, $space, $val) {
		if($type == 'get') {
			$_GET[$space] = array_merge($_GET[$space], $val);
		} elseif($type == 'post') {
			$_POST[$space] = array_merge($_POST[$space], $val);
		}
	}
	private function removeTypeVar($type, $space, $key) {
		if($type == 'get') {
			unset($_GET[$space][$key]);
		} elseif($type == 'post') {
			unset($_POST[$space][$key]);
		}
	}

	private function destroyTypeVar($type, $space) {
		if($type == 'get') {
			$_GET[$space] = array();
		} elseif($type == 'post') {
			$_POST[$space] = array();
		}
	}

	private function initTypeVar($type, $space) {
		if($type == 'get') {
			$_GET[$space] = isset($_GET[$space]) ? $_GET[$space] : array();
		} elseif($type == 'post') {
			$_POST[$space] = isset($_POST[$space]) ? $_POST[$space] : array();
		}
	}

}