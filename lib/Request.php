<?php
namespace application\lib;

class Request extends Instance {

	private $space;
	private $type;

	public function __construct($type = 'get', $space = 'request') {
		if(is_array($type)) {
			extract($type);
		}

		$this->space = $space;
		$this->type = $this->getTypeVar($type);
	}

	public function check($key) {
		return isset($this->type[$this->space][$key]);
	}

	public function remove($key) {
		if ($this->check($key)) {
			unset($this->type[$this->space][$key]);
		}
	}

	public function destroy() {
		$this->type[$this->space] = array();
	}

	public function set($key, $val) {
		$this->type[$this->space][$key] = $val;
	}

	public function get($key) {
		return $this->type[$this->space][$key];
	}

	private function getTypeVar($type) {
		$request = false;
		if($type == 'get') {
			$request = $_GET;
		} elseif($type == 'post') {
			$request = $_POST;
		}
		return $request;
	}

}