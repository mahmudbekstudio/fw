<?php
namespace application\lib;

class Tag extends Instance {
	private static $singleTags = array(
		'area',
		'base',
		'basefont',
		'br',
		'col',
		'colgroup',
		'command',
		'hr',
		'img',
		'input',
		'isindex',
		'link',
		'meta',
		'param',
		'source',
		'wbr'
	);

	public static function get($tag, $params = array(), $inner = '') {
		$result = '';

		if(is_string($params)) {
			$inner = $params;
			$params = array();
		}

		if($tag != '') {
			if($tag == 'doctype') {
				$result = self::getDoctype();
			} else {
				$params = self::getParams($params);

				if(in_array($tag, self::$singleTags)) {
					$result = '<' . $tag . $params . '>' . $inner . '</' . $tag . '>';
				} else {
					$result = '<' . $tag . $params . ' />';
				}
			}
		} else {
			$result = self::getComment($inner);
		}

		return $result;
	}

	public static function getComment($text) {
		return '<!-- ' . $text . ' -->';
	}

	public static function getDoctype() {
		return '<!DOCTYPE html>';
	}

	private static function getParams($params) {
		$result = '';

		foreach($params as $key => $val) {
			$result .= ' ' . $key . '="' . $val . '"';
		}

		return $result;
	}
}