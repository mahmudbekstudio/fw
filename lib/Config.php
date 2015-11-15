<?php
namespace application\lib;

class Config {

	private $conf;

	public function __construct($env) {
		$this->conf = require PATHROOT . '/config/' . $env . '.php';
	}

	public function get($var) {
		if(is_array($var)) {
			return $this->getConfArray($var);
		} else {
			return $this->conf[$var];
		}
	}

	public function set($var, $val) {
		if(is_array($var)) {
			$this->setConfArray($this->conf, $var, $val);
		} else {
			$this->conf[$var] = $val;
		}
	}

	private function setConfArray(&$conf, $var, $val, $index = 0) {
		if(!isset($conf[$var[$index]])) {
			$conf[$var[$index]] = array();
		}

		if(count($var) - 1 == $index) {
			$conf[$var[$index]] = $val;
		} else {
			$conf[$var[$index]] = $this->setConfArray($conf[$var[$index]], $var, $val, $index + 1);
		}
		return $conf;
	}

	private function getConfArray($var) {
		$result = false;

		if(isset($this->conf[$var[0]])) {
			$varCount = count($var);
			$result = $this->conf[$var[0]];
			for($i = 1; $i < $varCount; $i++) {
				if(isset($result[$var[$i]])) {
					$result = $result[$var[$i]];
				} else {
					break;
				}
			}
		}

		return $result;
	}
}